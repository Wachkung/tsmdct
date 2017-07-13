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

$desktop_code=$_POST['desktop_code'];
$name=$_POST['name'];
$serial=$_POST['serial'];
$ctype=$_POST['ctype'];
$ip=$_POST['ip'];
$mac=$_POST['mac'];
$hdd=$_POST['hdd'];
$cpu=$_POST['cpu'];
$board=$_POST['board'];
$core=$_POST['core'];
$ram=$_POST['ram'];
$vga=$_POST['vga'];
$dvd=$_POST['dvd'];
$os=$_POST['os'];
$program=$_POST['program'];
$ups_code=$_POST['ups_code'];
$monitor_code=$_POST['monitor_code'];
$printer=$_POST['printer'];
$person=$_POST['person'];
$date_detail=$_POST['date_detail'];
$price=$_POST['price'];
$get=$_POST['get'];
$status=$_POST['status'];
$picture=$_POST['picture'];
$file_number=$_POST['file_number'];
$file_download=$_POST['file_download'];

$strSQL = "insert into  it_desktop  values( '','$desktop_code','$name','$serial','$ctype','$ip','$mac','$hdd','$cpu','$board','$core','$ram','$vga','$dvd','$os','$program','$ups_code','$monitor_code','$printer','$person','$depart','$date_install','$price','$get','$status','$picture','$file_number','$file_download')";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=desktop.php'>";
mysql_close();
?>