<?php
session_start();
include("../includes/conndb.php");
include("../includes/config.inc.php");
$today = date("Y-m-d") ;
$yesterday = date("Y-m-d", strtotime("-1 days")); 

$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
$thai_month_arr=array(
    "0"=>"",
    "1"=>"มกราคม",
    "2"=>"กุมภาพันธ์",
    "3"=>"มีนาคม",
    "4"=>"เมษายน",
    "5"=>"พฤษภาคม",
    "6"=>"มิถุนายน",
    "7"=>"กรกฎาคม",
    "8"=>"สิงหาคม",
    "9"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
);
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
    //$thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}

	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
// รับค่ามาจากฟอร์ม
$hnno=$_POST['hnno'];
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$departreport=$_POST['departreport'];
$departrespon=$_POST['departrespon'];
$daterigter=$_POST['daterigter'];
$timer=$_POST['timer'];
$fromevent=$_POST['fromevent'];
$dataevent=$_POST['dataevent'];
$commen=$_POST['commen'];
$typereport=$_POST['typereport'];
$notepatient=$_POST['notepatient'];
$notehead=$_POST['notehead'];
$noteceo=$_POST['noteceo'];
$notedepart=$_POST['notedepart'];
$star=$_POST['star'];
$statusconfirm=$_POST['statusconfirm'];
$datereport=$_POST['datereport'];
$daterespon=$_POST['daterespon'];
$strSQL = "insert into risk2_datarisk set hnno='$hnno', name='$name', age='$age', gender='$gender', departreport='$departreport', departrespon= '$departrespon', daterigter='$daterigter', timer='$timer', fromevent='$fromevent', dataevent='$dataevent', commen='$commen', typereport='$typereport', notepatient='$notepatient', notehead='$notehead', noteceo='$noteceo', notedepart='$notedepart', star='$star', statusconfirm='0', datereport='$today', daterespon='0000-00-00'";
$objQuery = mysql_query($strSQL);

//------ Line Bot ส่งรายงาน-------------------


$sqldepartreport2=" select CODE, DeptName from risk2_departreport where CODE = '$departreport'";
$resultdepartreport2 = mysql_query($sqldepartreport2); $departreport2 = mysql_fetch_array($resultdepartreport2);
$DeptName = $departreport2["DeptName"];

$sqldepartrespon2=" select CODE, DeptName from risk2_departreport where CODE = '$departrespon'";
$resultdepartrespon2 = mysql_query($sqldepartrespon2); $departrespon2 = mysql_fetch_array($resultdepartrespon2);
$DeptName2 = $departrespon2["DeptName"];

$sqlfromevent2=" select codegroup, namegroup from risk2_group where codegroup='$fromevent'";
$resultfromevent2 = mysql_query($sqlfromevent2); $fromevent2 = mysql_fetch_array($resultfromevent2);
$namegroup = $fromevent2["namegroup"];

$sqldataevent2=" select codegroup,namerisk,coderisk from risk2_risk where coderisk='$dataevent'";
$resultdataevent2 = mysql_query($sqldataevent2); $dataevent2 = mysql_fetch_array($resultdataevent2);
$namerisk = $dataevent2["namerisk"];

$txt1 = ' วันที่ ['.thai_date(strtotime($today)).' ] มีการเขียนความเสี่ยง' ;
$txt2 = ' จากหน่วยงาน ['.$DeptName.'] ถึงหน่วยงาน ['.$DeptName2.']'  ;
$txt3 = ' โปรแกรมด้านความเสี่ยง ['.$namegroup.']' ;
$txt4 = ' เหตุการณ์ที่เกิดขึ้น ['.$namerisk.']' ;
$txt5 = ' อธิบายและเหตุการณ์ ['.$notepatient.'] ' ;

$message_send = $txt1.$txt2.$txt3.$txt4.$txt5;

$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
// SSL USE
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
//POST
curl_setopt( $chOne, CURLOPT_POST, 1);
// Message
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$message_send);
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=hi&imageThumbnail=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png&imageFullsize=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png");
// follow redirects
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
//ADD header array
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer CPen9iokBZGLNEjICuCUz3NbSiOcuaTbdZlOztHMgqh', ); 
//$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: CivtjjaHTXPKvbnFjenNpegWbbATxrwzHbusIYlUrdR', );  //ทีมบริหารจัดการความเสี่ยง โรงพยาบาลตาลสุม
//$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: CPen9iokBZGLNEjICuCUz3NbSiOcuaTbdZlOztHMgqh', );  //1-1
//$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: HwD6a2HvWWdmKQdEZwGTs1i1sY2EZbXkeZxpxLkxLwK', );  //ทีมบริหารจัดการความเสี่ยง โรงพยาบาลสิรินธร
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
//RETURN
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Check error
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
else { $result_ = json_decode($result, true);
echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
//Close connect
curl_close( $chOne );

//------------จบ การส่งรายงาน---------

echo"<meta http-equiv='refresh' content='0;URL=risk_report.php'>";
mysql_close();
?>
