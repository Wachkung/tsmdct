 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="


select a.xrycode,a.xryname  as namecln,
count(CASE WHEN timeS between'0' AND '759' THEN a.can END) AS 'evening',     
count(CASE WHEN timeS between'800' AND '1559' THEN a.can END) AS 'morning' ,
 
count(CASE WHEN timeS between'1600' AND '2359' THEN a.can END) AS 'afternoon' ,

count(a.can) as total
 
from(
SELECT xryrqt.xrycode AS can, 
	xray.xryname, 
	xryrqt.xrycode, 
	xryrqt.vsttime  as timeS
FROM xray INNER JOIN xryrqt ON xray.xrycode = xryrqt.xrycode
WHERE DATE_FORMAT(xryrqt.vstdate,'%Y-%m-%d') = CURDATE()

ORDER BY can DESC) as a  GROUP BY a.xrycode    order by total desc
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'namecln'=>  iconv('TIS-620','UTF-8//IGNORE',$row['namecln']),
				  'evening'=> $row['evening'] ,
				  
				  'morning'=> $row['morning'] ,
                                  
                                   'afternoon'=> $row['afternoon'] ,
		 
		  'total'=> $row['total'] 
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js27= json_encode($data);
	
	echo  $js27; 
	
	
	
?>

 