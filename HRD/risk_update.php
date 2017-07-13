<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['HRD'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$id=$_POST['id'];
$hnno=$_POST['hnno'];
$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$departreport=$_POST['departreport'];
$departrespon=$_POST['departrespon'];
$daterigter=$_POST['daterigter'];
$timer=$_POST['timer'];
$fromevent=$_POST['fromevent'];
$dataevent=$_POST['dataevent'];
$commen=$_POST['commen'];
$typereport=$_POST['typereport'];
$notepatient=$_POST['notepatient'];
$notehead=$_POST['notehead'];
$noteceo=$_POST['noteceo'];
$notedepart=$_POST['notedepart'];
$star=$_POST['star'];
$statusconfirm=$_POST['statusconfirm'];
$datereport=$_POST['datereport'];
$daterespon=$_POST['daterespon'];
$strSQL = "update risk2_datarisk set hnno='$hnno', name='$name',departreport='$departreport', departrespon= '$departrespon', daterigter='$daterigter', timer='$timer', fromevent='$fromevent', dataevent='$dataevent', commen='$commen', typereport='$typereport', notepatient='$notepatient', notehead='$notehead', noteceo='$noteceo', notedepart='$notedepart', star='$star', datereport='$datereport', daterespon=now() where id=$id";
$objQuery = mysql_query($strSQL);
echo"<meta http-equiv='refresh' content='0;URL=risk_detail.php?id=$id'>";
mysql_close();
?>