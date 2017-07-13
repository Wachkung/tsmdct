 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="


 SELECT
b.icd10,icd101.icd10name,
sum(b.cns) as can

from( SELECT
a.cln,a.cns,a.hn,a.namecln,a.vn,a.vstdttm,ovstdx.icd10
from(SELECT ovst.vn, 
	ovst.vstdttm, 
	ovst.hn,
    count(ovst.vn) as cns, 
	ovst.cln, 
	cln.namecln
FROM cln INNER JOIN ovst ON cln.cln = ovst.cln
WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d') 
and ovst.cln ='20100'

group by ovst.vn)  as a INNER JOIN ovstdx on ovstdx.vn = a.vn  where ovstdx.cnt ='1')  as b 
 INNER join icd101 on icd101.icd10 = b.icd10  GROUP BY b.icd10  ORDER BY can desc limit 20
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'icd10'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10']),
				  'icd10name'=> $row['icd10name'] ,
				  
				  'can'=> $row['can']  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js11= json_encode($data);
	
	echo  $js11; 
	
	
	
?>

 