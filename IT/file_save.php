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
//รับค่ามาจากฟอร็ม
$file_title=$_POST['file_title'];
$file_number=$_POST['file_number'];
$file_download=$_POST['file_download'];
$dupdate=date("Y-m-d H:i:s");
//up Intro
if ($_FILES["file_download"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file_download"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file_download"]["name"] . "<br>";
  echo "Type: " . $_FILES["file_download"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file_download"]["size"] / 1024) . " Kb<br>";
  $size=($_FILES["file_download"]["size"] / 1024);
    // copy ลง Server
$strname = strrev($_FILES['file_download']['name']);
$path2="file_download/";
$f1=time()."".strrev($strname[0].$strname[1].$strname[2].$strname[3]);
$files=$path2.$f1;
copy($_FILES['file_download']['tmp_name'],$files);
  echo" อัพโหลดไฟล์เรียบร้อยแล้ว";
  }
$strSQL = "insert into  it_file_download  set file_title='$file_title',file_number='$file_number',file_name='$f1',dupdate='$dupdate'";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=file_add.php'>";
mysql_close();
?>