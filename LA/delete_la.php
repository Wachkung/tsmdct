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
$id=$_GET['id'];
$idcard=$_GET['card'];
$latype=$_GET['latype'];
$dsum=$_GET['dsum'];
$lasasom=$_GET['lasasom'];
//แสดงวันลาสะสมจากตาราง person
$strSQL = "delete from  la  where id='$id'";
$objQuery = mysql_query($strSQL);

if ($latype == '3') {
$total_lasasom=$lasasom+$dsum;	
$strSQL = "update  person  set lasasom='$total_lasasom'  where idcard='$idcard' ";
$objQuery = mysql_query($strSQL);
}
echo"<meta http-equiv='refresh' content='0;URL=person_detail.php?idcard=$idcard'>";
mysql_close();
?>