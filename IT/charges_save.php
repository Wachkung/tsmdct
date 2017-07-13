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


$detail=$_POST['detail'];
$price=$_POST['price'];
$dupdate=substr($_POST['dupdate'],0,10);
$strSQL = "insert into it_charges set detail='$detail', price='$price', dupdate='$dupdate'";
//$strSQL = "insert into  it_charges values('','$detail','$price','$dupdate')";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=charges_add.php'>";
mysql_close();					
?>