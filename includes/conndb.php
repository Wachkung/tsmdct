<?php
$host = "localhost";
$user = "root";
$pwd = "212224236";
$db = "tsdchdb";
$link = mysql_connect($host,$user,$pwd) or die ("Could not connect to MySQL");
mysql_query("SET NAMES UTF8",$link);
mysql_select_db($db,$link) or die ("Could not select $db database");	
?>