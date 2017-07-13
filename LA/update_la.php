<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$id=$_POST['id'];
$idcard=$_POST['idcard'];
$la_date=$_POST['la_date'];
$lasasom=$_POST['lasasom'];


$sdate=substr($la_date,0,19);
$edate=substr($la_date,21,20);


$latype=$_POST['latype'];
$dsum=$_POST['dsum'];
$detail=$_POST['detail'];
$ladetail=$_POST['ladetail'];
$laname=$_POST['laname'];
$dupdate=date("Y-m-d H:i:s");

if ($latype == 'ลาพักผ่อน') {
$total_lasasom=$lasasom-$dsum;	

			if ($total_lasasom < 0)
				die("<script>
						alert('จำนวนวันลาพักผ่อนท่านไม่พอ กรุณาติต่อเจ้าหน้าที่บุคลากร');
						history.back();
					 </script>");

$strSQL = "update  person  set lasasom='$total_lasasom'  where idcard='$idcard' ";
$objQuery = mysql_query($strSQL);

}

//up la
$strSQL = "update  la  set idcard='$idcard',sdate='$sdate',edate='$edate',latype='$latype',dsum='$dsum',dupdate='$dupdate',ladetail='$ladetail',laname='$laname' where idcard='$idcard' and id='$id'";
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);

echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";
mysql_close();
?>