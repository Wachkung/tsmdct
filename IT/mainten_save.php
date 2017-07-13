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
$date_plan=$_POST['date_plan'];
$sdate=substr($date_plan,0,19);
$edate=substr($date_plan,21,20);
$detail=$_POST['detail'];
$strSQL = "insert into  it_plan_mainten set sdate='$sdate',edate='$edate',detail='$detail'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=plan_add.php'>";
mysql_close();
?>