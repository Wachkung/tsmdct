 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="
 
SELECT

acci.nameacci  as icd10,
 a.icd103 as inscl,
 a.icd10name,
COUNT(a.traffic) AS  can

from
(SELECT emergency.vn, 
	emergency.traffic, 
	emergency.vstdttm, 
	ovst.hn, 
	  
 group_CONCAT(ovstdx.icd10 SEPARATOR ',') AS icd103,
 group_CONCAT(icd101.icd10name SEPARATOR ',') AS icd10name

	 
FROM emergency INNER JOIN ovst ON ovst.vn = emergency.vn AND ovst.vstdttm = emergency.vstdttm
	 INNER JOIN acci ON acci.codeacci = emergency.traffic
	 INNER JOIN ovstdx ON ovstdx.vn = ovst.vn
      INNER join icd101  on icd101.icd10 = ovstdx.icd10
WHERE DATE_FORMAT(emergency.vstdttm,'%Y-%m-%d') = CURDATE()   GROUP BY  emergency.traffic,emergency.traffic,emergency.vstdttm,ovst.hn) as a
 INNER join acci on acci.codeacci =a.traffic    GROUP BY  a.traffic
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		          'icd10'=> iconv('TIS-620','UTF-8//IGNORE',$row['icd10']) ,
			     'inscl'=> iconv('TIS-620','UTF-8//IGNORE',$row['inscl']) ,	
                                  'icd10name'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']),
				
				  
				  'can'=> iconv('TIS-620','UTF-8//IGNORE',$row['can'])  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js15= json_encode($data);
	
	echo  $js15; 
	
	
	
?>

 