<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
//รับค่ามาจากฟอร์ม
$IDCARD=$_POST['IDCARD'];
$DEPART=$_POST['CODE'];
// echo $DEPART; exit;
$RISK=$_POST['RISK'];
 if ($_POST['RISK'] == '') {$RISK='0';}
$REPORT=$_POST['REPORT'];
 if ($_POST['REPORT'] == '') {$REPORT='0';}
$LA=$_POST['LA'];
 if ($_POST['LA'] == '') {$LA='1';}
$ROOM=$_POST['ROOM'];
 if ($_POST['ROOM'] == '') {$ROOM='1';}
$IT=$_POST['IT'];
 if ($_POST['IT'] == '') {$IT='0';}
$PERSON=$_POST['PERSON'];
 if ($_POST['PERSON'] == '') {$PERSON='0';}
$NUTRITION=$_POST['NUTRITION'];
 if ($_POST['NUTRITION'] == '') {$NUTRITION='0';}
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
$ADMIN=$_POST['ADMIN'];
 if ($_POST['ADMIN'] == '') {$ADMIN='0';}
$STATUS=$_POST['STATUS'];
 if ($_POST['STATUS'] == '') {$STATUS='1';}
$DURABLE=$_POST['DURABLE'];
 if ($_POST['DURABLE'] == '') {$DURABLE='0';}
					$strSQL = "insert into  user_datacenter set IDCARD='$IDCARD',DEPART='$DEPART',PASSWORD='f122db007ed655921f98184e4302bba84990ff68',RISK='$RISK',REPORT='$REPORT',LA='$LA',ROOM='$ROOM',IT='$IT',PERSON='$PERSON',NUTRITION='$NUTRITION',PCT='$PCT',PTC='$PTC',IC='$IC',IM='$IM',ENV='$ENV',HRD='$HRD',ADMIN='$ADMIN',STATUS='$STATUS',DURABLE='$DURABLE'"	;
					// echo $strSQL;exit;
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=user_add.php'>";
					mysql_close();					
?>