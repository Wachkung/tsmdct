 
 

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
now() AS timenow,
pt.hn AS hn,
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
DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( pt.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT( pt.brthdate, '00-%m-%d' ) ) AS age,
pt.brthdate AS birthdate,
orsx.ansstrdate  AS ansstart,
orsx.ansstpdate AS ansstop,
IF(DATE_ADD(orsx.ansstpdate,INTERVAL 1 HOUR) <= TIMESTAMP(now()),'ส่งต่อตึก',(IF(DATE_ADD(orsx.ansstpdate,INTERVAL -1 HOUR) <= TIMESTAMP(now()),'ผ่าตัดเสร็จ','ผ่าตัดเสร็จ'))) AS status /* ANES ลงเวลา + อีก 1 ชม.   เตรีบมส่งต่อตึก */

FROM  (SELECT * from hi.ors WHERE date(opdate)= '$datestop ' )  as orsx
LEFT JOIN ipt ON orsx.an = ipt.an
LEFT JOIN pt ON orsx.hn = pt.hn
WHERE date(orsx.opdate) = '$datestop '  AND orsx.ansstrdate > 0 OR orsx.ansstrdate <> '0000-00-00 00:00:00' 
 ORDER BY orsx.ansstpdate DESC 
";
	  

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());


	// $i = 1;
	 $num_rows = mysql_num_rows($result );
//echo $num_rows;
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


		$data[] = array(	
			//	  'id' => $i,				
			   'id' => $num_rows,
                'timenow' => $row['timenow']  ,
                'hn' => $row['hn']  ,
                'fullname' =>$row['sex'].' '.iconv('TIS-620','UTF-8//IGNORE',$row['fullname']) ,
                'age' => $row['age']  ,
                'ansstart' => $row['ansstart']  ,
                'ansstop' =>  $row['ansstop'] ,
                'status' =>$row['status'] 
			
                      );
	//	$i++; 
   $num_rows--;

					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>


