<?php 




error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';
    
include_once '../config/datetype.php';

$datestop = date("Y-m-d");
$x = date("d")-1;
$y = date("Y-m-");
$datestart = $y.$x;



  $connect =connectToDB();


	if($_GET['req']==1){  
	 

 
$sql2 ="   SELECT 
cln.namecln
,COUNT(ovst.vn) AS cHN
FROM
hi.ovst
INNER JOIN hi.cln ON ovst.cln = cln.cln
WHERE 
DATE(ovst.vstdttm) = DATE(now()) AND cln.cln <> '00100' 
GROUP BY ovst.cln order by cHN DESC limit 10
 
 
";
	  
	
$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 1;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


		$data[] = array(	
								
			    'id' =>  $i ,               
                'namecln' =>iconv('TIS-620','UTF-8//IGNORE',$row['namecln']) ,    
                'cHN' => $row['cHN']  ,
				
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>

