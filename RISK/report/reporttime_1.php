<?
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
<?php
		
include 'connect.php';
?>
 <?php $monthname=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");?>
      <? 		$day =array("วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์","วันอาทิตย์");		?>
<?
list($days1, $months1, $years1) = split('[/.-]', $startday1);
		//$year = $year;
		$startday1=  "$years1-$months1-$days1";

list($daye1, $monthe1, $yeare1) = split('[/.-]', $endday1);
		//$year = $year;
		$endday1=  "$yeare1-$monthe1-$daye1";
	list($days2, $months2, $years2) = split('[/.-]', $startday2);
		//$year = $year;
		$startday2=  "$years2-$months2-$days2";

list($daye2, $monthe2, $yeare2) = split('[/.-]', $endday2);
		//$year = $year;
		$endday2=  "$yeare2-$monthe2-$daye2";
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
  <? if ($months1== '1') { $showmonths1 = 'มกราคม' ;} 
   if ($months1== '2') { $showmonths1 = 'กุมภาพันธ์' ;} 
   if ($months1== '3') { $showmonths1 = 'มีนาคม' ;} 
   if ($months1== '4') { $showmonths1 = 'เมษายน' ;} 
   if ($months1== '5') { $showmonths1 = 'พฤษภาคม' ;} 
   if ($months1== '6') { $showmonths1 = 'มิถุนายน' ;} 
   if ($months1== '7') { $showmonths1 = 'กรกฏาคม' ;} 
   if ($months1== '8') { $showmonths1 = 'สิงหาคม' ;} 
   if ($months1== '9') { $showmonths1 = 'กันยายน' ;} 
   if ($months1== '10') { $showmonths1 = 'ตุลาคม' ;} 
   if ($months1== '11') { $showmonths1 = 'พฤศจิกายน' ;} 
   if ($months1== '12') { $showmonths1 = 'ธันวาคม' ;} 

      if ($monthe1== '2') { $showmonthe1 = 'กุมภาพันธ์' ;} 
   if ($monthe1== '3') { $showmonthe1 = 'มีนาคม' ;} 
   if ($monthe1== '4') { $showmonthe1 = 'เมษายน' ;} 
   if ($monthe1== '5') { $showmonthe1 = 'พฤษภาคม' ;} 
   if ($monthe1== '6') { $showmonthe1 = 'มิถุนายน' ;} 
   if ($monthe1== '7') { $showmonthe1 = 'กรกฏาคม' ;} 
   if ($monthe1== '8') { $showmonthe1 = 'สิงหาคม' ;} 
   if ($monthe1== '9') { $showmonthe1 = 'กันยายน' ;} 
   if ($monthe1== '10') { $showmonthe1 = 'ตุลาคม' ;} 
   if ($monthe1== '11') { $showmonthe1 = 'พฤศจิกายน' ;} 
   if ($monthe1== '12') { $showmonthe1 = 'ธันวาคม' ;} 
   
	 if ($months2== '1') { $showmonths2 = 'มกราคม' ;} 
   if ($months2== '2') { $showmonths2 = 'กุมภาพันธ์' ;} 
   if ($months2== '3') { $showmonths2 = 'มีนาคม' ;} 
   if ($months2== '4') { $showmonths2 = 'เมษายน' ;} 
   if ($months2== '5') { $showmonths2 = 'พฤษภาคม' ;} 
   if ($months2== '6') { $showmonths2 = 'มิถุนายน' ;} 
   if ($months2== '7') { $showmonths2 = 'กรกฏาคม' ;} 
   if ($months2== '8') { $showmonths2 = 'สิงหาคม' ;} 
   if ($months2== '9') { $showmonths2 = 'กันยายน' ;} 
   if ($months2== '10') { $showmonths2 = 'ตุลาคม' ;} 
   if ($months2== '11') { $showmonths2 = 'พฤศจิกายน' ;} 
    if ($months2== '12') { $showmonths2 = 'ธันวาคม' ;} 

	 if ($monthe2== '1') { $showmonthe2 = 'มกราคม' ;} 
   if ($monthe2== '2') { $showmonthe2 = 'กุมภาพันธ์' ;} 
   if ($monthe2== '3') { $showmonthe2 = 'มีนาคม' ;} 
   if ($monthe2== '4') { $showmonthe2 = 'เมษายน' ;} 
   if ($monthe2== '5') { $showmonthe2 = 'พฤษภาคม' ;} 
   if ($monthe2== '6') { $showmonthe2 = 'มิถุนายน' ;} 
   if ($monthe2== '7') { $showmonthe2 = 'กรกฏาคม' ;} 
   if ($monthe2== '8') { $showmonthe2 = 'สิงหาคม' ;} 
   if ($monthe2== '9') { $showmonthe2 = 'กันยายน' ;} 
   if ($monthe2== '10') { $showmonthe2 = 'ตุลาคม' ;} 
   if ($monthe2== '11') { $showmonthe2 = 'พฤศจิกายน' ;} 
    if ($monthe2== '12') { $showmonthe2 = 'ธันวาคม' ;} 

	$showyears1 = $years1+543;
	$showyeare1 = $yeare1+543;
	$showyears2 = $years2+543;
	$showyeare2 = $yeare2+543;
	?>
  <p class="unnamed1"><strong> <br>
    รายงานอุบัติการณ์ความเสี่ยงเปรียบเทียบระหว่าง 2 ช่วงเวลา <br>
    ระหว่างวันที่ &nbsp;&nbsp;<span class="style1"> <? echo "$days1 $showmonths1 $showyears1" ?></span> 
    &nbsp;&nbsp;&nbsp; ถึงวันที่ <span class="style1"></span> 
     <strong><span class="style1"><? echo "$daye1 $showmonthe1 $showyeare1" ?></span></strong><br>
     และ<br>
     <strong>วันที่ &nbsp;&nbsp;<span class="style1"> <? echo "$days2 $showmonths2 $showyears2" ?></span> &nbsp;&nbsp;&nbsp; ถึงวันที่ <span class="style1"></span> <strong><span class="style1"><? echo "$daye2 $showmonthe2 $showyeare2" ?></span></strong></strong></strong><br>
    <br>
  <strong><br>
</strong>  </p>
  <table width="600" border="0" cellspacing="0" cellpadding="5">
    <tr>
      <td valign="top"><table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
        <tr bgcolor="#D5D5FF" class="unnamed1">
          <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับความเสี่ยงซ้ำ</div></td>
        </tr>
        <tr bgcolor="#FFA4FF" class="unnamed1">
          <td><div align="center">ชื่อความเสี่ยง</div></td>
          <td><div align="center">จำนวนความเสี่ยง</div></td>
        </tr>
        <tr class="unnamed1">
          <?
	
	//$sql="select a.dataevent, b.DeptName, c.DeptName, count(*), a.commen, a.hnno from datarisk a, departreport b, departreport c where typereport ='อุบัติการณ์ความเสี่ยงทางคลินิก' and daterigter between '$startday1' and '$endday1' and a.departreport=b.DeptID and a.departreport=c.DeptID group by a.dataevent, b.DeptName, c.DeptName, a.commen, a.hnno ";
$sql="SELECT
`datarisk`.`dataevent`,count(`datarisk`.`dataevent`) as a1
FROM
`datarisk`
WHERE

`datarisk`.`daterigter` BETWEEN '$startday1' AND '$endday1'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
 ";
	//echo"$sql";
	//$dbname="risk";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];
if($amout > '0'){
	if($name =='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;<font color=\"#FF0000\">$name</font></td>";
echo "<td><center><font color=\"#FF0000\">$amout</font></center></td>";
echo"</tr>";
}
if($name !='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";
}
}
if($amout <= '0'){
if($name =='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;<font color=\"#FF0000\">$name</font></td>";
echo "<td><center><font color=\"#FF0000\">$amout</font></center></td>";
echo"</tr>";
}

}
if($amout > '0'){
$time1[$ii] = $name;
}
$ii++;
}

?>
      </table></td>
      <td>&nbsp;</td>
      <td valign="top"><table width="400" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
        <tr bgcolor="#D5D5FF" class="unnamed1">
          <td colspan="2"><div align="left">&nbsp;เรียงตามลำดับความเสี่ยงซ้ำ</div></td>
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

`datarisk`.`daterigter` BETWEEN '$startday2' AND '$endday2'
GROUP BY
`datarisk`.`dataevent`
ORDER BY
a1 DESC
 ";
	//echo"$sql";
	//$dbname="risk";
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$name = $result[0];
$amout = $result[1];
if($amout > '0'){
	if($name =='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;<font color=\"#FF0000\">$name</font></td>";
echo "<td><center><font color=\"#FF0000\">$amout</font></center></td>";
echo"</tr>";
}
if($name !='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;$name</td>";
echo "<td><center>$amout</center></td>";
echo"</tr>";
}
}
if($amout <= '0'){
if($name =='4.2 เสียชีวิตโดยไม่คาดฝัน'){
echo"<tr class=\"unnamed1\">";
echo "<td>&nbsp;<font color=\"#FF0000\">$name</font></td>";
echo "<td><center><font color=\"#FF0000\">$amout</font></center></td>";
echo"</tr>";
}

}

if($amout > '0'){
$time2[$ii] = $name;
}
$ii++;
}

?>
      </table></td>
    </tr>
    <tr bgcolor="#CCCCCC">
      <td colspan="3"><div align="center" class="unnamed1">
        เมื่อเปรียบเทียบกันระหว่าง 2 ช่วงเวลา 
      </div></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
        <table width="300" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bordercolordark="#FFFFFF">
          <tr>
            <td bgcolor="#D6D7FF" class="unnamed1">&nbsp;&nbsp;ตารางสรุป</td>
          </tr>
          <tr>
            <td bgcolor="#FFA6FF" class="unnamed1">&nbsp;&nbsp;อุบัติการณ์ความเสี่ยงที่เกิดขึ้นทั้ง 2 ช่วงเวลา คือ </td>
          </tr>
          <tr>
            <td class="unnamed1">
 </td>
          </tr>

<?
   for ($i = 0; $i <= 99; $i++) {

for ($a = 0; $a <= 99; $a++) {


if($time1[$i] !=""){
    if($time1[$i] == $time2[$a]){ echo"<tr><td class=\"unnamed1\">&nbsp;$time1[$i]</td></tr>"; }
}

}

   }


?>
              
              



           
     
        </table>
      </div></td>
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
