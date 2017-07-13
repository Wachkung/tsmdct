

        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
//print_r($_POST);


  $year_by=$_POST['year']; 
  $month_by=$_POST['month_by']; 
 

  $startyear = $year_by-1;
  $endyear = $year_by;
  
  //$today = date("m");     
  $m10='10';
   $m10='10';
         $d1 ='01';
         $d30='30';
         $d31='31';
     $start=$startyear.'-'.$m10.'-'.$d1;
    //  $end=$endyear.'-'.$m10.'-'.$d30;
     $end=$startyear.'-'.$m10.'-'.$d31;
      
  //$cap1 = substr($startyear,2,2);
  //$cap2 = substr($endyear,2,2);

 
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
select
a.icd10name,
a.macdx as icd,
 
sum(a.can) as scan

from(SELECT ovstdx.icd10 AS macdx, 
	orfro.rfrcs, 
	orfro.rfrlct, 
	orfro.rfrno, 
	orfro.vn, 
	orfro.vstdate AS accdate, 
	count(orfro.vn) AS can, 
	ovst.ovstost, 
	ovst.hn, 
	icd101.icd10name
FROM ovstdx INNER JOIN orfro ON ovstdx.vn = orfro.vn
	 INNER JOIN ovst ON ovst.vn = ovstdx.vn AND ovst.vn = orfro.vn
	 INNER JOIN icd101 ON icd101.icd10 = ovstdx.icd10
WHERE 

  
    
DATE_FORMAT(orfro.vstdate,'%Y') = '$year_by'  
and DATE_FORMAT(orfro.vstdate,'%m') ='$month_by' 




and ovstdx.cnt='1'  and ovst.ovstost ='3'  and ovst.an ='0'
GROUP BY vn) as a  GROUP BY a.macdx ORDER BY scan desc limit 20
	    "; 


$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
                'icd' =>iconv('TIS-620','UTF-8//IGNORE',$row['icd']) ,
                'icd10name' => iconv('TIS-620','UTF-8//IGNORE',$row['icd10name'])  ,
                'scan' => $row['scan'] 
                 		
				
                      );
		 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
