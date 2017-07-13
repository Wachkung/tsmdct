<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
//รับค่ามาจากฟอร์ม
$IDCARD=$_POST['IDCARD'];
$RISK=$_POST['RISK'];
 if ($_POST['RISK'] == '') {$RISK='0';}
$PCT=$_POST['PCT'];
 if ($_POST['PCT'] == '') {$PCT='0';}
$PTC=$_POST['PTC'];
 if ($_POST['PTC'] == '') {$PTC='0';}
$IC=$_POST['IC'];
 if ($_POST['IC'] == '') {$IC='0';}
$IM=$_POST['IM'];
 if ($_POST['IM'] == '') {$IM='0';}
$ENV=$_POST['ENV'];
 if ($_POST['ENV'] == '') {$ENV='0';}
$HRD=$_POST['HRD'];
 if ($_POST['HRD'] == '') {$HRD='0';}
					$strSQL = "update  user_datacenter set RISK='$RISK',PCT='$PCT',PTC='$PTC',IC='$IC',IM='$IM',ENV='$ENV',HRD='$HRD' where IDCARD='$IDCARD'"	;
					//echo $strSQL;exit;
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=report_user.php'>";
					mysql_close();					
?>