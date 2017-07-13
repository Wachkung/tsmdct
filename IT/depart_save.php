<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
//รับค่ามาจากฟอร์ม
$DeptId=$_POST['DeptId'];
$CODE=$_POST['CODE'];
$DeptName=$_POST['DeptName'];
$STATUS=$_POST['STATUS'];
$strSQL = "insert into risk2_departreport set DeptId='$DeptId',CODE='$CODE', DeptName='$DeptName', STATUS='$STATUS'"; 
$objQuery = mysql_query($strSQL);

$strSQLRM = "insert into rm_depart set id='$DeptId',CODE='$CODE', depart='$DeptName'"; 
$objQueryRM = mysql_query($strSQLRM);
echo"<meta http-equiv='refresh' content='0;URL=depart_add.php'>";
mysql_close();
?>