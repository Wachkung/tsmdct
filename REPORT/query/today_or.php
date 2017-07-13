 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

SELECT
DATE_FORMAT(a.dttmor,'%d/%m/%Y') as today,
a.icd10,

icd101.icd10name,

a.icd9name 

from(SELECT orrgt.hn, 
	orrgt.vn, 
	orrgt.icd10, 
	orrgt.icd9cm, 
	orrgt.dttmor, 
	orrgt.dttmuro, 
	orrgt.dttmslp, 
	orfupr.icd9name
FROM orfupr INNER JOIN orrgt ON orfupr.vn = orrgt.vn
WHERE DATE_FORMAT(orrgt.dttmor,'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')group by vn) as a  INNER JOIN icd101 on icd101.icd10 = a.icd10
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 
          $i = 1;
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		//   'today'=> $row['today'] ,

                                         'today'=> $i ,
		        
				 'icd10'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10']),
				  'icd10name'=> $row['icd10name'] ,
				  
				  'icd9name'=> $row['icd9name']  
		 
		 
		 
		 
		 
		  );
	}  $i  ++;
	
  
	$js20= json_encode($data);
	
	echo  $js20; 
	
	
	
?>

 