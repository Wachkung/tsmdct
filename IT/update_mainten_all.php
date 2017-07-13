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
$date_mainten=substr($date_mainten,0,10);
$person_mainten=$_POST['person_mainten'];
$detail_mainten=$_POST['detail_mainten'];

$sql=" SELECT * FROM it_desktop"; 
$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
$desktop_code=$data['desktop_code'];	

$strSQL = "update  it_mainten  set date_mainten='$date_mainten',detail_mainten='$detail_mainten',person_mainten='$person_mainten' where (date_mainten='$date_mainten' and code='$desktop_code') ";
$objQuery = mysql_query($strSQL);	
 } 
echo"<meta http-equiv='refresh' content='0;URL=mainten_edit.php?date_mainten=$date_mainten'>";
mysql_close();
?>
