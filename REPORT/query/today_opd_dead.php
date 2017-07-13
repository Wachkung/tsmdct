 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

SELECT
a.vsttime  as  icd10,
a.icd10 as  ssss,
a.icd10name,
cln.namecln  as  can,
a.vstdate
from

(SELECT ovstost.ovstost, 
	ovstost.nameovstos, 
	DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d') AS vstdate, 
    DATE_FORMAT(ovst.vstdttm,'%H:%i:%s') AS vsttime,
	ovst.hn, 
	 ovst.cln,
  group_CONCAT(ovstdx.icd10 SEPARATOR ',') AS icd10,
 group_CONCAT(icd101.icd10name SEPARATOR ',') AS icd10name
FROM 
ovstost 
INNER JOIN ovst ON ovstost.ovstost = ovst.ovstost
INNER JOIN ovstdx ON ovstdx.vn = ovst.vn
INNER join icd101 on icd101.icd10 = ovstdx.icd10
WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d') = CURDATE()
and
ovstost.ovstost = '2'  
GROUP by  ovst.vstdttm,ovst.hn) as a 

INNER join cln on cln.cln  =  a.cln  ORDER BY  a.vstdate desc
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'icd10'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10']),
				  'icd10name'=> iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']) ,
				  
				  'can'=> iconv('TIS-620','UTF-8//IGNORE',$row['can'])  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js11= json_encode($data);
	
	echo  $js11; 
	
	
	
?>

 