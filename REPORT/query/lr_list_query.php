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
	ipt.vn, 
  ipt.an,
	ipt.hn,
if(DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( pt.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT( pt.brthdate, '00-%m-%d' ) )>=15
,
if(pt.mrtlst = 1 OR pt.mrtlst = 6,
CASE pt.male 
WHEN 1 THEN 'นาย'
WHEN 2 THEN 'นางสาว'
END
,
CASE pt.male 
WHEN 1 THEN 'นาย'
WHEN 2 THEN 'นาง'
END
)
,CASE pt.male 
WHEN 1 THEN 'ด.ช.'
WHEN 2 THEN 'ด.ญ.'
END
) AS sex,
concat(pt.fname,' ',pt.lname) AS fullname ,
DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( pt.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT(pt.brthdate, '00-%m-%d' ) ) AS age, 
	ipt.rgtdate, 
	ipt.dchdate, 
	ipt.ward, 
	ipt.dchtype,
 ipt.rgttime,
 substr(iptadm.bedno,3,2) as bedno
FROM ipt
LEFT JOIN iptadm ON iptadm.an = ipt.an
LEFT JOIN pt ON ipt.hn = pt.hn
WHERE ipt.dchdate = '0000-00-00' AND 
 ipt.dchtype ='0' and ipt.ward ='01'
 and year(ipt.rgtdate) = DATE_FORMAT(NOW(),'%Y')  ORDER BY pt.fname ASC 
 
 
";
	  
	
$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 1;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


		$data[] = array(	
								
			    'id' =>  $i ,      
                'fullname' =>$row['sex'].' '.iconv('TIS-620','UTF-8//IGNORE',$row['fullname']) ,
                'age' => $row['age']  ,
                'bedno' => $row['bedno']  ,
               
				
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>

