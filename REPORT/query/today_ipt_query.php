 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  
  
  $connect =connectToDB();


	 
	 

 
$query="


 select
a.ward,
idpm.nameidpm, 
sum(a.cns) as ans2,
a.dchdate,a.rgttime
,a.rgtdate,a.dchtype
from(SELECT ipt.vn, 
	count(ipt.an) as cns, 
	ipt.hn, 
	ipt.rgtdate, 
	ipt.dchdate, 
	ipt.ward, 
	ipt.dchtype,
      ipt.an,
ipt.rgttime
FROM ipt
WHERE ipt.dchdate = '0000-00-00' AND 
 ipt.dchtype ='0' and ipt.ward !=''
 
  and  DATE_FORMAT(ipt.rgtdate,'%Y') = DATE_FORMAT(NOW(),'%Y')
  and ward <> '11'

GROUP BY ipt.an
 ) as a  
INNER JOIN idpm on idpm.idpm = a.ward  GROUP BY a.ward  order by ans2 desc
	  
	";
	 
	
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			
			 
				 'nameidpm'=>  iconv('TIS-620','UTF-8//IGNORE',$row['nameidpm']),
				  'ans2'=> $row['ans2'] 
				  
				  
		 
		 
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js1= json_encode($data);
	
	echo  $js1; 
	
	
	
?>

 