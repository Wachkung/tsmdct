<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
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
$title_en=$_POST['title_en'];
$fname_en=$_POST['fname_en'];
$lname_en=$_POST['lname_en'];
$sex=$_POST['sex'];
$position=$_POST['position'];
$bdate=$_POST['bdate'];
$workdate=$_POST['workdate'];
$depart=$_POST['depart'];
$typetext=$_POST['typetext'];
$addr=$_POST['addr'];
$tell=$_POST['tell'];
$email=$_POST['email'];

$sdate=substr($la_date,0,19);
$edate=substr($la_date,21,20);

$latype=$_POST['latype'];
$dsum=$_POST['dsum'];
$detail=$_POST['detail'];
$dupdate=date("Y-m-d H:i:s");
//up la
$strSQL = "update  person  set idcard='$idcard',title='$title',name='$name',lastname='$lastname',title_en='$title_en',fname_en='$fname_en',lname_en='$lname_en',sex='$sex',position='$position',bdate='$bdate',workdate='$workdate',depart='$depart',typetext='$typetext',addr='$addr',tell='$tell',email='$email' where idcard='$idcard'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=person_edit.php?idcard=$idcard'>";
mysql_close();
?>