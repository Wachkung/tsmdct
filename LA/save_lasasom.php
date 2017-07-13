<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
//รับค่ามาจากฟอร์ม
$idcard=$_POST['idcard'];
$lasasom=$_POST['lasasom'];
//แสดงวันลาสะสมจากตาราง person
$strSQL = "update  person  set lasasom='$lasasom'  where idcard='$idcard' ";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=person_detail.php?idcard=$idcard'>";
mysql_close();
?>
