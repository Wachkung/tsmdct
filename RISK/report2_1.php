<?php
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

	$monthname=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$day =array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์","วันอาทิตย์");

	list($day1, $month1, $year1) = split('[/.-]', $daymonthyear1);
	$year1 = $year1;
	$daymonthyear1=  "$year1-$month1-$day1";
	list($day2, $month2, $year2) = split('[/.-]', $daymonthyear2);
	$year2 = $year2;
	$daymonthyear2=  "$year2-$month2-$day2";
?>

<HTML>
<HEAD>
<TITLE>reportgroup : โปรแกรมบันทึกความเสี่ยง : TanSumHosPiTal.go.th</TITLE>
<?php
if ($exp == "HTML") {
echo "<LINK REL='StyleSheet' HREF='../../html/css/style.css' TYPE='text/css'>";
}
?>
<meta charset="UTF-8">
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
 <?php
    $yearsql = $sel1_year;
?>
<div align="center" class="unnamed1"> 
<?php
	if ($month1== '1') { $showmonth1 = 'มกราคม'	;} 
	if ($month1== '2') { $showmonth1 = 'กุมภาพันธ์'	;} 
	if ($month1== '3') { $showmonth1 = 'มีนาคม'	;} 
	if ($month1== '4') { $showmonth1 = 'เมษายน'	;} 
	if ($month1== '5') { $showmonth1 = 'พฤษภาคม' ;}	
   if ($month1== '6') {	$showmonth1	= 'มิถุนายน' ;}	
   if ($month1== '7') {	$showmonth1	= 'กรกฏาคม'	;} 
   if ($month1== '8') {	$showmonth1	= 'สิงหาคม'	;} 
   if ($month1== '9') {	$showmonth1	= 'กันยายน'	;} 
   if ($month1== '10') { $showmonth1 = 'ตุลาคม'	;} 
   if ($month1== '11') { $showmonth1 = 'พฤศจิกายน' ;} 
   if ($month1== '12') { $showmonth1 = 'ธันวาคม' ;}	
	if ($month2== '1') { $showmonth2 = 'มกราคม'	;} 
   if ($month2== '2') {	$showmonth2	= 'กุมภาพันธ์' ;} 
   if ($month2== '3') {	$showmonth2	= 'มีนาคม' ;} 
   if ($month2== '4') {	$showmonth2	= 'เมษายน' ;} 
   if ($month2== '5') {	$showmonth2	= 'พฤษภาคม'	;} 
   if ($month2== '6') {	$showmonth2	= 'มิถุนายน' ;}	
   if ($month2== '7') {	$showmonth2	= 'กรกฏาคม'	;} 
   if ($month2== '8') {	$showmonth2	= 'สิงหาคม'	;} 
   if ($month2== '9') {	$showmonth2	= 'กันยายน'	;} 
   if ($month2== '10') { $showmonth2 = 'ตุลาคม'	;} 
   if ($month2== '11') { $showmonth2 = 'พฤศจิกายน' ;} 
   if ($month2== '12') { $showmonth2 = 'ธันวาคม' ;}	
	$showyear1 = $year1+543;
	$showyear2 = $year2+543;
include '../includes/conndb.php';
?>
  <p class="unnamed1"><strong> <br>
    รายงานอุบัติการณ์ความเสี่ยง<br>
    ระหว่างวันที่ &nbsp;&nbsp;<span class="style1"> <?php echo "$day1 $showmonth1 $showyear1" ?></span> 
    &nbsp;&nbsp;&nbsp; ถึงวันที่  
     <strong><span class="style1"><? echo "$day2 $showmonth2 $showyear2" ?></span></strong><br>
     <br>
     หน่วยงาน  <?php
	
$sql="SELECT DeptId, DeptName
FROM  risk2_departreport
WHERE
DeptName = '$departreport'";
	//echo"$sql";
	//$dbname="risk";
$dbquery = mysql_db_query($db, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$namedepart = $result[1];

    echo"$namedepart";

$i++;
}
?> 
<br>
  </strong><font color="#FF0000">รายงานอุบัติการณ์ความเสี่ยงที่ทำการรายงาน</font></p>
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr bgcolor="#FF99FF" class="unnamed1">
      <td width="5%"><div align="center">วันที่</div></td>
      <td width="10%"><div align="center">ผู้ประสบปัญหา </div></td>
      <td width="15%"><div align="center">เหตุการณ์ที่เกิดขึ้น</div></td>
      <td width="5%"><div align="center">ระดับคลินิก</div></td>
       <td width="5%"><div align="center">ระดับทั่วไป</div></td>
       <td width="20%"><div align="center">บรรยายสรุปเหตุการณ์</div></td>
       <td width="20%"><div align="center">ความเห็น หัวหน้างาน/ฝ่าย</div></td>
       <td width="20%"><div align="center">วิเคราะห์สาเหตุและแนวทางแก้ไข</div></td>
    </tr>
	
<?php
$sql="SELECT
`risk2_datarisk`.`daterigter`,
`risk2_datarisk`.`dataevent`,
`risk2_datarisk`.`commen`,
`risk2_datarisk`.`typereport`,
`risk2_datarisk`.`noteceo`,
`risk2_datarisk`.notepatient,
`risk2_datarisk`.notehead,
`risk2_datarisk`.`statusconfirm`,
`risk2_datarisk`.`datereport`,
`risk2_datarisk`.`name`
FROM
`risk2_datarisk`
WHERE
`risk2_datarisk`.`departreport` =  '$departreport' and
`risk2_datarisk`.`daterigter` BETWEEN  '$daymonthyear1' AND '$daymonthyear2'";
$dbquery = mysql_db_query($db, $sql);
$num_rows = mysql_num_rows($dbquery);
//echo mysql_num_rows($dbquery);

$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$sebject = $result[0];
$date1 = $result[1];
$depart = $result[2];
$typereport = $result[3];
$noteceo = $result[4];
$notepatient = $result[5];
$notehead = $result[6];
$sebject1 = $result[8];
$name = $result[9];
list($year1, $month1,$day1 ) = split('[/.-]', $sebject);
$year1 = $year1 + 543;
$sebject=  "$day1/$month1/$year1";
list($year2, $month2,$day2 ) = split('[/.-]', $sebject1);
$year2 = $year2+ 543;
$sebject1=  "$day2/$month2/$year2";
echo"<tr class=\"unnamed1\">";
echo"<td>&nbsp;$sebject&nbsp</td>";
echo"<td>&nbsp;$name</td>";
echo"<td>&nbsp;$date1</td>";
echo"<td>&nbsp;$depart</td>";
echo"<td>&nbsp;$typereport</td>";
echo"<td>&nbsp;$notepatient</td>";
echo"<td>&nbsp;$notehead</td>";
echo"<td>&nbsp;$noteceo</td>";
echo"</tr>";

$i++;
}
?>
</table>
  <p class="unnamed1"><strong>     <br>
  </strong></p>
</div>
</BODY>
</HTML>