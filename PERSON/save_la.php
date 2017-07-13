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
	
//รับค่ามาจากฟอร์ม
$idcard=$_POST['idcard'];
$la_date=$_POST['la_date'];
$lasasom=$_POST['lasasom'];

$sdate=substr($la_date,0,10);
$edate=substr($la_date,13,11);

$sdate1=substr($la_date,0,10);
$edate1=substr($la_date,13,11);

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
	$strSQLla = "SELECT left(sdate,10) , left(edate,10) FROM la where idcard = '$idcard' and left(sdate,10) = '$sdate1' and left(edate,10) = '$edate1'";
	//echo $strSQLla;exit;
	$objQueryla = mysql_query($strSQLla);
	$objResultla = mysql_fetch_array($objQueryla);
	$sdate2=$objResultla['0'];
	$edate2=$objResultla['1'];

	if ($sdate1 == $sdate2) {

	echo "ท่านได้ทำรายการบันทึกวันลานี้แล้ว";
	echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";

	 } else if ($sdate1 == $edate2) {

	echo "ท่านได้ทำรายการบันทึกวันลานี้แล้ว";
	echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";

	 } else if ($edate1 == $sdate2) {

	echo "ท่านได้ทำรายการบันทึกวันลานี้แล้ว";
	echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";

	 } else if ($edate1 == $edate2) {

	echo "ท่านได้ทำรายการบันทึกวันลานี้แล้ว ";
	echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";

	 } else  {

//up la
$strSQL = "insert into  la  set idcard='$idcard',sdate='$sdate',edate='$edate',latype='$latype',dsum='$dsum',dupdate='$dupdate',ladetail='$ladetail',laname='$laname' ";
//echo $strSQL;exit;
$objQuery = mysql_query($strSQL);
 }
echo"<meta http-equiv='refresh' content='0;URL=la_detail.php?idcard=$idcard'>";
mysql_close();
?>
