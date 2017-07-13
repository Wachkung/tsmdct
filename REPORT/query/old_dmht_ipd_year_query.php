
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
     
          if($type_by==7){


$sql2 = "

SELECT
CASE grdmht.grschizo 
 WHEN '1' THEN 'E10-E14'
 WHEN '2' THEN 'I10-I115/167.4/H35.0'
 WHEN '3' THEN 'I21.0-I21.3'
 WHEN '4' THEN 'I20-I25'
 WHEN '5' THEN 'J440-J449'
 WHEN '6' THEN 'N181-N184' END as icd10
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey10' , xx.hn, null)) as human_a
,sum(if(MONTH(xx.dchdate)=10,xx.daycnt,null))  as visit_a
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy11' AND '$ey11' , xx.hn, null)) as human_b
,sum(if(MONTH(xx.dchdate)=11,xx.daycnt,null))  as visit_b
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy12' AND '$ey12' , xx.hn, null)) as human_c
,sum(if(MONTH(xx.dchdate)=12,xx.daycnt,null))  as visit_c
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy01' AND '$ey01' , xx.hn, null)) as human_d
,sum(if(MONTH(xx.dchdate)=1,xx.daycnt,null))  as visit_d
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy02' AND '$ey02' , xx.hn, null)) as human_e
,sum(if(MONTH(xx.dchdate)=2,xx.daycnt,null))  as visit_e
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy03' AND '$ey03' , xx.hn, null)) as human_f
,sum(if(MONTH(xx.dchdate)=3,xx.daycnt,null))  as visit_f
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy04' AND '$ey04' , xx.hn, null)) as human_g
,sum(if(MONTH(xx.dchdate)=4,xx.daycnt,null))  as visit_g
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy05' AND '$ey05' , xx.hn, null)) as human_h
,sum(if(MONTH(xx.dchdate)=5,xx.daycnt,null))  as visit_h
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy06' AND '$ey06' , xx.hn, null)) as human_i
,sum(if(MONTH(xx.dchdate)=6,xx.daycnt,null))  as visit_i
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy07' AND '$ey07', xx.hn, null)) as human_j
,sum(if(MONTH(xx.dchdate)=7,xx.daycnt,null))  as visit_j
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy08' AND '$ey08' , xx.hn, null)) as human_k
,sum(if(MONTH(xx.dchdate)=8,xx.daycnt,null))  as visit_k
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy09' AND '$ey09' , xx.hn, null)) as human_l
,sum(if(MONTH(xx.dchdate)=9,xx.daycnt,null)) as visit_l
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey09' , xx.hn, null)) as human_total
,SUM( IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey09' , xx.daycnt, null)) as visit_total
FROM
hi.grdmht
INNER JOIN (SELECT  ipt.daycnt, ipt.rgtdate, ipt.dchdate, ipt.hn, iptdx.icd10 FROM hi.ipt  INNER JOIN hi.iptdx ON ipt.an = iptdx.an WHERE date(ipt.dchdate) BETWEEN '$sy10' AND '$ey09' ) AS xx
ON grdmht.icd10 = xx.icd10
GROUP BY grdmht.grschizo

	    "; 

          }else{
          	
 $sql2 = "
SELECT
CASE grdmht.grschizo 
 WHEN '1' THEN 'E10-E14'
 WHEN '2' THEN 'I10-I115/167.4/H35.0'
 WHEN '3' THEN 'I21.0-I21.3'
 WHEN '4' THEN 'I20-I25'
 WHEN '5' THEN 'J440-J449'
 WHEN '6' THEN 'N181-N184' END as icd10
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey10' , xx.hn, null)) as human_a
,sum(if(MONTH(xx.dchdate)=10,xx.daycnt,null))  as visit_a
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy11' AND '$ey11' , xx.hn, null)) as human_b
,sum(if(MONTH(xx.dchdate)=11,xx.daycnt,null))  as visit_b
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy12' AND '$ey12' , xx.hn, null)) as human_c
,sum(if(MONTH(xx.dchdate)=12,xx.daycnt,null))  as visit_c
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy01' AND '$ey01' , xx.hn, null)) as human_d
,sum(if(MONTH(xx.dchdate)=01,xx.daycnt,null))  as visit_d
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy02' AND '$ey02' , xx.hn, null)) as human_e
,sum(if(MONTH(xx.dchdate)=02,xx.daycnt,null))  as visit_e
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy03' AND '$ey03' , xx.hn, null)) as human_f
,sum(if(MONTH(xx.dchdate)=03,xx.daycnt,null))  as visit_f
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy04' AND '$ey04' , xx.hn, null)) as human_g
,sum(if(MONTH(xx.dchdate)=04,xx.daycnt,null))  as visit_g
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy05' AND '$ey05' , xx.hn, null)) as human_h
,sum(if(MONTH(xx.dchdate)=05,xx.daycnt,null))  as visit_h
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy06' AND '$ey06' , xx.hn, null)) as human_i
,sum(if(MONTH(xx.dchdate)=06,xx.daycnt,null))  as visit_i
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy07' AND '$ey07', xx.hn, null)) as human_j
,sum(if(MONTH(xx.dchdate)=07,xx.daycnt,null))  as visit_j
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy08' AND '$ey08' , xx.hn, null)) as human_k
,sum(if(MONTH(xx.dchdate)=08,xx.daycnt,null))  as visit_k
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy09' AND '$ey09' , xx.hn, null)) as human_l
,sum(if(MONTH(xx.dchdate)=09,xx.daycnt,null)) as visit_l
,COUNT(DISTINCT IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey09' , xx.hn, null)) as human_total
,SUM( IF(date(xx.dchdate) BETWEEN '$sy10' AND '$ey09' , xx.daycnt, null)) as visit_total
FROM
hi.grdmht
INNER JOIN (SELECT  ipt.daycnt, ipt.rgtdate, ipt.dchdate, ipt.hn, iptdx.icd10 FROM hi.ipt  INNER JOIN hi.iptdx ON ipt.an = iptdx.an WHERE date(ipt.dchdate) BETWEEN '$sy10' AND '$ey09' ) AS xx
ON grdmht.icd10 = xx.icd10
WHERE  grdmht.grschizo  = '$type_by'
GROUP BY grdmht.grschizo

	    "; 
}  
                            

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
                'icd10' =>iconv('TIS-620','UTF-8//IGNORE',$row['icd10']) ,
                'human_a' => $row['human_a']  ,
                'visit_a' => $row['visit_a'] , 
                'human_b' => $row['human_b'] , 
				'visit_b' => $row['visit_b'] , 
				'human_c' => $row['human_c'] , 
				'visit_c' => $row['visit_c'] , 
				'human_d' => $row['human_d'] , 
				'visit_d' => $row['visit_d'] , 
				'human_e' => $row['human_e'] , 
				'visit_e' => $row['visit_e'] , 
				'human_f' => $row['human_f'] ,
				'visit_f' => $row['visit_f'] , 
				'human_g' => $row['human_g'] ,
				'visit_g' => $row['visit_g'] , 
				'human_h' => $row['human_h'] , 
				'visit_h' => $row['visit_h'] , 
				'human_i' => $row['human_i'] , 
				'visit_i' => $row['visit_i'] , 
				'human_j' => $row['human_j'] , 
				'visit_j' => $row['visit_j'] , 
				'human_k' => $row['human_k'] , 
				'visit_k' => $row['visit_k'] , 
				'human_l' => $row['human_l'] , 
				'visit_l' => $row['visit_l'] , 
				'human_h' => $row['human_h'] , 
				'visit_h' => $row['visit_h'] , 
				'human_total' => $row['human_total'] , 
				'visit_total' => $row['visit_total'] ,
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
