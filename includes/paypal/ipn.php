<?php
// เพื่อให้แน่ใจว่า เว็บเพจนี้ถูกเรียกโดย PayPay 
// หาก IP address ไม่เริ่มต้นที่  66.135.197. แสดงว่าไม่ใช้ PayPal
if (strpos($_SERVER['REMOTE_ADDR'], '66.135.197.') === false) {
	exit;		//ไม่ใช่ PayPal ให้ออกจากการทำงานเลย
}

//แนบไฟล์ตั้งค่าสำหรับติดต่อกับ PayPal
require_once './paypal.inc.php';

//เตรียมตัวแปรสำหรับส่งไปยัง PayPal 
// ใช้สำหรับการยืนยันการชำระเงิน
$result = fsockPost($paypal['url'], $_POST); 

//ตรวจสอบผลลัพธ์ของ ipn ที่ได้รับมาจาก paypal
if (eregi("VERIFIED", $result)) { 
	
        	//เชื่อมต่อฐานข้อมูล
        require_once '../../library/config.php';
            
        	// ตรวจสอบว่าการเรียกเก็บเงินไม่เคยทำมาก่อน ดูจากสถานะใบสั่งสินค้า
        $sql = "SELECT od_status
                FROM tbl_order
                WHERE od_id = {$_POST['invoice']}";

        $result = dbQuery($sql);

        // ถ้าไม่พบรหัสสั่งสินค้าที่ต้องการเก็บเงิน ให้ออกทันที  
        if (dbNumRows($result) == 0) {
            exit;
        } else {
        
            $row = dbFetchAssoc($result);
            
            // เรียกเก็บเงินเมื่อสถานะของใบสั่งสินค้าเป็น 'New' เท่านั้น
            if ($row['od_status'] !== 'New') {
                exit;
            } else {

            	// ตรวจสอบว่าลูกค้าจ่ายเงินตรงกับใบสั่งซื้อ
                $sql = "SELECT SUM(pd_price * od_qty) AS subtotal
                        FROM tbl_order_item oi, tbl_product p
                        WHERE oi.od_id = {$_POST['invoice']} AND oi.pd_id = p.pd_id
                        GROUP by oi.od_id";
                $result = dbQuery($sql);
                $row    = dbFetchAssoc($result);		
                
                $subTotal = $row['subtotal'];
                $total    = $subTotal + $shopConfig['shippingCost'];
                            
               //ตรวจสอบว่าจ่ายเงินตรงหรือไม่
                if ($_POST['payment_gross'] != $total) {
                    exit;
                } else {
                   
					$invoice = $_POST['invoice'];
					$memo    = $_POST['memo'];
					if (!get_magic_quotes_gpc()) {
						$memo = addslashes($memo);
					}
					
            		// เมื่อการเรียกเก็บเงินไม่มีปัญหา เปลี่ยนสถานะใบสั่งสินค้าเป็น 'Paid'
                    // และอัพเดทข้อมูลในฟิลด์ od_memo และ od_last_update ด้วย
                    $sql = "UPDATE tbl_order
                            SET od_status = 'Paid', od_memo = '$memo', od_last_update = NOW()
                            WHERE od_id = $invoice";
                    $result = dbQuery($sql);
                }
            }
        }
} else { 
	exit;
} 
?>