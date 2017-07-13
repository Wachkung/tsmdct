<?
/*
 * Source Code By BaanIT
  * Copyright (c) 2006-2007 www.BaanIT.com
 * www.BaanIT.com by MR. Suteemon Maneechavang 
*/
?><?
  function HeaderingExcel($filename) {
	  header("Content-type: application/vnd.ms-excel");
	  header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	  header("Content-Disposition: attachment; filename=$filename" ); 
	  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	  header("Pragma: public");
}
  function HeaderingPDF($filename) {
	  header("Content-type: application/pdf");
	  header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
	  header("Content-Disposition: attachment; filename=$filename" ); 
	  

}

error_reporting(E_ALL ^ E_NOTICE);
$se_years = $se_year ;
$se_yearo = $se_year-1 ;


if ($exp == "XLS") {
   HeaderingExcel("reportmonth.xls");
}
if ($exp == "PDF") {
   HeaderingPDF("reportmonth.pdf");
}
?>

 <?php $monthname=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");?>
      <? 		$day =array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์","วันอาทิตย์");		?>
<?
list($day1, $month1, $year1) = split('[/.-]', $daymonthyear1);
		//$year = $year ;
		$daymonthyear1=  "$year1-$month1-$day1";

list($day2, $month2, $year2) = split('[/.-]', $daymonthyear2);
		//$year = $year ;
		$daymonthyear2=  "$year2-$month2-$day2";
?>

<HTML>
<HEAD>
<TITLE>reportgroup : โปรแกรมบันทึกความเสี่ยง : TanSumHosPiTal.go.th</TITLE>
<?
if ($exp == "HTML") {
echo "<LINK REL='StyleSheet' HREF='../../html/css/style.css' TYPE='text/css'>";
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<style type="text/css">
<!--
.unnamed1 {
	font-family: "MS Sans Serif", Tahoma, sans-serif;
	font-size: 14px;
}
-->
</style>
</HEAD>
<BODY topmargin="0" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>  </tr>
</table>
       <?
                    $yearsql = $sel1_year;
					//echo"$yearsql";
?>
<div align="center" class="unnamed1"> 
  <? if ($month1== '1') { $showmonth1 = 'มกราคม' ;} 
   if ($month1== '2') { $showmonth1 = 'กุมภาพันธ์' ;} 
   if ($month1== '3') { $showmonth1 = 'มีนาคม' ;} 
   if ($month1== '4') { $showmonth1 = 'เมษายน' ;} 
   if ($month1== '5') { $showmonth1 = 'พฤษภาคม' ;} 
   if ($month1== '6') { $showmonth1 = 'มิถุนายน' ;} 
   if ($month1== '7') { $showmonth1 = 'กรกฏาคม' ;} 
   if ($month1== '8') { $showmonth1 = 'สิงหาคม' ;} 
   if ($month1== '9') { $showmonth1 = 'กันยายน' ;} 
   if ($month1== '10') { $showmonth1 = 'ตุลาคม' ;} 
   if ($month1== '11') { $showmonth1 = 'พฤศจิกายน' ;} 
   if ($month1== '12') { $showmonth1 = 'ธันวาคม' ;} 
   
	 if ($month2== '1') { $showmonth2 = 'มกราคม' ;} 
   if ($month2== '2') { $showmonth2 = 'กุมภาพันธ์' ;} 
   if ($month2== '3') { $showmonth2 = 'มีนาคม' ;} 
   if ($month2== '4') { $showmonth2 = 'เมษายน' ;} 
   if ($month2== '5') { $showmonth2 = 'พฤษภาคม' ;} 
   if ($month2== '6') { $showmonth2 = 'มิถุนายน' ;} 
   if ($month2== '7') { $showmonth2 = 'กรกฏาคม' ;} 
   if ($month2== '8') { $showmonth2 = 'สิงหาคม' ;} 
   if ($month2== '9') { $showmonth2 = 'กันยายน' ;} 
   if ($month2== '10') { $showmonth2 = 'ตุลาคม' ;} 
   if ($month2== '11') { $showmonth2 = 'พฤศจิกายน' ;} 
    if ($month2== '12') { $showmonth2 = 'ธันวาคม' ;} 
	$showyear1 = $year1;
	$showyear2 = $year2;
	?><?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
  <p class="unnamed1"><strong> <br>
    รายงานอุบัติการณ์ความเสี่ยง<br><strong>ตามปีงบประมาณ : <? echo"$se_year "; ?></strong>
    </strong><br>
    ตั้งแต่วันที่ 1 ตุลาคม <? $se_yearold=$se_year -1; echo"$se_yearold";  ?> ถึง 30 กันยายน <? echo"$se_year"; ?><br>
    <br>
  </p>
  <table width="600" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#CCCCCC" class="unnamed1">
      <td><div align="center"><strong>รายการ</strong></div></td>
      <td><div align="center"><strong>ต.ค.</strong></div></td>
      <td><div align="center"><strong>พ.ย.</strong></div></td>
      <td><div align="center"><strong>ธ.ค.</strong></div></td>
      <td><div align="center"><strong>ม.ค.</strong></div></td>
      <td><div align="center"><strong>ก.พ.</strong></div></td>
      <td><div align="center"><strong>มี.ค.</strong></div></td>
      <td><div align="center"><strong>เม.ย.</strong></div></td>
      <td><div align="center"><strong>พ.ค.</strong></div></td>
      <td><div align="center"><strong>มิ.ย.</strong></div></td>
      <td><div align="center"><strong>ก.ค.</strong></div></td>
      <td><div align="center"><strong>ส.ค.</strong></div></td>
      <td><div align="center"><strong>ก.ย.</strong></div></td>
      <td><div align="center"><strong>รวม</strong></div></td>
    </tr>
    <tr class="unnamed1">
	
	
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '1'";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center"><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?></div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
        <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total1 = $total1+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total1"; ?></strong></div></td>
	  
	  
	  
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '2'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total2 = $total2+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total2"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '3'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total66 = $total66+$count1;  
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total3 = $total3+$count1; 
$total1212 = $total1212+$count1;  
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total3"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '4'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total4 = $total4+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total4"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '5'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total5 = $total5+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total5"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '6'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total6 = $total6+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total6"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '7'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total7 = $total7+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total7"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '8'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total55 = $total55+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total8 = $total8+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center"><strong>&nbsp;<? echo"$total8"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`risk2_group`.`codegroup`,
`risk2_group`.`namegroup`
FROM
`risk2_group`
WHERE
`risk2_group`.`id` =  '9'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$codegroup= $result[0];
$namegroup= $result[1];

echo"$codegroup. $namegroup";
$ii++;
}

?></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '10' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total11 = $total11+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '11' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total22 = $total22+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '12' and year(daterigter) = '$se_yearo' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total33 = $total33+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '01' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total44 = $total44+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '02' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total55 = $total55+$count1;  
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '03' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total66 = $total66+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '04' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total77 = $total77+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '05' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total88 = $total88+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '06' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total99 = $total99+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '07' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total1010 = $total1010+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '08' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total1111 = $total1111+$count1; 
$ii++;
}

?>
      </div></td>
      <td><div align="center">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT  count(*) FROM `risk2_datarisk`   where month(daterigter) = '09' and year(daterigter) = '$se_years' and fromevent ='$codegroup.$namegroup'  ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$count1= $result[0];

if($count1 == '0'){$count1 = '0&nbsp;';}
echo" $count1";

$total9 = $total9+$count1; 
$total1212 = $total1212+$count1; 
$ii++;
}

?>
      </div></td>

      <td><div align="center"><strong>&nbsp;<? echo"$total9"; ?></strong></div></td>
    </tr>
    <tr class="unnamed1">
      <td><div align="center"><strong>รวม</strong></div></td>
      <td><div align="center"><b><? echo"$total11"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total22"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total33"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total44"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total55"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total66"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total77"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total88"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total99"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total1010"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total1111"; ?></b></div></td>
      <td><div align="center"><b><? echo"$total1212"; ?></b></div></td>
      <td><div align="center">&nbsp;
      <? $totalall = $total1+$total2+$total3+$total4+$total5+$total6; echo"<b>$totalall</b>"; ?></div></td>
    </tr>
  </table>
  <br>
  <table width="650" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <?php $monthname=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");?>
      <? 		$day =array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์","วันอาทิตย์");		?>
      <td class="unnamed1"><div align="right">วันที่ออกรายงาน : <? echo $day[date('w')-1]." ".date('d')." ". $monthname[date('n')-1]." ".(date('Y')+543)." เวลา ".date('H:i:s');?></div></td>
      <? //<td class="unnamed1"><div align="right"> <FONT SIZE="2" FACE="MS Sans Serif, Tahoma, sans-serif">[<a href="#" onclick="javascript:window.print()">พิมพ์</a>]</FONT></div></td> ?>
    </tr>
  </table>
</div>
</BODY>

</HTML>
