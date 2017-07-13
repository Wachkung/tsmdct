 
 

<?php 




error_reporting(0);

//include_once 'db.php';

 include_once '../config/connect_hisql.php';    
include_once '../config/datetype.php';
include_once '../config/dateThai.php';


$datestop = date("Y-m-d");
$x = date("d")-1;
$y = date("Y-m-");
$datestart = $y.$x;



  $connect =connectToDB();


	if($_GET['req']==1){  
	 

 
$sql2 =" SELECT
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
 and year(ipt.rgtdate) =DATE_FORMAT(NOW(),'%Y')  


GROUP BY ipt.an
 ) as a  
INNER JOIN idpm on idpm.idpm = a.ward  GROUP BY a.ward  order by ans2 desc LIMIT 6, 6
";
	  
	
$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 6;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


				




		$data[] = array(	
								
			      'id' =>  $i ,          
			        'nameidpm' =>iconv('TIS-620','UTF-8//IGNORE',$row['nameidpm']) ,  
                'ans2' => $row['ans2']  ,
			
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>


