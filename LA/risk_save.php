<?php
session_start();
include("../includes/conndb.php"); 
include("../includes/config.inc.php"); 

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
$strSQL = "insert into risk2_datarisk set hnno='$hnno', name='$name', age='$age', gender='$gender', departreport='$departreport', departrespon= '$departrespon', daterigter='$daterigter', timer='$timer', fromevent='$fromevent', dataevent='$dataevent', commen='$commen', typereport='$typereport', notepatient='$notepatient', notehead='$notehead', noteceo='$noteceo', notedepart='$notedepart', star='$star', statusconfirm='0', datereport=now(), daterespon='0000-00-00'"; 
$objQuery = mysql_query($strSQL);



echo"<meta http-equiv='refresh' content='0;URL=risk_report.php'>";
mysql_close();
?>
