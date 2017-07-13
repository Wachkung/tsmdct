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
		$year1 = $year1;
		$daymonthyear1=  "$year1-$month1-$day1";

list($day2, $month2, $year2) = split('[/.-]', $daymonthyear2);
		$year2 = $year2;
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
	font-size: 12px;
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
                    $yearsql = $sel1_year ;
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
	$showyear1 = $year1 +543 ;
	$showyear2 = $year2 +543 ;
	?>
  <p class="unnamed1"><strong> <br>
    รายงานอุบัติการณ์ความเสี่ยง<br>
    ระหว่างวันที่ &nbsp;&nbsp;<span class="style1"> <? echo "$day1 $showmonth1 $showyear1" ?></span> 
    &nbsp;&nbsp;&nbsp; ถึงวันที่ <span class="style1"></span> 
     <strong><span class="style1"><? echo "$day2 $showmonth2 $showyear2" ?></span></strong><br>
    จำนวน&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong><span class="style1"> 
			<?php
		
include 'connect.php';
?>
    <? 
$sql="select * from risk2_datarisk  where  daterigter between '$daymonthyear1' and '$daymonthyear2' ";
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
 ?>&nbsp;&nbsp;&nbsp;&nbsp; </span></strong> <strong>อุบัติการณ์</strong>
 <?
	
	
$sql="SELECT
`risk2_risk`.`id`,
`risk2_risk`.`coderisk`,
`risk2_risk`.`namerisk`
FROM
risk2_risk ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$ii=0;
while ($ii < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$idgroup = $result[0];
$coderisk = $result[1];
$namerisk = $result[2];

?>
 <br>
 <br>
<table width="1000" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bordercolorlight="#000000" bordercolordark="#FFFFFF">
    <tr bgcolor="#AAAAFF" class="unnamed1"> 
      <td colspan="9"><div align="center"><strong> <? echo "$namerisk"; ?>
	  	  </strong></div></td>
    </tr>
    <tr bgcolor="#E0E0E0" class="unnamed1"> 
      <td width="10%"><div align="center"><strong>อุบัติการณ์</strong></div></td>
      <td width="5%"><div align="center"><strong>หน่วยงานที่รายงาน</strong></div></td>
      <td width="5%"><div align="center"><strong>หน่วยงานที่รับผิดชอบ</strong></div></td>
      <td width="5%"><div align="center"><strong>วันที่เกิดเหตุการณ์</strong></div></td>
      <td width="10%"><div align="center"><strong>ความรุนแรงทางคลินิก</strong></div></td>
	  <td width="10%"><div align="center"><strong>ความรุนแรงด้านทั่วไป</strong></div></td>
	 <td width="20%"><div align="center"><strong>บรรยายสรุปเหตุการณ์ที่เกิด</strong></div></td>
	 <td width="20%"><div align="center"><strong>วิเคราะห์สาเหตุและแนวทางแก้ไข</strong></div></td>
     <td width="4%"><div align="center"><strong>HN</strong></div></td>
    </tr>
	
	
	 <?
	
	
$sql2="SELECT
`risk2_datarisk`.`dataevent`,
`risk2_datarisk`.`departreport`,
`risk2_datarisk`.`departrespon`,
`risk2_datarisk`.`daterigter`,
`risk2_datarisk`.`commen`,
`risk2_datarisk`.typereport,
`risk2_datarisk`.`noteceo`,
`risk2_datarisk`.notepatient,
`risk2_datarisk`.`hnno`
FROM
`risk2_datarisk`
WHERE
`risk2_datarisk`.`daterigter` BETWEEN  '$daymonthyear1' AND '$daymonthyear2'
and
`risk2_datarisk`.`dataevent`like '%$namerisk'
 "; 
//	echo"$sql2";
	
$dbquery2 = mysql_db_query($dbname, $sql2);
$num_rows2 = mysql_num_rows($dbquery2);
$ii2=0;
while ($ii2 < $num_rows2)
{
$result2 = mysql_fetch_array($dbquery2);
$dataevent = $result2[0];
$departreport = $result2[1];
$departrespon = $result2[2];
$daterigter = $result2[3];
$commen = $result2[4];
$typereport = $result2[5];
$noteceo = $result2[6];
$notepatient = $result2[7];
$hnno = $result2[8];

?>



    <tr bgcolor="#FFFFFF" class="unnamed1">
      <td>&nbsp; <? echo"$dataevent"; ?></td>
      <td>&nbsp;<? echo"$departreport"; ?></td>
      <td>&nbsp;<? echo"$departrespon"; ?></td>
	<?  list($year9, $month9, $day9) = split('[/.-]', $daterigter);
		$year9 = $year9 + 543;
		$daterigter9=  "$day9/$month9/$year9"; 
		?>
      <td><div align="center"><? echo"$daterigter9"; ?></div></td>
      <td>&nbsp;<? echo"$commen"; ?></td>
	  <td>&nbsp;<? echo"$typereport"; ?></td>
	  <td>&nbsp;<? echo"$notepatient"; ?></td>
	  <td>&nbsp;<? echo"$noteceo"; ?></td>
      <td><center><? echo"$hnno"; ?></center></td>
    </tr>
	<?
$ii2++;
}

?>
	
	
	
	
	
   
  </table>



<?
$ii++;
}

?>
  </p>
  
  <br>
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
