<?php
$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");  
$thai_month_arr=array(  
    "0"=>"",  
    "1"=>"มกราคม",  
    "2"=>"กุมภาพันธ์",  
    "3"=>"มีนาคม",  
    "4"=>"เมษายน",  
    "5"=>"พฤษภาคม",  
    "6"=>"มิถุนายน",   
    "7"=>"กรกฎาคม",  
    "8"=>"สิงหาคม",  
    "9"=>"กันยายน",  
    "10"=>"ตุลาคม",  
    "11"=>"พฤศจิกายน",  
    "12"=>"ธันวาคม"                    
);  
function thai_date($time){  
    global $thai_day_arr,$thai_month_arr;  
    $thai_date_return.= "วันที่ ".date("j",$time);  
    $thai_date_return.=" เดือน ".$thai_month_arr[date("n",$time)];  
    $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);  
    return $thai_date_return;  
}  

	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
	$idcard=$_GET['idcard'];
	$id=$_GET['id'];
	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

	$strSQLla = "SELECT * FROM la WHERE idcard = '$idcard' and id=$id ";
	$objQueryla = mysql_query($strSQLla);
	$objResultla = mysql_fetch_array($objQueryla);
	$position2=$objResult["position"];
	$eng_date=time(); // แสดงวันที่ปัจจุบัน  

	$sqlposition1=" SELECT * FROM position  where PosId = '$position2'"; 
	$resultposition1 = mysql_query($sqlposition1); $dataposition1 = mysql_fetch_array($resultposition1)
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกวันลา</a></li>
                        <li class="active"><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-8 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-body"  align="center">
							<table width="100%" height="100%" border="0" align="center">
							<tr>
							<td valign="top" align="center">
							<!------------------------------------------------ Start For Code ------------------------------------------------>
							<style type="text/css">
							<!--
							.style2 {font-size: 9px}
							-->
							</style>
							<? 
							//+++++++++++++++++++++++++++++++++++++++++++++++++++++
							?>
							<table width="100%" border="0" align="center">
								<tr>
								  <th scope="col"><center>&nbsp;</center></th>
								</tr>
							  </table>
							  <table width="100%" border="0">
								<tr>
								  <th scope="col"><font class="fontdoc"><strong><center>บันทึก ขอ<?=$objResultla["latype"];?> </center></strong></font></th>
								</tr>
									<tr>
									 <td scope="col"><div align="left"><font class="fontdoc">&nbsp;</font></div></td>
								   </tr>
							  </table>
								 <table width="100%" border="0">
							  <tr>
								<td scope="col"><div align="right"><font class="fontdoc">เขียนที่ <?php echo $namehosp; ?>&nbsp;</font></div></td>
							  </tr>
							</table>
							  <table width="100%" border="0">
								   <tr>
									 <td scope="col"><div align="right"><font class="fontdoc"><? echo thai_date($eng_date); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div></td>
								   </tr>
							</table><br>
							<table width="100%" border="0">
								   <tr>
									 <td scope="col"><div align="left"><font class="fontdoc">เรื่อง <?=$objResultla["latype"];?></font></div></td>
								   </tr>
							</table>
							<table width="100%" border="0">
								   <tr>
									 <td scope="col"><div align="left"><font class="fontdoc">เรียน <? echo "ผู้อำนวยการ";?><?php echo $namehosp; ?></font></div></td>
								   </tr>
								   <tr>
									 <td scope="col"><div align="left"><font class="fontdoc">&nbsp;</font></div></td>
								   </tr>
							</table>
							<table width="100%" border="0">
								   <tr>
									 <td scope="col"><div align="left">
										<font class="fontdoc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้า&nbsp;&nbsp;</font>
										<font class="fontdoc" color="#000066"><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></font>&nbsp;&nbsp;
										<font class="fontdoc">ตำแหน่ง</font>&nbsp;&nbsp;<font class="fontdoc" color="#000066"><?=$dataposition1["PosName"];?></font>
										<font class="fontdoc">ขอลา</font>&nbsp; &nbsp;<font class="fontdoc" color="#000066"> <?=$objResultla["latype"];?></font>&nbsp; &nbsp;
										<br />
										<font class="fontdoc">เนื่องจาก </font>&nbsp; &nbsp;<font class="fontdoc" color="#000066"> <?=$objResultla["ladetail"];?></font>										
										<font class="fontdoc">ตั้งแต่ วันที่</font>&nbsp; &nbsp;<font class="fontdoc" color="#000066"><?=thai_date(strtotime($objResultla["sdate"]));?></font>&nbsp;
										<font class="fontdoc">ถึง วันที่</font>&nbsp; &nbsp;<font class="fontdoc" color="#000066"><?=thai_date(strtotime($objResultla["edate"]));?></font>&nbsp;
										<font class="fontdoc">มีกำหนด </font>&nbsp;<font class="fontdoc" color="#000066"><?=$objResultla["dsum"];?></font><font class="fontdoc">&nbsp;วัน&nbsp; &nbsp;</font><br />
										</div>
									 </td>
								   </tr>
							</table>
							<table width="100%" border="0">
								   <tr>
									 <td scope="col"><div align="left">
									 ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่</font>	<font class="fontdoc" color="#000066"> &nbsp; <?=$objResult["addr"];?></font>&nbsp;<br /><font class="fontdoc">ผู้ปฎิบัติงานแทน</font>&nbsp; &nbsp;<font class="fontdoc" color="#000066"><?=$objResultla["laname"];?></font>&nbsp;&nbsp;&nbsp;&nbsp;...............................................................
									 </div>
									 </td>
								   </tr>
							</table>
							<br>
							 <table width="250" border="0"align="right">
							 	<tr>
									 <td scope="col"><div align="left"><font class="fontdoc">&nbsp;</font></div></td>
								   </tr>
								   <tr>
									 <td scope="col"><div align="center"><font class="fontdoc">ขอแสดงความนับถือ</font></div></td>
								   </tr>
							</table>
									<br>
									<br>
							<table width="250" border="0"align="right">
								   <tr>
									 <td scope="col"><div align="left"><font class="fontdoc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div></td>
								   </tr>
							</table>
									<br>
									<br>
							<table width="250" border="0"align="right">
								   <tr>
									 <td scope="col"><div align="center"><font class="fontdoc">&nbsp;&nbsp;(<?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?>)</font></div></td>
								   </tr>
								   <tr>
									 <td scope="col"><div align="center"><font class="fontdoc"><?=$dataposition1["PosName"];?></font></div></td>
								   </tr>
							</table>
							<br /><br />
							<table width="100%" border="0">
								   <tr>
									 <td  width="300" valign="top" align="center">
										<table width="300" border="0">
											<tr>
												 <td scope="col"><br /><div align="center"><font class="fontdoc">(ลงชื่อ)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ตรวจสอบ</font></div></td>
											</tr>
										</table>	
										<table width="300" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc"><? echo "เจ้าพนักงานธุรการชำนาญงาน";?></font></div></td>
											</tr>
										</table>
										<table width="300" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc">วันที่&nbsp;&nbsp;<? echo "___/____/_______";?>&nbsp;&nbsp;</font></div></td>
											</tr>
										</table>
									 </td>
								<!---------------------------------------------------------------------------------------------------->
									 <td width="250" valign="top">
									<br>
										<table width="250" border="0">
											<tr>
												 <th scope="col"><div align="center"><font class="fontdoc">ความเห็นผู้บังคับบัญชา</font></div></th>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="left"><font class="fontdoc"><? echo "อนุญาต/ไม่อนุญาต";?></font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="left"><font class="fontdoc"><? echo "____________________________________";?></font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><br /><div align="left"><font class="fontdoc">(ลงชื่อ)&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc"><? echo "หัวหน้าฝ่าย/งาน/กลุ่มงาน";?>.</font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc">วันที่&nbsp;&nbsp;<? echo "___/____/_______";?>&nbsp;&nbsp;</font></div></td>
											</tr>
										</table>
											<!----------------------------------------------------------------------------->	 
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc"><strong>คำสั่ง</strong></font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
										  <tr>
											<td scope="col"><div align="center"><font class="fontdoc"><? echo "อนุญาต/ไม่อนุญาต";?> </font></div></td>
										  </tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc"><? echo "_____________________________________"?></font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><br /><div align="left"><font class="fontdoc">(ลงชื่อ)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc"><? echo "ผู้อำนวยการ";?><?php echo $namehosp; ?></font></div></td>
											</tr>
										</table>
										<table width="250" border="0">
											<tr>
												 <td scope="col"><div align="center"><font class="fontdoc">วันที่&nbsp;&nbsp;&nbsp;&nbsp;<input name="con1date" type="hidden" value="<? echo "";?>"><? echo "___/____/_______";?></font></div></td>
											</tr>
										</table>
											</td>
								   </tr>
							</table>
							<div align="center"><input type="button" value="พิมพ์ใบลา" onclick="showpage('<? echo $id;?>')" style="cursor:pointer; "/></div>
							<!-------------------------------------------------------------------------------------------------------------------->
							</td>
							</tr>
							</table>
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
        <script src="../includes/bootstrap/js/jquery.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- InputMask -->
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <!-- DATA TABES SCRIPT -->
        <script src="../includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
        <!-- date-range-picker -->
        <script src="../includes/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        
		<!-- bootstrap color picker -->
        <script src="../includes/bootstrap/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        
		<!-- bootstrap time picker -->
        <script src="../includes/bootstrap/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
       
		<!-- AdminLTE App -->
        <script src="../includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        
		<!-- AdminLTE for demo purposes -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script src="../includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>
        
		<!-- fullCalendar -->
        <script src="../includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>

<script language="javascript">
function showpage(id){
			w = screen.availWidth;
			h = screen.availHeight;
			var popW = 800, popH = 600;
			var leftPos = (w-popW)/2, topPos = (h-popH)/2;
			window.open("<?php echo "./print_la.php?idcard=$idcard&id=";?>"+id,"loadorder","width="+popW+",height="+popH+",top="+topPos+",left="+leftPos+",menubar=yes,resizable=yes,toolbar=no,scrollbars=yes");
			}
function validate() {
if(document.frmMain.la_date.value == "")
{	alert('เลือกวันที่ลา');	
			document.frmMain.la_date.focus();
			return false;
} 

if(document.frmMain.latype.value == "")
{	alert(' เลือกประเภทการลา ');	
			document.frmMain.latype.focus();
			return false;
} 

if(document.frmMain.dsum.value == "")
{	alert(' ใส่จำนวนวันลา ');	
			document.frmMain.dsum.focus();
			return false;
} 	
}
</script>

<script language="javascript">
function CheckNum(){
		if (event.keyCode < 46 || event.keyCode > 57){
		      event.returnValue = false;
	    	}
	}
</script>
        <!-- Page script -->
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker({format: 'YYYY-MM-DD'});
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: false, timePickerIncrement: 30, format: 'YYYY-MM-DD'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
        
		<!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
    </body>
</html>
