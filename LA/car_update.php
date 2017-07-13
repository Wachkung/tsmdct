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
$id=$_POST['id'];
$idcard=$_POST['idcard'];
$car_number=$_POST['car_number'];
$car_city=$_POST['car_city'];
$car_yee=$_POST['car_yee'];
$car_ru=$_POST['car_ru'];
$car_colur=$_POST['car_colur'];
$car_type=$_POST['car_type'];
$strSQL = "update person_car set idcard='$idcard', car_number='$car_number', car_city='$car_city', car_yee='$car_yee', car_ru='$car_ru', car_colur= '$car_colur', car_type='$car_type' where id=$id";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=car_edit.php?id=$id'>";
mysql_close();
?>