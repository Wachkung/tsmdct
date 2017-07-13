 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="
SELECT
  
a.vsttime  as icd10,
 cln.namecln  as inscl,

icd101.icd10name,
 
hospcode.off_name1  as can
from

(SELECT orfro.rfrlct, 
	orfro.cln, 
	orfro.rfrcs, 
	orfro.icd10, 
	orfro.vstdate, 
	orfro.vsttime, 
	orfro.ward
FROM orfro
WHERE DATE_FORMAT(orfro.vstdate,'%Y-%m-%d')= CURDATE() and orfro.cln is not  null
ORDER BY orfro.vsttime asc) as a   
INNER join icd101 on icd101.icd10 = a.icd10
INNER join cln on cln.cln =a.cln
inner join  hospcode on hospcode.off_id = a.rfrlct
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

 