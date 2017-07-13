
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year']; 
  $type_by=$_POST['type_by']; 

  $startyear = $year_by-1;
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
select cdx.icd9 as cname ,cdx.icdname as nameicd9,
    SUM(CASE WHEN MONTH(cdx.cdate) = 01 THEN cdx.copdx ELSE 0 END) AS M1  ,
    
SUM(CASE WHEN MONTH(cdx.cdate) = 02 THEN cdx.copdx ELSE 0 END) AS M2  ,

SUM(CASE WHEN MONTH(cdx.cdate) = 03 THEN cdx.copdx ELSE 0 END) AS M3  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 04 THEN cdx.copdx ELSE 0 END) AS M4  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 05 THEN cdx.copdx ELSE 0 END) AS M5  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 06 THEN cdx.copdx ELSE 0 END) AS M6  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 07 THEN cdx.copdx ELSE 0 END) AS M7  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 08 THEN cdx.copdx ELSE 0 END) AS M8  ,

 SUM(CASE WHEN MONTH(cdx.cdate) = 09 THEN cdx.copdx ELSE 0 END) AS M9 ,
SUM(CASE WHEN MONTH(cdx.cdate) = 10 THEN cdx.copdx ELSE 0 END) AS M10  ,
SUM(CASE WHEN MONTH(cdx.cdate) = 11 THEN cdx.copdx ELSE 0 END) AS M11  ,

 SUM(CASE WHEN MONTH(cdx.cdate) = 12 THEN cdx.copdx ELSE 0 END) AS M12 ,
 SUM(cdx.copdx) as total
   from(SELECT
copdx,
icd9,
icdname,
cdate
FROM
(select count(a.date)as copdx ,a.icd9,a.icdname,a.date as cdate  from(SELECT
group_CONCAT(ioprt.icd9cm SEPARATOR ',') AS icd9,
group_CONCAT(ioprt.icd9name SEPARATOR ',') AS icdname,
ioprt.hn,
ioprt.date,
surgtype.namesurg
FROM
ioprt
INNER JOIN ors ON ors.opdate = ioprt.date AND ors.hn = ioprt.hn
INNER JOIN surgtype ON ors.surgtype = surgtype.codesurg
WHERE
ioprt.orno > '0' AND
date(ioprt.date)  between '$sy10' and  '$ey09' AND
ors.surgtype='$type_by'
GROUP BY
ioprt.date,hn
order by hn desc) as a GROUP BY
  a.hn  order by a.hn desc) AS bbb) as cdx group by cname order by  total desc

	    "; 

                            

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
               'cname' =>iconv('TIS-620','UTF-8//IGNORE',$row['cname']) ,
               'nameicd9' =>iconv('TIS-620','UTF-8//IGNORE',$row['nameicd9']) ,
                'M10' => $row['M10']  ,
                'M11' => $row['M11'] , 
                'M12' => $row['M12'] , 
				'M1' => $row['M1'] , 
				'M2' => $row['M2'] , 
				'M3' => $row['M3'] , 
				'M4' => $row['M4'] , 
				'M5' => $row['M5'] , 
				'M6' => $row['M6'] , 
				'M7' => $row['M7'] , 
				'M8' => $row['M8'] ,
				'M9' => $row['M9'] , 
				'total' => $row['total'] 		
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
