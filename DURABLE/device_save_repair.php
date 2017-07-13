<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$date_repair=$_POST['date_repair'];
$device_code=$_POST['device_code'];
$person_repair=$_POST['person_repair'];
$price_repair=$_POST['price_repair'];
$detail_repair=$_POST['detail_repair'];
$strSQL = "insert into  it_repair  set code='$device_code',date_repair='$date_repair',detail_repair='$detail_repair',person_repair='$person_repair',price_repair='$price_repair'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=device_detail.php?device_code=$device_code'>";
mysql_close();
?>