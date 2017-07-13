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
$id=$_POST['id'];
$codelevel=$_POST['codelevel'];
$namenormal=$_POST['namenormal'];
$strSQL = "update risk2_risk_level set code='$codelevel', name='$namenormal', grouplevel='2' where id=$id"; 
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=levelnormal_edit.php?id=$id'>";
mysql_close();
?>