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
$id=$_POST['id'];
$file_title=$_POST['file_title'];
$file_number=$_POST['file_number'];
$file_download=$_POST['file_download'];
$file_name=$_POST['file_name'];
$dupdate=date("Y-m-d H:i:s");
//เช็คถ้ารูปว่าง
			if ($_FILES["file_download"]["error"] > 0)
			  {
			  $strSQL = "UPDATE it_file_download SET file_title='$file_title', file_number='$file_number'
			  where id='$id' ";
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
			  $strSQL = "UPDATE it_file_download SET file_title='$file_title', file_number='$file_number' , file_name='$f1'
			  where id='$id' ";
			  $objQuery = mysql_query($strSQL);
			  $flgDelete = unlink("file_download/$file_name");
			  echo"<meta http-equiv='refresh' content='0;URL=file_edit.php?id=$id'>";
			  mysql_close();
			  }
?>