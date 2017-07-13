<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['ROOM'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
	$id=$_GET['id'];
	$idcard=$_GET['idcard'];
		if($_SESSION['ADMIN'] <> "1")
	{
			if($_SESSION['IDCARD'] <> $_GET['idcard'])
			{   
				echo "<meta charset='UTF-8'>";
				echo "ไม่มีสิทธิ์แก้ไข การจองห้องประชุมวันนี้ ";
				echo"<meta http-equiv='refresh' content='2;URL=index.php'>";
				exit();
			}
	}
$strSQL = "delete from  meeting_list  where id='$id' and idcard='$idcard'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
mysql_close();
?>