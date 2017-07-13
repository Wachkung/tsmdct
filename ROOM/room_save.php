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

$idcard=$_POST['idcard'];
$depart=$_POST['depart'];
$strdate=$_POST['strdate'];
$enddate=$_POST['enddate'];
$strtime=$_POST['strtime'];
$endtime=$_POST['endtime'];
$room=$_POST['room'];
$room_type=$_POST['roomtype'];
$name=$_POST['name'];
$qty=$_POST['qty'];
$conduct_2_qty=$_POST['conduct_2_qty'];
 if ($_POST['conduct_2_qty'] == '') {$conduct_2_qty='0';}
$conduct_3_qty=$_POST['conduct_3_qty'];
 if ($_POST['conduct_3_qty'] == '') {$conduct_3_qty='0';}

$conduct=$_POST['conduct'];
 if ($_POST['conduct'] == '') {$conduct='N';}
$conduct_1=$_POST['conduct_1'];
 if ($_POST['conduct_1'] == '') {$conduct_1='N';}
$conduct_2=$_POST['conduct_2'];
 if ($_POST['conduct_2'] == '') {$conduct_2='N';}
$conduct_3=$_POST['conduct_3'];
 if ($_POST['conduct_3'] == '') {$conduct_3='N';}
$computer=$_POST['computer'];
 if ($_POST['computer'] == '') {$computer='N';}
$budget=$_POST['budget'];
 if ($_POST['budget'] == '') {$budget='N';}

					$strSQL = "insert into  meeting_list set idcard='$idcard',depart='$depart',strdate='$strdate',enddate='$enddate',strtime='$strtime',endtime='$endtime',room='$room',room_type='$room_type',name='$name',qty='$qty',conduct_2_qty='$conduct_2_qty',conduct_3_qty='$conduct_3_qty',conduct='$conduct',conduct_1='$conduct_1',conduct_2='$conduct_2',conduct_3='$conduct_3',computer='$computer',budget='$budget',mstatus='Y' "	;
					//echo $strSQL ;exit;
					$objQuery = mysql_query($strSQL);
					echo"<meta http-equiv='refresh' content='0;URL=room_add.php'>";
					mysql_close();					
?>