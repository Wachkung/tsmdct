<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$id=$_POST['id'];
$durable_code=$_POST['durable_code'];
$durable_type_code=$_POST['durable_type_code'];
$durable_name=$_POST['durable_name'];
$strSQL = "update durable set durable_code='$durable_code', durable_type_code='$durable_type_code', durable_name='$durable_name' where durable_id=$id";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=durable_device_edit.php?id=$id'>";
mysql_close();
?>