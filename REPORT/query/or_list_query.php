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
	 

 
$sql2 ="   SELECT DISTINCT
x.hn as hn,
x.dttmor,
concat(x.fname,' ',x.lname) AS fullname ,
if(DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( x.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT( x.brthdate, '00-%m-%d' ) )>=15
,
if(x.mrtlst = 1 OR x.mrtlst = 6,
CASE x.male 
WHEN 1 THEN 'นาย'
WHEN 2 THEN 'นางสาว'
END
,
CASE x.male 
WHEN 1 THEN 'นาย'
WHEN 2 THEN 'นาง'
END
)
,CASE x.male 
WHEN 1 THEN 'ด.ช.'
WHEN 2 THEN 'ด.ญ.'
END
) AS sex,
DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( x.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT(x.brthdate, '00-%m-%d' ) ) AS age,
x.ansstrdate  AS ansstart,
x.ansstpdate AS ansstop,
IF(x.ansstrdate = Null,'รอ','รอ') AS status,
x.ansstrdate,

x.qor,
x.roomor,

x.ansstpdate
FROM 

(SELECT
orrgt.dttmor,
pt.male,
pt.mrtlst,
pt.fname,
pt.lname,
pt.infmname,
pt.hn,
pt.brthdate,
orrgt.an,
orsx.ansstrdate,
orrgt.qor,
 orrgt.roomor,

orsx.ansstpdate
FROM
hi.orrgt
LEFT JOIN hi.ipt ON orrgt.hn = ipt.hn
LEFT JOIN hi.pt ON orrgt.hn = pt.hn
LEFT JOIN (SELECT * from hi.ors WHERE date(opdate)= '$datestop' ) AS orsx ON orrgt.hn = orsx.hn
WHERE date(orrgt.dttmor) = '$datestop'  AND orsx.ansstrdate IS NULL OR orsx.ansstrdate = '0000-00-00 00:00:00'  GROUP BY orrgt.HN
ORDER BY orrgt.qor  ,   orrgt.roomor     ASC
 
) AS x   where x.roomor <> 0  ORDER BY x.qor     ASC

 
 
";
	  
	
$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 1;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


		$data[] = array(	
								
			    'id' =>  $i ,               
                'timenow' => $row['timenow']  ,
                'hn' => $row['hn']  ,
                'fullname' =>$row['sex'].' '.iconv('TIS-620','UTF-8//IGNORE',$row['fullname']) ,
                'age' => $row['age']  ,
                'ansstart' => $row['ansstart']  ,
                'ansstop' => $row['ansstop']  ,
                'status' =>$row['status'] ,
				
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>

