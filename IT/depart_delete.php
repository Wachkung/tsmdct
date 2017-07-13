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
$DeptId=$_GET['DeptId'];
$strSQL = "delete from risk2_departreport  where DeptId='$DeptId'";
$objQuery = mysql_query($strSQL);

$strSQLRM = "delete from rm_depart  where id='$DeptId'";
$objQueryRM = mysql_query($strSQLRM);

echo"<meta http-equiv='refresh' content='0;URL=depart_add.php'>";
mysql_close();
?>