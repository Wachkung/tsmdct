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
		//$year = $year;
		$daymonthyear1=  "$year1-$month1-$day1";

list($day2, $month2, $year2) = split('[/.-]', $daymonthyear2);
		//$year = $year;
		$daymonthyear2=  "$year2-$month2-$day2";
		//echo"$daymonthyear2";
?>
<?php
		
include 'connect.php';
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
.style1 {color: #0000FF}
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
	$showyear1 = $year1+543;
	$showyear2 = $year2+543;
	?>
  <p class="unnamed1"><strong> <br>
    รายงานอุบัติการณ์ความเสี่ยงจัดอันดับ<br>
    ระหว่างวันที่ &nbsp;&nbsp;<span class="style1"> <? echo "$day1 $showmonth1 $showyear1" ?></span> 
    &nbsp;&nbsp;&nbsp; ถึงวันที่ <span class="style1"></span> 
     <strong><span class="style1"><? echo "$day2 $showmonth2 $showyear2" ?></span></strong><br>
    จำนวน&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span class="style1"> 
    <? 
$sql="select * from datarisk  where  daterigter between '$daymonthyear1' and '$daymonthyear2' ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$dataevent = $result[0];
$departreport = $result[1];
$departreport = $result[2];
$count = $result[3];
$commen = $result[4];
$hnno = $result[5];
$ii++;
}
echo "$ii";
 ?>
    &nbsp;&nbsp;&nbsp;&nbsp; </span></strong> <strong>อุบัติการณ์</strong><br>
    <br>
  <strong><br>
</strong>  </p>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
   <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 1. ยา / สารน้ำ / เลือด / วัคซีน </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
	<?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '1.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
     

    
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 2. ความปลอดภัย / ตก / ล้ม  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '2.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 3. การติดต่อสื่อสาร  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '3.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 4. การวินิจฉัย / รักษา  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '4.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 5. เครื่องมือ / อุปกรณ์  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '5.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 6. การผ่าตัด / วิสัญญี  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '6.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 7. การคลอด  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '7.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 8. การเงิน  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '8.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 9. เหตุการณ์ทั่วไป  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` LIKE '9.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
  </table>
  <br>
  <table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
    <tr bgcolor="#D5D5FF" class="unnamed1">
      <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับรูปแบบ 10. ความเสี่ยงอื่นๆ  </div></td>
    </tr>
    <tr bgcolor="#FFA4FF" class="unnamed1">
      <td><div align="center">ชื่อความเสี่ยง</div></td>
      <td><div align="center">จำนวนความเสี่ยง</div></td>
    </tr>
    <tr class="unnamed1">
      <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$daymonthyear1' and '$daymonthyear2' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE
`datarisk`.`dataevent` not LIKE '%.%' AND
`datarisk`.`daterigter` BETWEEN '$daymonthyear1' AND '$daymonthyear2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
LIMIT 0, 5 ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];

echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";


$ii++;
}

?>
    </table>
  <br>
  <br>
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
