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
$id=$_GET['id'];
$device_code=$_GET['device_code'];
$strSQL = "delete from  it_repair  where id='$id'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=device_detail.php?device_code=$device_code'>";
mysql_close();
?>