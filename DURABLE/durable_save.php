<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}

	$strSQLcode = "SELECT * FROM durable_device order by device_code DESC limit 1 ";
	$objQuerycode = mysql_query($strSQLcode);
	$objResultcode = mysql_fetch_array($objQuerycode);
	
	// สร้างรหัสใหม่
	$new_code=(int)substr($objResultcode["device_code"],6,3)+1;
	$year="DR".($YYYY);
	$x_string =  substr("00000".$new_code,-3,3);
	$new_device_code="$year$x_string";
 


	
//รับค่ามาจากฟอร์ม

//$device_code=$_POST['device_code'];
$serial=$_POST['serial'];
$dtype=$_POST['dtype'];
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

			if ($_FILES["picture"]["error"] > 0) //เช็คถ้ารูปว่าง
			  {
			  		$strSQL = "insert into durable_device set device_code='$new_device_code',serial='$serial',dtype='$dtype',brand='$brand',model='$model',spec='$spec',person='$person',depart='$depart',date_install='$date_install',price='$price',get='$get',status='$status',picture='$picture',file_number='$file_number',file_download='$file_download',serialkey='$serialkey',budgets='$budgets',durable_type_code='DT105'";
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=durable.php'>";
					mysql_close();
			  }
			else //ถ้ารูปไม่ว่าง
			  {
			  echo "Upload: " . $_FILES["picture"]["name"] . "<br>";
			  echo "Type: " . $_FILES["picture"]["type"] . "<br>";
			  echo "Size: " . ($_FILES["picture"]["size"] / 1024) . " Kb<br>";
			  $size=($_FILES["picture"]["size"] / 1048576);
				// copy ลง Server
			$strname = strrev($_FILES['picture']['name']);
			$path2="picture_durable/";
			$f1=$device_code."".strrev($strname[0].$strname[1].$strname[2].$strname[3]);
			$files=$path2.$f1;
			copy($_FILES['picture']['tmp_name'],$files);
			  echo" อัพโหลดไฟล์เรียบร้อยแล้ว";
			  
			  		$strSQL = "insert into durable_device set device_code='$new_device_code',serial='$serial',dtype='$dtype',brand='$brand',model='$model',spec='$spec',person='$person',depart='$depart',date_install='$date_install',price='$price',get='$get',status='$status',file_number='$file_number',file_download='$file_download',serialkey='$serialkey',budgets='$budgets',durable_type_code='DT105'";
					//echo $strSQL;exit;	
					
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=durable.php'>";
					mysql_close();
			  }
?>