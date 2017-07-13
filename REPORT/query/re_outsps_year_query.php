
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year']; 
 

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

SELECT   b.ward,b.nameidpm,
         SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy10' AND '$ey10' THEN b.can END) AS 'm10' ,
            SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy11' AND '$ey11' THEN b.can END) AS 'm11' ,
			  SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy12' AND '$ey12' THEN b.can END) AS 'm12' ,
			 SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy01' AND '$ey01' THEN b.can END) AS 'm1' ,
			    
			  SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy02' AND '$ey02' THEN b.can END) AS 'm2' ,
			 SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy03' AND '$ey03' THEN b.can END) AS 'm3' ,
			       SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy04' AND '$ey04' THEN b.can END) AS 'm4' ,
			  SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy05' AND '$ey05' THEN b.can END) AS 'm5' ,
			 SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy06' AND '$ey06' THEN b.can END) AS 'm6' ,
			  SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy07' AND '$ey07' THEN b.can END) AS 'm7' ,
			 SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy08' AND '$ey08' THEN b.can END) AS 'm8' , 
		  SUM(CASE WHEN date(b.vstdate) BETWEEN '$sy09' AND '$ey09' THEN b.can END) AS 'm9' , 
			  sum(b.can) as total
 

from(select a.rfrlct,  hospcode.namehosp,
       idpm.nameidpm,
       a.can,
        a.vstdate ,
      a.vsttime,
       a.ward
 from(SELECT orfro.rfrlct, 
       orfro.an,
       orfro.rfrno,
	     orfro.rfrcs, 
	     orfro.icd10, 
	     orfro.vstdate, 
	     orfro.vsttime, 
       orfro.ward ,
       count(orfro.rfrno) as can
FROM orfro
WHERE
date(orfro.vstdate) BETWEEN $sy10   and $ey09   
and orfro.an <> '0' and orfro.rfrlct = '10669'
GROUP BY  orfro.rfrlct,orfro.rfrcs,orfro.icd10,orfro.vstdate,orfro.vsttime,orfro.ward ,orfro.an,orfro.rfrno
ORDER BY orfro.vstdate  desc) as a
INNER JOIN idpm on idpm.idpm = a.ward 
INNER JOIN  hospcode on hospcode.off_id = a.rfrlct ORDER BY a.vstdate  desc) as b group by  b.ward  ORDER BY total desc
	    "; 


$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
               'namehosp' =>iconv('TIS-620','UTF-8//IGNORE',$row['nameidpm']) ,
                'm10' => $row['m10']  ,
                
                'm11' => $row['m11'] , 
				 
				'm12' => $row['m12'] , 
				'm1' => $row['m1'] , 
				'm2' => $row['m2'] , 
				'm3' => $row['m3'] , 
				'm4' => $row['m4'] , 
				'm5' => $row['m5'] , 
				'm6' => $row['m6'] ,
				'm7' => $row['m7'] , 
				'm8' => $row['m8'] ,
				'm9' => $row['m9'] , 
				 
			 
				'total' => $row['total'] 
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
