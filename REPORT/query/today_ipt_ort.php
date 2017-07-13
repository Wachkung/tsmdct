 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="


 select
a.prediag  as icd10,
icd101.icd10name,
sum(a.cns) as can

from
(SELECT ipt.vn, 
	count(ipt.an) AS cns, 
	ipt.hn, 
	ipt.rgtdate, 
	ipt.dchdate, 
	ipt.ward, 
	ipt.dchtype, 
	ipt.an, 
	ipt.prediag
FROM ipt
WHERE ipt.dchdate = '0000-00-00' AND 
 ipt.dchtype ='0'  
 and year(ipt.rgtdate) =DATE_FORMAT(NOW(),'%Y')  
and ipt.ward ='03' 
GROUP BY ipt.an) as a INNER JOIN icd101 ON icd101.icd10 = a.prediag GROUP BY a.prediag   ORDER BY can desc 
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'icd10'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10']),
				  'icd10name'=> $row['icd10name'] ,
				  
				  'can'=> $row['can']  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js18= json_encode($data);
	
	echo  $js18; 
	
	
	
?>

 