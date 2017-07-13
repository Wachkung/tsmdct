 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="
SELECT DATE_FORMAT(emergency.vstdttm,'%H:%i') AS icd10, 
	group_CONCAT(ovstdx.icd10 SEPARATOR ',') AS inscl, 
	group_CONCAT(icd101.icd10name SEPARATOR ',') AS icd10name, 
	
(
  CASE ovst.ovstost
  WHEN '1' THEN 'กลับบ้าน'
  WHEN '2' THEN  'ตาย'
  WHEN  '3' THEN 'Refer'
  WHEN  '4' THEN  'Admitted'

 ELSE
 '' 
  END
 ) AS  can,
   


emergency.traffic, 
	ovst.hn, 
	emergency.vstdttm, 
	emergency.vn
	 


 
FROM emergency INNER JOIN ovst ON ovst.vn = emergency.vn AND ovst.vstdttm = emergency.vstdttm
	 INNER JOIN acci ON acci.codeacci = emergency.traffic
	 INNER JOIN ovstdx ON ovstdx.vn = ovst.vn
	 INNER JOIN icd101 ON icd101.icd10 = ovstdx.icd10
WHERE DATE_FORMAT(emergency.vstdttm,'%Y-%m-%d') = CURDATE()
GROUP BY emergency.traffic,emergency.vstdttm,ovst.hn
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		          'icd10'=> $row['icd10'] ,
			     'inscl'=> iconv('TIS-620','UTF-8//IGNORE',$row['inscl']) ,	
                                  'icd10name'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']),
				
				  
				  'can'=> $row['can']
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js15= json_encode($data);
	
	echo  $js15; 
	
	
	
?>

 