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
$PosId=$_POST['PosId'];
$PosName=$_POST['PosName'];
$strSQL = "update position set PosName='$PosName' where PosId=$PosId";
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=position_edit.php?PosId=$PosId'>";
mysql_close();
?>