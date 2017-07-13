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
//รับค่ามาจากฟอร็ม
$id=$_POST['id'];
$IDCARD=$_POST['IDCARD'];
$file_title=$_POST['file_title'];
$file_depart=$_POST['file_depart'];
$file_type=$_POST['file_type'];
$file_download=$_POST['file_download'];
$file_name=$_POST['file_name'];
$dupdate=date("Y-m-d H:i:s");
//เช็คถ้ารูปว่าง
$file = strtolower($_FILES["file_download"]["name"]);
$type1= strrchr($file,".");
if(($type1==".zip")||($type1==".rar")||($type1==".pdf")||($type1==".tif")||($type1==".tiff")||($_FILES["file_download"]["error"] > 0))
{
			if ($_FILES["file_download"]["error"] > 0)
			  {
			  $strSQL = "UPDATE upload_file SET IDCARD='$IDCARD', file_title='$file_title', file_depart='$file_depart', file_type='$file_type','
			  where id='$id' AND IDCARD='$IDCARD1' ";
				$objQuery = mysql_query($strSQL);
				echo"<meta http-equiv='refresh' content='0;URL=file_edit.php?id=$id'>";
				mysql_close();
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
			  $strSQL = "UPDATE upload_file SET IDCARD='$IDCARD', file_title='$file_title', file_depart='$file_depart', file_type='$file_type', file_name='$f1'
			  where id='$id' AND IDCARD='$IDCARD1' ";
			  $objQuery = mysql_query($strSQL);
			  $flgDelete = unlink("file_download/$file_name");
			  echo"<meta http-equiv='refresh' content='0;URL=file_edit.php?id=$id'>";
			  mysql_close();
			  }
}
else 
{
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบ ไฟล์ UP LOAD  การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=./file_add.php'>";
		exit();

}
?>