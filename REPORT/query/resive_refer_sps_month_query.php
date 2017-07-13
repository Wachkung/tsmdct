
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year_by']; 
  $month_by=$_POST['month_by']; 




$sql2 = "
select  
a.rgtdate  as  vstdate,
 a.rgttime as vsttime,
  idpm.nameidpm  as idpm,
  icd101.icd10name,
hospcode.off_name1  as hospcode,
 
hospcode.off_id  
from
(SELECT 
 
 
	orfri.rfrno, 
	
orfri.rfrlct, 
      ipt.ward, 
  ipt.prediag,
	ipt.rgtdate, 
	ipt.rgttime
FROM ipt  

INNER JOIN orfri ON ipt.vn = orfri.vn
	 WHERE YEAR(ipt.rgtdate) = '$year_by'  and MONTH(ipt.rgtdate) = '$month_by'  



) as a


INNER JOIN hospcode on hospcode.off_id = a.rfrlct
INNER JOIN icd101 on icd101.icd10 = a.prediag
INNER join idpm on idpm.idpm =a.ward 

where   hospcode.off_id  = '10669'
ORDER BY hospcode.off_name1  asc
 

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
