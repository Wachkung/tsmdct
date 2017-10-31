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
$idcard=$_POST['idcard'];
$title=$_POST['title'];
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$sex=$_POST['sex'];
$position=$_POST['position'];
$bdate=$_POST['bdate'];
$workdate=$_POST['workdate'];
$depart=$_POST['depart'];
$typetext=$_POST['typetext'];
$lasasom=$_POST['lasasom'];
$addr=$_POST['addr'];
$personla=$_POST['personla'];
$tell=$_POST['tell'];
$email=$_POST['email'];

$sdate=substr($la_date,0,19);
$edate=substr($la_date,21,20);

$latype=$_POST['latype'];
$dsum=$_POST['dsum'];
$detail=$_POST['detail'];
$dupdate=date("Y-m-d H:i:s");
//up la
$strSQL = "update person set idcard='$idcard',title='$title',name='$name',lastname='$lastname',sex='$sex',position='$position',bdate='$bdate',workdate='$workdate',depart='$depart',typetext='$typetext',lasasom='$lasasom',addr='$addr',personla='$personla',tell='$tell',email='$email' where idcard='$idcard'";
$objQuery = mysql_query($strSQL);

$strSQLUser = "update user_datacenter set IDCARD='$idcard',DEPART='$depart' where IDCARD='$idcard'";
$objQueryUser = mysql_query($strSQLUser);

echo"<meta http-equiv='refresh' content='0;URL=person_edit.php?idcard=$idcard'>";
mysql_close();
?>