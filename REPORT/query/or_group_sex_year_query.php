
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
select cdx.agegroup,
  sum(case when cdx.hn then year(cdx.opdate)=$startyear1 else 0 end) as Y1,
 sum(case when cdx.hn then year(cdx.opdate)=$startyear2 else 0 end) as Y2,
sum(case when cdx.hn then year(cdx.opdate)=$startyear3 else 0 end) as Y3,
sum(case when cdx.hn then year(cdx.opdate)=$startyear4 else 0 end) as Y4,
sum(case when cdx.hn then year(cdx.opdate)=$endyear else 0 end) as Y5
from(SELECT
 
(case 
when  aaa.male='1' then 'man'
when  aaa.male ='2'  then 'female'
 
ELSE
''
end ) as agegroup,
aaa.hn,
aaa.postopdx,
aaa.opdate,
aaa.orno,
aaa.an 
  from(select

 (DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(pt.BRTHDATE, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(pt.BRTHDATE, '00-%m-%d'))) AS age,

ors.hn,
ors.postopdx,
ors.opdate,
ors.orno,
ors.an,
pt.male
FROM
pt
INNER JOIN ors ON pt.hn = ors.hn where an>0 and orno>0 
 
and year(ors.opdate)between '2011' and '2015'

group by an) as aaa) as cdx group by  cdx.agegroup



	    "; 

                            

$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    
               'agegroup' =>iconv('TIS-620','UTF-8//IGNORE',$row['agegroup']) ,             
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
