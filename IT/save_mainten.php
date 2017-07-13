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
$date_mainten=$_POST['date_mainten'];
$desktop_code=$_POST['desktop_code'];
$person_mainten=$_POST['person_mainten'];
$price_mainten=$_POST['price_mainten'];
$detail_mainten=$_POST['detail_mainten'];
$strSQL = "insert into  it_mainten set code='$desktop_code',date_mainten='$date_mainten',detail_mainten='$detail_mainten',person_mainten='$person_mainten'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=desktop_detail.php?desktop_code=$desktop_code'>";
mysql_close();
?>