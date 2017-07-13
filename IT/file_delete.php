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
$file_name=$_GET['file_name'];
$strSQL = "delete from  it_file_download where id='$id'";
$objQuery = mysql_query($strSQL);
$flgDelete = unlink("file_download/$file_name");
echo"<meta http-equiv='refresh' content='0;URL=file_add.php'>";
mysql_close();
?>