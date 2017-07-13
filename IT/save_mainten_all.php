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
$date_mainten=$_POST['date_mainten'];
$person_mainten=$_POST['person_mainten'];
$detail_mainten=$_POST['detail_mainten'];
$sql=" SELECT * FROM	 it_desktop   "; 
$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
$desktop_code=$data['desktop_code'];	
$strSQL = "insert into  it_mainten  values ('','$desktop_code','$date_mainten','$detail_mainten','$person_mainten')";
$objQuery = mysql_query($strSQL);	
 } 
echo"<meta http-equiv='refresh' content='0;URL=mainten_add.php'>";
mysql_close();
?>