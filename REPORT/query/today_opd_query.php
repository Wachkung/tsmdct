 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="


select  a.namecln,a.cln,sum(a.cns) as cns2
from(

SELECT ovst.vn, 
	ovst.vstdttm, 
	ovst.hn,
    count(ovst.vn) as cns, 
	ovst.cln, 
	cln.namecln
FROM cln INNER JOIN ovst ON cln.cln = ovst.cln
WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d') group by ovst.vn) as a GROUP BY a.cln ORDER BY cns2 desc
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

 