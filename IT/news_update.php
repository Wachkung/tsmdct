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
	$id=$_POST['id'];
	$category=$_POST["category"];
	$topic=$_POST["topic"];
	$headline=$_POST["headline"];
	$posted=$_POST["posted"];
	$post_date=$_POST["post_date"];
	$update_date=$_POST["update_date"];
	$strSQL = "update  news set category='$category',topic='$topic',headline='$headline',posted='$posted',post_date='$post_date',update_date='$update_date' where id='$id'	";
	$objQuery = mysql_query($strSQL);
	echo"<meta http-equiv='refresh' content='0;URL=news_edit.php?id=$id'>";
	mysql_close();					
?>
