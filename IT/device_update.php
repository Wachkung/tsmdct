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
$device_code=$_POST['device_code'];
$serial=$_POST['serial'];
$dtype=$_POST['dtype'];
$ip=$_POST['ip'];
$mac=$_POST['mac'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$spec=$_POST['spec'];
$person=$_POST['person'];
$date_install=$_POST['date_install'];
$depart=$_POST['depart'];
$price=$_POST['price'];
$get=$_POST['get'];
$status=$_POST['status'];
$picture=$_POST['picture'];
$file_number=$_POST['file_number'];
$file_download=$_POST['file_download'];
$serialkey=$_POST['serialkey'];	
$budgets=$_POST['budgets'];
//เช็คถ้ารูปว่าง

			if ($_FILES["picture"]["error"] > 0)
			  {
			  		$strSQL = "update  it_device set serial='$serial',dtype='$dtype',ip='$ip',mac='$mac',brand='$brand',model='$model',spec='$spec',person='$person',depart='$depart',date_install='$date_install',price='$price',get='$get',status='$status',file_number='$file_number',file_download='$file_download',serialkey='$serialkey',budgets='$budgets' where device_code='$device_code'";
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=device_detail.php?device_code=$device_code'>";
					mysql_close();
			  }
			else
			  {
			  echo "Upload: " . $_FILES["picture"]["name"] . "<br>";
			  echo "Type: " . $_FILES["picture"]["type"] . "<br>";
			  echo "Size: " . ($_FILES["picture"]["size"] / 1024) . " Kb<br>";
			  $size=($_FILES["picture"]["size"] / 1048576);
				// copy ลง Server
			$strname = strrev($_FILES['picture']['name']);
			$path2="picture_device/";
			$f1=$device_code."".strrev($strname[0].$strname[1].$strname[2].$strname[3]);
			$files=$path2.$f1;
			copy($_FILES['picture']['tmp_name'],$files);
			  echo" อัพโหลดไฟล์เรียบร้อยแล้ว";
			  		$strSQL = "update  it_device set serial='$serial',dtype='$dtype',ip='$ip',mac='$mac',brand='$brand',model='$model',spec='$spec',person='$person',depart='$depart',date_install='$date_install',price='$price',get='$get',status='$status',picture='$f1',file_number='$file_number',file_download='$file_download',serialkey='$serialkey',budgets='$budgets' where device_code='$device_code'";
					//echo $strSQL;exit;	
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=device_detail.php?device_code=$device_code'>";
					mysql_close();
			  }
?>