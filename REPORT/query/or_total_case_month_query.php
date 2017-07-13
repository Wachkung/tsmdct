
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year_by']; 
  $month_by=$_POST['month_by']; 




$sql2 = "

SELECT
a.date_day as a
,a.major as b
,a.minor as c
,a.intime as d
,a.outtime as e
,a.total as f
,b.major as g
,b.minor as h
,b.intime as i
,b.outtime as j
,b.total as k
FROM
(SELECT
date(ors.opdate) AS date_day,
SUM(IF(operation.opertype = 1,1,0)) as major,
SUM(IF(operation.opertype = 2,1,0)) as minor,
SUM(IF(TIME(ors.opstpdate) BETWEEN  '08:00:00' AND  '16:00:00',1,0)) as intime,
SUM(IF(TIME(ors.opstpdate) NOT BETWEEN  '08:00:00' AND  '16:00:00' '16:00:00',1,0)) as outtime,
SUM(IF(operation.opertype = 1,1,0))+SUM(IF(operation.opertype = 2,1,0)) AS total
FROM 
hi.ors
INNER JOIN hi.operation ON ors.orno = operation.orno
WHERE YEAR(ors.opdate) = '$year_by' AND MONTH(ors.opdate) = '$month_by'  AND ors.optype = 1 AND ors.opdate <> '0000-00-00'
GROUP BY date_day  ) AS a 

LEFT  JOIN 

(SELECT
date(ors.opdate) AS date_day,
SUM(IF(operation.opertype = 1,1,0)) as major,
SUM(IF(operation.opertype = 2,1,0)) as minor,
SUM(IF(TIME(ors.opstpdate) BETWEEN  '08:00:00' AND  '16:00:00',1,0)) as intime,
SUM(IF(TIME(ors.opstpdate) NOT BETWEEN  '08:00:00' AND  '16:00:00' '16:00:00',1,0)) as outtime,
SUM(IF(operation.opertype = 1,1,0))+SUM(IF(operation.opertype = 2,1,0)) AS total
FROM 
hi.ors
INNER JOIN hi.operation ON ors.orno = operation.orno
WHERE YEAR(ors.opdate) = '$year_by' AND MONTH(ors.opdate) = '$month_by'  AND ors.optype = 2  AND ors.opdate <> '0000-00-00'
GROUP BY date_day  ) AS b 
ON a.date_day = b.date_day
 "; 

                            

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
                       
                'a' => $row['a']  ,
                'b' => $row['b'] , 
                'c' => $row['c'] , 
                'd' => $row['d'] ,
				'e' => $row['e'], 
				'f' => $row['f']  ,
                'g' => $row['g'] , 
                'h' => $row['h'] , 
                'i' => $row['i'] ,
				'j' => $row['j'], 	
				'k' => $row['k']	
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
