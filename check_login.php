<?php
	session_start();
	include("includes/conndb.php");
	include("./includes/config.inc.php");
	// real_esc($_POST);

	$_SESSION["YYYY"] =$YYYY;

	$strSQL = "SELECT * FROM user_datacenter WHERE IDCARD = '".mysql_real_escape_string($_POST['Datacenter_Username'])."'
	and PASSWORD = '".mysql_real_escape_string(sha1(md5(md5(stripslashes($_POST['Datacenter_Password'])))))."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
			echo"<meta http-equiv='refresh' content='1;URL=index.php#ajax/page_login.php'>";
	}
	else
	{
			$_SESSION["ADMIN"] = $objResult["ADMIN"];
			$_SESSION["STATUS"] = $objResult["STATUS"];
			$_SESSION["IDCARD"] = $objResult["IDCARD"];
			$_SESSION["DEPART"] = $objResult["DEPART"];
			$_SESSION["IT"] = $objResult["IT"];
			$_SESSION["RISK"] = $objResult["RISK"];
			$_SESSION["LA"] = $objResult["LA"];
			$_SESSION["ROOM"] = $objResult["ROOM"];
			$_SESSION["PERSON"] = $objResult["PERSON"];
			$_SESSION["NUTRITION"] = $objResult["NUTRITION"];
			$_SESSION["REPORT"] = $objResult["REPORT"];
			$_SESSION["ENV"] = $objResult["ENV"];
			$_SESSION["PCT"] = $objResult["PCT"];
			$_SESSION["PTC"] = $objResult["PTC"];
			$_SESSION["IC"] = $objResult["IC"];
			$_SESSION["IM"] = $objResult["IM"];
			$_SESSION["HRD"] = $objResult["HRD"];
			$_SESSION["DURABLE"] = $objResult["DURABLE"];
			//echo $_SESSION["DURABLE"]; exit;
			session_write_close();

				header("location:main.php");

	}
	mysql_close();
?>
