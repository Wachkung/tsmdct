 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="


 select a.cln,a.namecln,
SUM(CASE WHEN timeS between'00:00' AND '07:59' THEN a.can END) AS 'evening',     
SUM(CASE WHEN timeS between'08:00' AND '15:59' THEN a.can END) AS 'morning' ,
SUM(CASE WHEN timeS between'16:00' AND '19:59' THEN a.can END) AS 'bd' ,
SUM(CASE WHEN timeS between'20:00' AND '23:59' THEN a.can END) AS 'afternoon' ,

sum(a.can) as total
 
from(SELECT ovst.vn, 
	    DATE_FORMAT(ovst.vstdttm,'%H:%i') as timeS ,
    	ovst.vstdttm, 
	ovst.hn,
    count(ovst.vn) as can, 
	ovst.cln, 
	cln.namecln
FROM cln INNER JOIN ovst ON cln.cln = ovst.cln
WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d') group by ovst.vn) as a  GROUP BY a.cln
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'namecln'=>  iconv('TIS-620','UTF-8//IGNORE',$row['namecln']),
				  'evening'=> $row['evening'] ,
				  
				  'morning'=> $row['morning'] ,
                                    'bd'=> $row['bd'] ,
                                   'afternoon'=> $row['afternoon'] ,
		 
		  'total'=> $row['total'] 
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js10= json_encode($data);
	
	echo  $js10; 
	
	
	
?>

 