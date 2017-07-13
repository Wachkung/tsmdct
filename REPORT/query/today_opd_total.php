<?php 
 echo " ·´ÊÍº ";
error_reporting(0);
include_once '../../includes/connect_hisql.php';
include_once '../../includes/datetype.php';

$connect =connectToDB();
$query="
	 SELECT  
	   'total is today' as  namecln,
	count(ovst.vn) as cns2 
	FROM cln INNER JOIN ovst ON cln.cln = ovst.cln
	WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d')  
	";
	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
				 'namecln'=>  iconv('TIS-620','UTF-8//IGNORE',$row['namecln']),
				  'cns2'=> $row['cns2'] 
		  );
	}
	$js111= json_encode($data);
	
	echo  $js111; 
?>

 