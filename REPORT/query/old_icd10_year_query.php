
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year']; 
 $limit_by=$_POST['limit']; 

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
     
            
     if($limit_by== 99){    

$sql2 = "
SELECT
ovstdx.icd10 as icd10
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey10' , dx.hn, null)) as human_a
,sum(if(MONTH(dx.vstdttm)=10,1,0)) as visit_a
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN  '$sy11' AND '$ey11' , dx.hn, null)) as human_b
,sum(if(MONTH(dx.vstdttm)=11,1,0)) as visit_b
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy12' AND '$ey12' , dx.hn, null)) as human_c
,sum(if(MONTH(dx.vstdttm)=12,1,0)) as visit_c
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy01' AND '$ey01' , dx.hn, null)) as human_d
,sum(if(MONTH(dx.vstdttm)=1,1,0)) as visit_d
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy02' AND '$ey02' , dx.hn, null)) as human_e
,sum(if(MONTH(dx.vstdttm)=2,1,0)) as visit_e
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy03' AND '$ey03' , dx.hn, null)) as human_f
,sum(if(MONTH(dx.vstdttm)=3,1,0)) as visit_f
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy04' AND '$ey04' , dx.hn, null)) as human_g
,sum(if(MONTH(dx.vstdttm)=4,1,0)) as visit_g
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy05' AND '$ey05' , dx.hn, null)) as human_h
,sum(if(MONTH(dx.vstdttm)=5,1,0)) as visit_h
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy06' AND '$ey06' , dx.hn, null)) as human_i
,sum(if(MONTH(dx.vstdttm)=6,1,0)) as visit_i
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy07' AND '$ey07', dx.hn, null)) as human_j
,sum(if(MONTH(dx.vstdttm)=7,1,0)) as visit_j
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy08' AND '$ey08' , dx.hn, null)) as human_k
,sum(if(MONTH(dx.vstdttm)=8,1,0)) as visit_k
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy09' AND '$ey09' , dx.hn, null)) as human_l
,sum(if(MONTH(dx.vstdttm)=9,1,0)) as visit_l
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey09' , dx.hn, null)) as human_total
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey09' , dx.vn, null)) as visit_total

FROM
hi.ovstdx
INNER JOIN (SELECT DISTINCT  ovst.hn, ovst.vn, ovst.vstdttm, (substr(DATEDIFF(NOW(),x.brthdate),1,2)) as age FROM hi.ovst  LEFT JOIN (SELECT pt.hn, pt.brthdate from hi.pt) as x ON x.hn = ovst.hn  
WHERE  substr(DATEDIFF(NOW(),x.brthdate),1,2) >='60' AND date(ovst.vstdttm) BETWEEN '$sy10' AND '$ey09'    ) AS dx
ON ovstdx.vn = dx.vn 
GROUP BY ovstdx.icd10 ORDER BY human_total DESC
	    "; 


      }else{    

 $sql2 = "
SELECT
ovstdx.icd10 as icd10
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey10' , dx.hn, null)) as human_a
,sum(if(MONTH(dx.vstdttm)=10,1,0)) as visit_a
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN  '$sy11' AND '$ey11' , dx.hn, null)) as human_b
,sum(if(MONTH(dx.vstdttm)=11,1,0)) as visit_b
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy12' AND '$ey12' , dx.hn, null)) as human_c
,sum(if(MONTH(dx.vstdttm)=12,1,0)) as visit_c
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy01' AND '$ey01' , dx.hn, null)) as human_d
,sum(if(MONTH(dx.vstdttm)=1,1,0)) as visit_d
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy02' AND '$ey02' , dx.hn, null)) as human_e
,sum(if(MONTH(dx.vstdttm)=2,1,0)) as visit_e
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy03' AND '$ey03' , dx.hn, null)) as human_f
,sum(if(MONTH(dx.vstdttm)=3,1,0)) as visit_f
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy04' AND '$ey04' , dx.hn, null)) as human_g
,sum(if(MONTH(dx.vstdttm)=4,1,0)) as visit_g
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy05' AND '$ey05' , dx.hn, null)) as human_h
,sum(if(MONTH(dx.vstdttm)=5,1,0)) as visit_h
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy06' AND '$ey06' , dx.hn, null)) as human_i
,sum(if(MONTH(dx.vstdttm)=6,1,0)) as visit_i
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy07' AND '$ey07', dx.hn, null)) as human_j
,sum(if(MONTH(dx.vstdttm)=7,1,0)) as visit_j
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy08' AND '$ey08' , dx.hn, null)) as human_k
,sum(if(MONTH(dx.vstdttm)=8,1,0)) as visit_k
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy09' AND '$ey09' , dx.hn, null)) as human_l
,sum(if(MONTH(dx.vstdttm)=9,1,0)) as visit_l
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey09' , dx.hn, null)) as human_total
,COUNT(DISTINCT IF(date(dx.vstdttm) BETWEEN '$sy10' AND '$ey09' , dx.vn, null)) as visit_total

FROM
hi.ovstdx
INNER JOIN (SELECT DISTINCT  ovst.hn, ovst.vn, ovst.vstdttm, (substr(DATEDIFF(NOW(),x.brthdate),1,2)) as age FROM hi.ovst  LEFT JOIN (SELECT pt.hn, pt.brthdate from hi.pt) as x ON x.hn = ovst.hn  
WHERE  substr(DATEDIFF(NOW(),x.brthdate),1,2) >='60' AND date(ovst.vstdttm) BETWEEN '$sy10' AND '$ey09'    ) AS dx
ON ovstdx.vn = dx.vn 
GROUP BY ovstdx.icd10 ORDER BY human_total DESC LIMIT $limit_by

	    "; 
}

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 1;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(	
								
			    'id' =>  $i , 
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
				'visit_total' => $row['visit_total'] 
				
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
