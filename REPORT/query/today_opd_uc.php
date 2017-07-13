 

<?php 



error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';
  

  $connect =connectToDB();


	 
	 

 
$query="

 SELECT pttype.stdcode as icd10,
      pttype.namepttype as icd10name,
     a.pttype,
     pttype.inscl,
  sum(a.cns) as can 
from(SELECT ovst.vn, 
	ovst.vstdttm, 
	ovst.hn, 
	count(ovst.vn) AS cns, 
	ovst.cln, 
	cln.namecln, 
	ovst.pttype
FROM cln INNER JOIN ovst ON cln.cln = ovst.cln
WHERE DATE_FORMAT(ovst.vstdttm,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d')
GROUP BY ovst.vn) as a INNER JOIN pttype on pttype.pttype = a.pttype   GROUP BY   a.pttype   ORDER BY  can desc 
";
	  
	 
	
	
	
	
	
	
	
	
	
	 
	
	 
		 	$result = mysql_query($query) or die("SQL Error 1: " . mysql_error());
	 

	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[] = array(
			 
				 
			  
				
		 
		          'icd10'=> $row['icd10'] ,
			     'inscl'=> $row['inscl'] ,	
                                  'icd10name'=>  iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']),
				
				  
				  'can'=> $row['can']  
		 
		 
		 
		 
		 
		  );
	}
	
  
	$js15= json_encode($data);
	
	echo  $js15; 
	
	
	
?>

 