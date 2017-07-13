<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม

$device_code=$_GET['device_code'];
$picture=$_GET['picture'];
$strSQL = "delete from  it_device  where device_code='$device_code'";
$objQuery = mysql_query($strSQL);

//ลบรูป
$flgDelete = unlink("picture_device/$picture");
//ลบข้อมูลในฐานข้อมูล ซ่อม
$strSQL = "delete from  it_repair  where code='$device_code'";
$objQuery = mysql_query($strSQL);	
echo"<meta http-equiv='refresh' content='0;URL=device.php'>";
mysql_close();
?>