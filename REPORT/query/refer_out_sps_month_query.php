
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year_by']; 
  $month_by=$_POST['month_by']; 




$sql2 = "
 SELECT
  


 
idpm.nameidpm as idpm,
a.vstdate,
a.vsttime  as vsttime,
icd101.icd10name,
 
hospcode.off_name1  as hospcode
from

(SELECT orfro.rfrlct, 
 
	orfro.rfrcs, 
	orfro.icd10, 
	orfro.vstdate, 
	orfro.vsttime, 
	orfro.ward
FROM orfro
WHERE
DATE_FORMAT(orfro.vstdate,'%Y') = '$year_by'  and MONTH(orfro.vstdate) = '$month_by'    



ORDER BY orfro.vsttime asc) as a   
INNER join icd101 on icd101.icd10 = a.icd10
INNER join idpm on idpm.idpm =a.ward
inner join  hospcode on hospcode.off_id = a.rfrlct  where hospcode.off_id = '10669' ORDER BY idpm.nameidpm, a.vstdate  asc
 "; 

                       

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
             
				 'idpm'=>  iconv('TIS-620','UTF-8//IGNORE',$row['idpm']),
				  'vstdate'=>  iconv('TIS-620','UTF-8//IGNORE',$row['vstdate']),
				  'vsttime'=> $row['vsttime'] ,
				      'icd10name'=> iconv('TIS-620','UTF-8//IGNORE',$row['icd10name']) ,
				  'hospcode'=> iconv('TIS-620','UTF-8//IGNORE',$row['hospcode']) 
                                    
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
