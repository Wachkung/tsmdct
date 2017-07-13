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
$codelevel=$_POST['codelevel'];
$namenormal=$_POST['namenormal'];
$strSQL = "insert into risk2_risk_level set code='$codelevel', name='$namenormal', grouplevel='2'"; 
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=levelclinic_add.php'>";
mysql_close();
?>