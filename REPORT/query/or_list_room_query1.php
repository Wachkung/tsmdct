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
concat(x.fn,' ',x.lname) AS fullname ,
DATE_FORMAT( NOW( ) , '%Y' ) - DATE_FORMAT( x.brthdate, '%Y' ) - ( DATE_FORMAT( NOW( ) , '00-%m-%d' ) < DATE_FORMAT(x.brthdate, '00-%m-%d' ) ) AS age,
x.icd10,
x.icd9name,
x.roomor,
(CASE x.ans 
WHEN 1 THEN 'YES'
WHEN 0 THEN 'NO'
END) as ansx,
x.docname,
x.icd9name,
x.namecost,
x.posit_or,
x.chkfdt1, x.qor 
FROM 

(SELECT
pt.male,
pt.mrtlst,
pt.fname as fn,
pt.lname,
pt.hn,
pt.brthdate,
orsx.opstrdate,
orrgtx.roomor,
orrgtx.dttmor,
orrgtx.icd10,
orrgtx.ans,
orrgtx.docname,
icd9cm2.prcdname as icd9name,
CONCAT(orrgtx.posit_or,orrgtx.chkhand,orrgtx.chkfoot,orrgtx.chksp1,orrgtx.chkspv1,' ',orrgtx.chksp2,orrgtx.chkspv2) as posit_or,
orrgtx.chkfdt1 ,orrgtx.qor ,
CONCAT(orrgtx.chkkwire1,orrgtx.chkps1,orrgtx.chklcp1,orrgtx.chkiln1,orrgtx.chkdhs1,orrgtx.chks1,orrgtx.chktbw1,orrgtx.chka1,orrgtx.chkmpms1) as namecost
FROM
(SELECT orrgt.ans, orrgt.dct, orrgt.roomor, orrgt.dttmor, orrgt.hn, orrgt.vn, orrgt.icd10, dct.fname as docname, orrgt.chkoffor,orrgt.qor,orrgt.chksp1,orrgt.chkspv1,orrgt.chksp2,orrgt.chkspv2
 ,orrgt.chkhand,orrgt.chkfoot,orrgt.posit_or,IF(orrgt.chkkwire='','',IF(orrgt.chkkwire = '0','',' K-wire ')) as chkkwire1,
IF(orrgt.chkps='','',IF(orrgt.chkps = '0','',' Plate+Screw')) as chkps1,IF(orrgt.chklcp='','',IF(orrgt.chklcp = '0','',' LCP ')) as chklcp1,
IF(orrgt.chkiln='','',IF(orrgt.chkiln = '0','',' ILN Grama nial ')) as chkiln1,IF(orrgt.chkdhs='','',IF(orrgt.chkdhs = '0','',' DHS ')) as chkdhs1,
IF(orrgt.chkscrew='','',IF(orrgt.chkscrew = '0','',' Screw ')) as chks1,IF(orrgt.chktbw='','',IF(orrgt.chktbw = '0','',' TBW ')) as chktbw1,
IF(orrgt.chkancho='','',IF(orrgt.chkancho = '0','',' Anchor ')) as chka1,IF(orrgt.chkmpms='','',IF(orrgt.chkmpms = '0','',' Mini Plate+Mini Screw ')) as chkmpms1,
IF(orrgt.chkfdt='1','Thigh',IF(orrgt.chkfdt = '2','Leg ',IF(orrgt.chkfdt = '3','Ankle',IF(orrgt.chkfdt = '4','Foot','')))) as chkfdt1

 FROM hi.orrgt LEFT JOIN hi.dct ON dct.lcno = orrgt.dct WHERE orrgt.chkoffor <> 1 AND orrgt.roomor = 1   ) as orrgtx
LEFT JOIN hi.pt ON orrgtx.hn = pt.hn
LEFT JOIN hi.orfupr ON orrgtx.vn = orfupr.vn
left JOIN hi.icd9cm2 ON icd9cm2.icd9cm = orfupr.icd9cm  and  icd9cm2.id = orfupr.codeicd9id
LEFT JOIN (SELECT  opstrdate, hn  from hi.ors WHERE date(opdate)= '$datestop' ) AS orsx ON orrgtx.hn = orsx.hn
WHERE date(orrgtx.dttmor) = '$datestop'  AND orsx.opstrdate IS NULL OR orsx.opstrdate = '0000-00-00 00:00:00'  GROUP BY orrgtx.HN
ORDER BY pt.fname ASC
) AS x  order by x.qor asc

 
";
	  
	
$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	
	$i = 1;

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {


		$data[] = array(	
								
			    'id' =>  $i ,               
                'timenow' => $row['timenow']  ,                
                'fullname' =>$row['sex'].' '.iconv('TIS-620','UTF-8//IGNORE',$row['fullname']) ,
                'age' => $row['age']  ,
                'icd10' => $row['icd10']  ,
                'icd9name' => $row['icd9name'].$row['namecost'].' '.$row['chkfdt1'].'['.$row['posit_or'].$row['chkhand'].$row['chkfoot'].']' ,
                 'docname' =>iconv('TIS-620','UTF-8//IGNORE',$row['docname']) ,               
                'ansx' =>$row['ansx'] ,
                
				
                      );
		  $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	}
	
?>

