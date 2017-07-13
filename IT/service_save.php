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
$date_inform=substr($_POST['date_inform'],0,10);
$date_service=substr($_POST['date_service'],0,10);
$time_inform=$_POST['hh1'].":".$_POST['mm1'];
$time_service=$_POST['hh2'].":".$_POST['mm2'];
$person=$_POST['person'];
$depart=$_POST['depart'];
$cause=$_POST['cause'];
$detail_service=$_POST['detail_service'];
$person_service=$_POST['person_service'];
					
					$strSQL = "insert into  it_service set date_inform='$date_inform',time_inform='$time_inform',depart='$depart',person='$person',cause='$cause',date_service='$date_service',time_service='$time_service',detail_service='$detail_service',person_service='$person_service'";
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=service_add.php'>";
					mysql_close();					
?>
