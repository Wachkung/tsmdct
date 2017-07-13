 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

select
a.dchtime  as icd10,
a.icd10name,
a.nameidpm  as can


from(SELECT ipt.ward,  
     ipt.an,
	ipt.dchdate, 
group_CONCAT(iptdx.icd10 SEPARATOR ',') AS icd10,
GROUP_CONCAT(icd101.icd10name SEPARATOR ',') AS icd10name,
     ipt.dchtime ,
     idpm.nameidpm
     
     
FROM iptdx INNER JOIN ipt ON iptdx.an = ipt.an


 INNER JOIN icd101  on icd101.icd10 = iptdx.icd10
 INNER JOIN idpm  on idpm.idpm = ipt.ward

WHERE ipt.dchdate = CURDATE()   and ipt.dchtype in('8','9')

 group by ipt.an,ipt.dchdate,ipt.dchtime,ipt.ward) as a  ORDER BY   a.dchdate, a.dchtime  asc
 
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		        
				 'icd10'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10']),
				  'icd10name'=> iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']) ,
				  
				  'can'=> iconv('TIS-620','UTF-8//IGNORE',$row['can'])  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js11= json_encode($data);
	
	echo  $js11; 
	
	
	
?>

 