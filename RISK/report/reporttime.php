		<?php $monthname=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");?>
		<?php
$curDay = date("j");
$curMonth = date("n");
$curYear = date("Y")+543;
?>
		<?php
		error_reporting(E_ALL ^ E_NOTICE);
include 'connect.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<script language='javascript' src='popcalendar.js'></script>
	<title><?=$title;?></title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-874">
<LINK HREF="fileinclude/stylesheet.css" REL="stylesheet" TYPE="text/css">
<style type="text/css">
<!--
.unnamed1 {
	font-family: "MS Sans Serif", Tahoma, sans-serif;
	font-size: 14px;
}
-->
</style>
</HEAD>

<BODY BGCOLOR="f4f4f4" LEFTMARGIN="0" TOPMARGIN="0">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td bgcolor="#CCCCCC"> &nbsp;&nbsp;<strong class="unnamed1">รายงานเปรียบเทียบช่วงเวลา 2 ช่วง </strong></td>
  </tr>
</table>
<br>
<form name="form1" method="post" action="reportmainmonth_1.php">
  <div align="center" class="unnamed1">
    <table border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td><table width="500" border="0">
          <tr bgcolor="#BDDCEC" class="unnamed1">
            <td>ระบุ เดือน และ พ.ศ. ที่ต้องการออกรายงาน </td>
          </tr>
          <tr class="unnamed1">
            <td>ช่วงเวลาที่ 1 &nbsp;&nbsp; วันที่ : 
              <input name="startday1" type=text id="startday1" onKeyPress="kod_pum()" size="12">
              <script language='javascript'>
  
    if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this, form1.startday1, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

              </script>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถึงวันที่ : 
              <input name="endday1" type=text id="daymonthyear2" onKeyPress="kod_pum()" size="12">
              <script language='javascript'>
  
    if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this, form1.endday1, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

              </script>              </td>
          </tr>
          <tr class="unnamed1">
            <td>&nbsp;</td>
          </tr>
          <tr class="unnamed1">
            <td><div align="center">&nbsp;</div></td>
          </tr>
          <tr class="unnamed1">
            <td>ช่วงเวลาที่ 2&nbsp;&nbsp;&nbsp; วันที่ : 
              <input name="startday2" type=text id="daymonthyear1" onKeyPress="kod_pum()" size="12">
              <script language='javascript'>
  
    if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this, form1.startday2, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

              </script>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถึงวันที่ : 
              <input name="endday2" type=text id="daymonthyear2" onKeyPress="kod_pum()" size="12">
              <script language='javascript'>
  
    if (!document.layers) {
     document.write("<input type=button onclick='popUpCalendar(this, form1.endday2, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
   }

              </script>         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>        <table width="500" border="0">
          <tr bgcolor="#BDDCEC" class="unnamed1">
            <td>รูปแบบรายงาน</td>
          </tr>
          <tr bgcolor="#BDDCEC" class="unnamed1">
            <td bgcolor="#F4F4F4"><select name="sel_exportType" class="ListBox">
              <option value="HTML" selected>HTML</option>
              <option value="XLS">Excel</option>
            </select>
              <input type="button" name="Button" value="   ตกลง   " onClick="reportmonth()"></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <br>
    <br>
&nbsp;&nbsp;&nbsp;  </div>
</form>
</BODY>
</HTML>
<script language="javascript">
<!--//

function check_number() {
e_k=event.keyCode
if (((e_k < 48) || (e_k > 47)) && e_k != 46 && e_k != 13) {
//if (e_k != 13 && (e_k < 48) || (e_k > 57) || e_k == ) {
event.returnValue = false;
alert(" กรุณาใส่วันที่ โดยการกดปุ่ม DATE");
}
} 

function reportmonth(){



 exporttype = document.form1.sel_exportType.value;
$URL="reporttime_1.php?startday1="+document.forms[0].startday1.value+"&exp="+exporttype+"&endday1="+document.forms[0].endday1.value+"&startday2="+document.forms[0].startday2.value+"&endday2="+document.forms[0].endday2.value;
window.open($URL,'','toolbar=no,location=no,status=no,resizable=yes,menubar=no,scrollbars=yes');

}//of function

function kod_pum() {
alert('การใส่วันที่ต้องทำการกดปุ่ม Date เท่านั้นครับ');
		event.returnValue = false;
} 
</script>

