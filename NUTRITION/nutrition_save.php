<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['NUTRITION'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม

$nutrition_id=$_POST['nutrition_id'];
$nutrition_name=$_POST['nutrition_name'];
$nutrition_sex=$_POST['nutrition_sex'];
$nutrition_hn=$_POST['nutrition_hn'];
$nutrition_date=$_POST['nutrition_date'];
$nutrition_dx=$_POST['nutrition_dx'];
$nutrition_fbs=$_POST['nutrition_fbs'];
$nutrition_bp=$_POST['nutrition_bp'];
$nutrition_bvn=$_POST['nutrition_bvn'];
$nutrition_cr=$_POST['nutrition_cr'];
$nutrition_tc=$_POST['nutrition_tc'];
$nutrition_tg=$_POST['nutrition_tg'];
$nutrition_ldl=$_POST['nutrition_ldl'];
//up nutrition
$strSQL = "insert into  nutrition  set nutrition_name='$nutrition_name',nutrition_sex='$nutrition_sex',nutrition_hn='$nutrition_hn',nutrition_date='$nutrition_date',nutrition_dx='$nutrition_dx',nutrition_fbs='$nutrition_fbs',nutrition_bp='$nutrition_bp',nutrition_bvn='$nutrition_bvn',nutrition_cr='$nutrition_cr',nutrition_tc='$nutrition_tc',nutrition_tg='$nutrition_tg',nutrition_ldl='$nutrition_ldl',nutrition_status='0' ";
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=index.php'>";
mysql_close();
?>