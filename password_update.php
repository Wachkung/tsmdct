<?php

session_start();
	include("./includes/conndb.php"); 
	include("./includes/config.inc.php"); 
	//real_esc($_POST); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	//echo $IDCARD1;exit;
	if($_SESSION['IDCARD'] == "")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
//รับค่ามาจากฟอร์ม
$idcard=$_POST['idcard'];
$title=$_POST['title'];
$name=$_POST['name'];
$lastname=$_POST['lastname'];

$passold=sha1(md5(md5(stripslashes($_POST['passold']))));
$passnew1=sha1(md5(md5(stripslashes($_POST['passnew1']))));
$passnew2=sha1(md5(md5(stripslashes($_POST['passnew2']))));


	$strSQLPass = "SELECT * FROM user_datacenter WHERE idcard = '$IDCARD1' and PASSWORD = '$passold'";
	$objQueryPass = mysql_query($strSQLPass);
	//$objResultPass = mysql_fetch_array($objQueryPass);
	//$result = mysql_query($sql);
	$Num = mysql_num_rows($objQueryPass);

			if ($Num == 0)
				die("<script>
						alert('Old password incorrect');
						history.back();
					 </script>");

			// 2.2 password = repassword
			if ($passnew1 != $passnew2)
				die("<script>
						alert('Password is not same');
						history.back();
					 </script>");



			//up la
			$strSQL = "update  user_datacenter  set  PASSWORD='$passnew1'  where idcard='$idcard'";
			//echo $strSQL;exit;
			$objQuery = mysql_query($strSQL);
			echo "<script>
						alert('Update Password');
						window.location='index.php';
						</script>";
mysql_close();


?>
