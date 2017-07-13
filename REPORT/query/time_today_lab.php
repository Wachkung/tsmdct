 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

 
select a.labcode,lab.labname  as namecln,
count(CASE WHEN timeS between'0' AND '759' THEN a.can END) AS 'evening',     
count(CASE WHEN timeS between'800' AND '1559' THEN a.can END) AS 'morning' ,
 
count(CASE WHEN timeS between'1600' AND '2359' THEN a.can END) AS 'afternoon' ,

count(a.can) as total,
''
 
from(
SELECT lbbk.lfudate, 
	lbbk.labcode, 
	lbbk.ln as can, 
	lbbk.vn, 
	 
	 
	lbbk.finish, 
	lbbk.senddate,
     lbbk.sendtime AS timeS 
FROM lbbk
WHERE  lbbk.senddate = CURDATE()   ORDER BY  vn  desc) as a
INNER join lab on lab.labcode = a.labcode GROUP BY a.labcode    order by  total  desc


 
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

 