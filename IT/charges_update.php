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

$id=$_POST['id'];
$detail=$_POST['detail'];
$price=$_POST['price'];
$dupdate=substr($_POST['dupdate'],0,10);
$strSQL = "update  it_charges  set detail='$detail',price='$price',dupdate='$dupdate' where id='$id'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=charges_edit.php?id=$id'>";
mysql_close();					
?>