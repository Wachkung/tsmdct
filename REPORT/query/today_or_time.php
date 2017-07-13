 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

SELECT  
  
	 orfupr.icd9name,
	DATE_FORMAT(ors.opstrdate,'%H:%i') AS star, 
	DATE_FORMAT(ors.opstpdate,'%H:%i') AS end
	
FROM orfupr INNER JOIN ors ON orfupr.vn = ors.vn
WHERE DATE_FORMAT(ors.opstrdate,'%Y-%m-%d') =  CURDATE()
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 
          $i = 1;
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		//   'today'=> $row['today'] ,

                                         'today'=> $i ,
		        
				 'icd9name'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd9name']),
				  'star'=> $row['star'] ,
				  
				  'end'=> $row['end']  
		 
		 
		 
		 
		 
		  );
	}  $i  ++;
	
  
	$js26= json_encode($data);
	
	echo  $js26; 
	
	
	
?>

 