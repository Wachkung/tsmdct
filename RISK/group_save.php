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
$codegroup=$_POST['codegroup'];
$namegroup=$_POST['namegroup'];
$grouptype=$_POST['grouptype'];
$grouplevel=$_POST['grouplevel'];
$strSQL = "insert into risk2_group set codegroup='$codegroup', namegroup='$namegroup',grouptype='$grouptype',grouplevel='$grouplevel'"; 
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=group_add.php'>";
mysql_close();
?>