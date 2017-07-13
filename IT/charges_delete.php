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

$id=$_GET['id'];
$detail=$_POST['detail'];
$price=$_POST['price'];
$dupdate=substr($_POST['dupdate'],0,10);
//ลบข้อมูลในฐานข้อมูล
$strSQL = "delete from  it_charges  where id='$id'";
$objQuery = mysql_query($strSQL);	
echo"<meta http-equiv='refresh' content='0;URL=charges_add.php'>";
mysql_close();					
?>
