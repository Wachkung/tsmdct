 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="
SELECT

  a.rgttime as icd10,
  idpm.nameidpm  as inscl,
  icd101.icd10name,
hospcode.off_name1  as can

from
(SELECT 
 
 
	orfri.rfrno, 
	
orfri.rfrlct, 
      ipt.ward, 
  ipt.prediag,
	ipt.rgtdate, 
	ipt.rgttime
FROM ipt  

INNER JOIN orfri ON ipt.vn = orfri.vn
	  where ipt.rgtdate = CURDATE()) as a
INNER JOIN hospcode on hospcode.off_id = a.rfrlct
INNER JOIN icd101 on icd101.icd10 = a.prediag
INNER join idpm on idpm.idpm =a.ward  ORDER BY a.rgttime  asc
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		          'icd10'=> $row['icd10'] ,
			     'inscl'=> iconv('TIS-620','UTF-8//IGNORE',$row['inscl']) ,	
                                  'icd10name'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']),
				
				  
				  'can'=> iconv('TIS-620','UTF-8//IGNORE',$row['can'])  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js15= json_encode($data);
	
	echo  $js15; 
	
	
	
?>

 