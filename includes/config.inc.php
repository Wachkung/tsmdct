<?php
$titleweb = "ระบบจัดการ Data Center โรงพยาบาลตาลสุม"; 
$namehosp = "โรงพยาบาลตาลสุม"; 
$Address = "99 หมู่ 2 ตำบลตาลสุม อำเภอตาลสุม จังหวัดอุบลราชธานี 34330";
$Phone = "045 - 427137";
$Email = "tansumhosp@tshpt.mail.go.th";
$message =" `<a href='https://www.facebook.com/TalSumHosPiTal?ref=hl'> TalSumHosPiTal </a> << หรือ >> Line : <a href='http://line.me/ti/p/%40gjh5866y'><img height='36' border='0' alt='เพิ่มเพื่อน' src='http://biz.line.naver.jp/line_business/img/btn/addfriends_en.png'></a></p><br>`";
$strdate = "2016-10-01";
$enddate = "2017-09-30";
$YYYY = date("Y")+543;
$todays = date("Y-m-d");
$dtimenow = date("Y-m-d H:i:s");

$ThaiMonth = array( "มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
$ThaiSubMonth = array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
/*ฟังก์ชั่นตัดสตริงแปลงวันที่เป็นไทยแบบสั้น ตัวอย่างรูปแบบสตริงนำเข้า 2001-07-16 23:53:11*/
function SortThaiDate($txt)
				 {
				      global $ThaiSubMonth;
							$Year = substr( substr( $txt,0 ,4)+543, -2);
							$Month = substr( $txt, 4, 2);
							$DayNo = substr( $txt, 6, 2);
							// $Month = $Month - 1;
						 return $DayNo."/".$Month."/".$Year;									 
				 }					
/*ฟังก์ชั่นตัดสตริงแปลงวันที่เป็นไทยแบบยาว ตัวอย่างรูปแบบสตริงนำเข้า 2001-07-16 23:53:11*/
function LongThaiDate($txt)
				 {
				      global $ThaiMonth;
							$Year = substr( $txt,0 ,4)+543;
							$Month = substr( $txt,5, 2);
							$DayNo = substr( $txt, 8, 2);
							$Ttime = substr( $txt, 11, 5);
							$Month = $Month - 1;
						 return $DayNo."  ".$ThaiMonth[$Month]."  ".$Year." ".$Ttime;						 
				 }
				 
function LongThaiDatenotime($txt)
				 {
				      global $ThaiMonth;
							$Year = substr( $txt,0 ,4)+543;
							$Month = substr( $txt,5, 2);
							$DayNo = substr( $txt, 8, 2);
							$Ttime = substr( $txt, 11, 5);
							$Month = $Month - 1;
						 return $DayNo."  ".$ThaiMonth[$Month]."  ".$Year;						 
				 }
				 
				 					
//หาวัสุดท้ายของเดือน
function lastday($mon){
list($y, $m) = explode("/", $mon);
$m = $m+1; if($m==13){ $y=$y+1; $m=1; }
$newdate = mktime(12, 0, 0, $m, 1, $y);
$newdate = strtotime("-1 day", $newdate);
$newdate = date("Y-m-d", $newdate);
return($newdate);
}
				 
function retDate($add){ //แปลงค่าวันที่ จาก 01/12/2552 เป็น 2009-12-01
		$strd = substr($add,0,2);
		$strm = substr($add,3,2);
		$stryT = substr($add,6,4);
		$stry = $stryT - 543;
		$str = $stry."-".$strm."-".$strd;
		return $str;
}
function retDatets($add){ //แปลงค่าวันที่ จาก 2009-12-01  เป็น  01/12/2552  
		$strd = substr($add,8,2);
		$strm = substr($add,5,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$str = $strd."/".$strm."/".$stry;
		return $str;
}
function redatexx($add){ //แปลงค่าวันที่ จาก 2009-12-01  เป็น  01/12/2552  
		$strd = substr($add,8,2);
		$strm = substr($add,5,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$stryto = substr($stry,2,2);
		$str = $strd."/".$strm."/".$stryto;
		return $str;
}

function retDatet18($add){ //แปลงค่าวันที่ จาก 20091201  เป็น  01/12/2552  
	if($add != ''){
		$strd = substr($add,6,2);
		$strm = substr($add,4,2);
		$stryT = substr($add,0,4);
		$stry = $stryT + 543;
		$str = $strd."/".$strm."/".$stry;
		return $str;
	}
}
function retDatet19($add){ //แปลงค่าวันที่ จาก 01/12/2552  เป็น  20091201
	if($add != ''){
		$strd = substr($add,0,2);
		$strm = substr($add,3,2);
		$stryT = substr($add,6,4);
		$stry = $stryT - 543;
		$str = $stry."".$strm."".$strd;
		return $str;
	}
}
function retDatet20($add){ //แปลงค่าวันที่ จาก 20091201  เป็น  2009-12-01
	if($add != ''){
		$strd = substr($add,6,2);
		$strm = substr($add,4,2);
		$stryT = substr($add,0,4);
		$stry = $stryT;
		$stry = substr($stry,-2);
		$str = $stryT."-".$strm."-".$strd;
		return $str;
	}
}							 

function real_esc($array,$int=0){  //ป้องกัน SQL Injection สำหรับการ ล็อกอิน
    if(count($array)>0){  
        if(is_array($array)){  
            foreach($array as $key=>$value){  
                if(@is_array($array[$key])){  
                    foreach($array[$key] as $key_2=>$value_2){  
                        if($_SERVER['REQUEST_METHOD']=='GET'){  
                            if(get_magic_quotes_gpc()){  
                                $_GET[$key][$key_2]=trim("$value_2");  
                            }else{  
                                $_GET[$key][$key_2]=@mysql_real_escape_string(trim("$value_2"));  
                            }  
                            $_GET[$key][$key_2]=($int==1)?(int)$_GET[$key][$key_2]:$_GET[$key][$key_2];  
                        }else{  
                            if(get_magic_quotes_gpc()){  
                                $_POST[$key][$key_2]=trim("$value_2");  
                            }else{  
                                $_POST[$key][$key_2]=@mysql_real_escape_string(trim("$value_2"));  
                            }                              
                            $_POST[$key][$key_2]=($int==1)?(int)$_POST[$key][$key_2]:$_POST[$key][$key_2];  
                        }  
                    }  
                }else{  
                    if($_SERVER['REQUEST_METHOD']=='GET'){  
                        if(get_magic_quotes_gpc()){  
                            $_GET[$key]=trim("$value");  
                        }else{  
                            $_GET[$key]=@mysql_real_escape_string(trim("$value"));  
                        }  
                        $_GET[$key]=($int==1)?(int)$_GET[$key]:$_GET[$key];  
                    }else{  
                        if(get_magic_quotes_gpc()){  
                            $_POST[$key]=trim("$value");  
                        }else{  
                            $_POST[$key]=@mysql_real_escape_string(trim("$value"));  
                        }                          
                        $_POST[$key]=($int==1)?(int)$_POST[$key]:$_POST[$key];  
                    }  
                }             
            }  
        }else{  
            $value=$array;  
            if($_SERVER['REQUEST_METHOD']=='GET'){  
                $getVars = array_keys($_GET);  
                $key=$getVars[0];        
                if(get_magic_quotes_gpc()){  
                    $_GET[$key]=trim("$value");  
                }else{  
                    $_GET[$key]=@mysql_real_escape_string(trim("$value"));  
                }  
                $_GET[$key]=($int==1)?(int)$_GET[$key]:$_GET[$key];  
            }else{  
                $getVars = array_keys($_POST);  
                $key=$getVars[0];      
                if(get_magic_quotes_gpc()){  
                    $_POST[$key]=trim("$value");  
                }else{  
                    $_POST[$key]=@mysql_real_escape_string(trim("$value"));  
                }                  
                $_POST[$key]=($int==1)?(int)$_POST[$key]:$_POST[$key];  
            }              
        }  
    }  
}  

?>
