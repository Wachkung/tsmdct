
        <?php


include_once '../config/connect_hisql.php';
include_once '../config/datetype.php';
$connect =connectToDB();
 //print_r($_POST);

  $year_by=$_POST['year']; 
  $date_by=$_POST['date'];   


     
    $e = explode(".", $date_by);
         
    $md1 = $e[0];
  	$md2 = $e[1];
	$startdate=$year_by.$md1;
    $enddate=$year_by.$md2;                      
                            
 $sql2 = "

SELECT

cPT.a,
cPT.b,
cPT.c,
cPT.d,
cPT.e,
cPT.f,
cPT.g,
CONCAT(cPT.addrpart,'   ',m.namemoob,'  ',t.nametumb,'   ',a2.nameampur,'  ',c.namechw  ) as h,
 cPT.i,cPT.j,
cPT.k,cPT.l

## CONCAT(cPT.addrpart ) as h

from(SELECT 

CONCAT(pt.fname,'      ',pt.lname) as a,
SUBSTR(DATEDIFF(now(),pt.brthdate)/365,1,2) as b,
if(pt.male=1,'ชาย','หญิง') as c,
pt.hn as d,
pt.pop_id as e,
v.icd10 as f,
CASE  pt.mrtlst 
WHEN 1 then 'โสด'
WHEN 2 then'คู่'
WHEN 3 then'หม้าย'
WHEN 4 then'หย่า'
WHEN 5 then'ร้าง'
WHEN 6 then'สมณะ' END as g ,
 ##CONCAT(pt.addrpart,mooban.namemoob,tumbon.nametumb,'   ',ampur.nameampur,'  ',changwat.namechw  ) as h,
pt.rlgn as i,
if(v.ovstost=2,'ตาย','') as j,
if(v.ovstost=2,'','มีชีวิต') as k,
v.vstdttm as l ,
pt.addrpart,pt.amppart,pt.moopart,pt.tmbpart,pt.chwpart
FROM 
(select optvisit.* from (SElECT ovst.hn, ovstdx.icd10, ovstdx.vn, ovst.vstdttm, ovst.ovstost FROM ovst INNER JOIN hi.ovstdx on ovst.vn = ovstdx.vn
WHERE date(ovst.vstdttm) NOT BETWEEN '$startdate' AND '$enddate') as optvisit
INNER JOIN grpcanerc00_c80 ON grpcanerc00_c80.`code` = optvisit.icd10) AS v
LEFT JOIN pt ON pt.hn = v.hn




WHERE v.vstdttm BETWEEN '2016-01-01' AND '2016-12-30'
GROUP BY v.hn
ORDER BY v.vstdttm DESC ) as cPT


 
left join mooban as m on cPT.moopart=m.moopart and cPT.tmbpart=m.tmbpart and cPT.amppart=m.amppart and cPT.chwpart=m.chwpart 
left join tumbon as t on cPT.tmbpart=t.tmbpart and cPT.amppart=t.amppart and cPT.chwpart=t.chwpart 
left join ampur as a2 on cPT.amppart=a2.amppart and cPT.chwpart=a2.chwpart 
left join changwat as c on cPT.chwpart=c.chwpart
	    "; 


$result = mysql_query($sql2) or die("SQL Error 1: " . mysql_error());
	 
	
$i = 1;
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				

		$data[] = array(				
			    'id' =>  $i , 
                'a' =>iconv('TIS-620','UTF-8//IGNORE',$row['a']) ,
                'b' => $row['b']  ,
                'c' => $row['c'] , 
                'd' => $row['d'] , 
				'e' => $row['e'] , 
				'f' => $row['f'] , 
				'g' => $row['g'] , 
				'h' => iconv('TIS-620','UTF-8//IGNORE',$row['h']) , 
				'i' => $row['i'] , 
				'j' => $row['j'] , 
				'k' => $row['k'] , 
				'l' => $row['l']
                      );
		 $i++; 
					}								
				
	      

	$jspttype= json_encode($data);
	
	echo  $jspttype; 
	
	
	
?>
