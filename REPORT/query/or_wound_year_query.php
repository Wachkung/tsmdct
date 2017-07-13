
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year']; 
  $type_by=$_POST['type_by']; 

$startyear = $year_by-1;
$startyear1 = $year_by-4;
$startyear2 = $year_by-3;
$startyear3 = $year_by-2;
$startyear4 = $year_by-1;
$endyear = $year_by;
  



  $cap1 = substr($startyear,2,2);
  $cap2 = substr($endyear,2,2);

 $smd10 = '1001'; $sy10 =  $startyear.$smd10; 
 $emd10 = '1031'; $ey10 =  $startyear.$emd10;
 $smd11 = '1101'; $sy11 =  $startyear.$smd11;
 $emd11 = '1130'; $ey11 =  $startyear.$emd11;
 $smd12 = '1201'; $sy12 =  $startyear.$smd12;
 $emd12 = '1231'; $ey12 =  $startyear.$emd12;
 $smd01 = '0101'; $sy01 =  $endyear.$smd01;
 $emd01 = '0131'; $ey01 =  $endyear.$emd01;
 $smd02 = '0201'; $sy02 =  $endyear.$smd02;
 $emd02 = '0228'; $ey02 =  $endyear.$emd02;
 $smd03 = '0301'; $sy03 =  $endyear.$smd03;
 $emd03 = '0331'; $ey03 =  $endyear.$emd03;
 $smd04 = '0401'; $sy04 =  $endyear.$smd04;
 $emd04 = '0430'; $ey04 =  $endyear.$emd04;
 $smd05 = '0501'; $sy05 =  $endyear.$smd05;
 $emd05 = '0531'; $ey05 =  $endyear.$emd05;
 $smd06 = '0601'; $sy06 =  $endyear.$smd06;
 $emd06 = '0630'; $ey06 =  $endyear.$emd06;
 $smd07 = '0701'; $sy07 =  $endyear.$smd07;
 $emd07 = '0731'; $ey07 =  $endyear.$emd07;
 $smd08 = '0801'; $sy08 =  $endyear.$smd08;
 $emd08 = '0831'; $ey08 =  $endyear.$emd08;
 $smd09 = '0901'; $sy09 =  $endyear.$smd09;
 $emd09 = '0930'; $ey09 =  $endyear.$emd09;
     
         

$sql2 = "
select cdx.woundName as cname ,
 SUM(CASE WHEN year(cdx.cdate) = '$startyear1'  THEN cdx.cnumWound ELSE 0 END) AS Y1  ,    
SUM(CASE WHEN  year(cdx.cdate) = '$startyear2' THEN cdx.cnumWound ELSE 0 END) AS Y2  ,
SUM(CASE WHEN  year(cdx.cdate) = '$startyear3' THEN cdx.cnumWound ELSE 0 END) AS Y3  ,
SUM(CASE WHEN  year(cdx.cdate) = '$startyear4' THEN cdx.cnumWound ELSE 0 END) AS Y4  ,
SUM(CASE WHEN  year(cdx.cdate) = '$endyear' THEN cdx.cnumWound ELSE 0 END) AS Y5 from(SELECT
woundtype.`name` AS woundName,
Count(orwound.orno) AS cnumWound,
 ors.opdate  as cdate
FROM
woundtype
INNER JOIN orwound ON woundtype.`code` = orwound.woundtype 
INNER JOIN ors ON ors.orno = orwound.orno
WHERE
YEAR(ors.opdate) between '$startyear1' and  '$endyear'
group by woundtype.`name`,ors.opdate) as cdx group by cname

	    "; 

                            

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
               'cname' =>iconv('TIS-620','UTF-8//IGNORE',$row['cname']) ,             
                'Y1' => $row['Y1']  ,
                'Y2' => $row['Y2'] , 
                'Y3' => $row['Y3'] , 
                'Y4' => $row['Y4'] ,
				'Y5' => $row['Y5'] 		
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
