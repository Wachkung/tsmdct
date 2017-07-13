<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['PERSON'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$id=$_GET['id'];
$idcard=$_GET['idcard'];
$latype=$_GET['latype'];
$dsum=$_GET['dsum'];
$lasasom=$_GET['lasasom'];

$strSQL = "delete from  la  where id='$id'";
$objQuery = mysql_query($strSQL);

if ($latype == 'ลาพักผ่อน') {
$total_lasasom=$lasasom+$dsum;	
$strSQL = "update  person  set lasasom='$total_lasasom'  where idcard='$idcard' ";
$objQuery = mysql_query($strSQL);
}
//echo $idcard; exit;
echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";
mysql_close();
?>