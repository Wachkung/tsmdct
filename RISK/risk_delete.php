<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
//รับค่ามาจากฟอร์ม
$id=$_GET['id'];
//แสดงวันลาสะสมจากตาราง person
$strSQL = "delete from  risk2_datarisk  where id='$id'";
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=report_total.php'>";
mysql_close();
?>