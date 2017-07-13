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
?>			<?php
		
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
					echo"$yearsql";
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
	$showyear1 = $year1 + 543;
	$showyear2 = $year2 + 543;
	?>
  <p class="unnamed1"><strong> <br>
    ข้อมูลหน่วยงานที่รายงานความเสี่ยง<br>
    <strong>ระหว่างวันที่ &nbsp;&nbsp;<span class="style1"> <? echo "$day1 $showmonth1 $showyear1" ?></span> &nbsp;&nbsp;&nbsp; ถึงวันที่ <span class="style1"></span> <strong><span class="style1"><? echo "$day2 $showmonth2 $showyear2" ?></span></strong></strong>    <br>
    </strong>
  </p>
  <table width="650" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bordercolorlight="#000000" bordercolordark="#FFFFFF">
    <tr bgcolor="#AAAAFF" class="unnamed1"> 
      <td><div align="center"><strong>หน่วยงาน</strong></div></td>
      <td><div align="center"><strong>จำนวนอุบัติการณ์ที่รายงาน</strong></div></td>
      <td><div align="center"><strong>จำนนวนอุบัติการที่รับผิดชอบ</strong></div></td>
    </tr>
<?
	
	$sql="select DeptId, DeptName from risk2_departreport ";
	//echo"$sql";
	
$dbquery = mysql_db_query($dbname, $sql);
$num_rows = mysql_num_rows($dbquery);
$i=0;
while ($i < $num_rows)
{
$result = mysql_fetch_array($dbquery);
$DeptId = $result[1];
$DeptName = $result[1];
$number = $i+1;

   echo" <tr class='unnamed1'> ";
   if($number > 54){$number=""; echo" <td><div align='left'>$number  $DeptName</div></td>";}
	if($number <= 54 and $number != ''){ echo" <td><div align='left'>$number.  $DeptName</div></td>";}
//   else{echo" <td><div align='left'> $DeptName</div></td>";}
	 //--------------------------------------------------------------------------------------------------------------------นับจำนวนอุบัติการที่รายงาน
$sqldeptreport="select count(*) from risk2_datarisk where departreport = '$DeptId' and daterigter between '$daymonthyear1' and '$daymonthyear2' ";
//echo"$sqldeptreport";

$dbquerydeptreport = mysql_db_query($dbname, $sqldeptreport);
$num_rowsdeptreport = mysql_num_rows($dbquerydeptreport);
$ideptreport=0;
while ($ideptreport < $num_rowsdeptreport)
{
$resultdeptreport = mysql_fetch_array($dbquerydeptreport);
$countdeptreport = $resultdeptreport[0];

      echo"<td><div align='center'>$countdeptreport</div></td>";


$ideptreport++;
}
	 	 //--------------------------------------------------------------------------------------------------------------------นับจำนวนอุบัติการที่รายงาน
		 	 //--------------------------------------------------------------------------------------------------------------------นับจำนวนอุบัติการที่รับผิดชอบ
$sqldeptrespon="select count(*) from risk2_datarisk where departrespon = '$DeptId' and daterigter between '$daymonthyear1' and '$daymonthyear2' ";
	//echo"$sqldeptreport";
$dbquerydeptrespon = mysql_db_query($dbname, $sqldeptrespon);
$num_rowsdeptrespon = mysql_num_rows($dbquerydeptrespon);
$ideptrespon=0;
while ($ideptrespon < $num_rowsdeptrespon)
{
$resultdeptrespon = mysql_fetch_array($dbquerydeptrespon);
$countdeptrespon = $resultdeptrespon[0];

      echo"<td><div align='center'>$countdeptrespon</div></td>";


$ideptrespon++;
}
	 	 //--------------------------------------------------------------------------------------------------------------------นับจำนวนอุบัติการทรับผิดชอบ
      
 echo"   </tr>";

$i++;
}


?>
  </table>
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
