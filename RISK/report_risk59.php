<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	$strdate = "2015-10-1";
	$enddate = "2016-09-30";

	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบสิทธิ์การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=../main.php'>";
		exit();
	}
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
                        ระบบความเสี่ยง 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="./report_risk57.php">2557</a></li>
                        <li><a href="./report_risk58.php">2558</a></li>
                        <li><a href="./report_risk59.php">2559</a></li>
                        <li><a href="./report_risk60.php">2560</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานความเสี่ยง</h3>
                                </div><!-- /.box-header -->
								<!--Start Dashboard 3-->
										<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
											<div id="ow-marketplace" class="col-sm-12 col-md-6">
												<h4 class="page-header">ความเสี่ยงแยกตามโปรแกรม</h4>
												<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
													<thead>
														<tr>
															<th>โปรแกรมความเสี่ยง</th>
															<th>จำนวน</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<?php
																//จำนวน P1
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R100' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P1) โปรแกรมด้านคลินิค</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P2
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R200' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P2) โปรแกรมด้านระบบยา/สารน้ำ/เลือด</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P3
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R300' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P3) โปรแกรมด้านการติดเชิ้อในโรงพยาบาล</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P4
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R400'and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P4) โปรแกรมด้านเครื่องมือ/อุปกรณ์</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php
																//จำนวน P5
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R500' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P5) โปรแกรมด้านสารสนเทศ/ เวชระเบียน</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P6
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R600' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P6) โปรแกรมด้านโครงสร้างทางกายภาพ/อาชีวอนามัยและความปลอดภัย</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P7
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R700' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P7) โปรแกรมด้านข้อร้องเรียน</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P8
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R800' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P8) โปรแกรมด้านบุคลากร/การประสานงาน</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php
																//จำนวน P9
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R900' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P9) โปรแกรมด้านอื่นๆ</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-12 col-md-6">
												<div id="ow-donut" class="row">
													<?php
																//จำนวนทั่วไป
																$sqlA = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport  != '0' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$recordsA = mysql_num_rows($sqlA);
													?>
													<div class="col-xs-6">
														<br>
														<p align="left">ความเสี่ยงทั่วไป = <span class='badge bg-green'><?=$recordsA?></span></p>
													</div>
													 <?php
																//จำนวนคลินิค
																$sqlB = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen != '0' and daterigter BETWEEN '".$strdate."'and '".$enddate."'");
																$recordsB = mysql_num_rows($sqlB);
													?>
													<div class="col-xs-6">
														<br>
														<p align="left">ความเสี่ยงทางคลินิค = <span class='badge bg-green'><?=$recordsB?></span></p>
													</div>
												</div>
												<div id="ow-summary" class="row">
													<div class="col-xs-12">
													<br>
														<h4 class="page-header">&Sigma; ความเสี่ยงทั่วไป <?=$recordsA?></h4>
														<div class="row">
															<div class="col-xs-12">
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='1' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ 1 <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='3' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ 3 <b><?=$records1?></b></div>
																</div>
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='2' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ 2 <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='4' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ 4 <b><?=$records1?></b></div>
																</div>
															</div>
														</div>
													</div>
												</div><!--ปิด ow-summary row-->    
												
												<div id="ow-summary" class="row">
													<div class="col-xs-12">
													<br>
														<h4 class="page-header">&Sigma; ความเสี่ยงทางคลินิค <?=$recordsB?></h4>
														
														<div class="row">
															<div class="col-xs-12">
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='A' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ A <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='F' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ F <b><?=$records1?></b></div>
																</div>
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='B' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ B <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='G' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ G <b><?=$records1?></b></div>
																</div>
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='C' and daterigter BETWEEN '".$strdate."'and '".$enddate."' "); $records1 = mysql_num_rows($sql1);
																?>
																	<div class="col-xs-6">ความรุนแรงระดับ C <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='H' and daterigter BETWEEN '".$strdate."'and '".$enddate."' "); $records1 = mysql_num_rows($sql1);
																?>
																	<div class="col-xs-6">ความรุนแรงระดับ H <b><?=$records1?></b></div>
																</div>
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='D' and daterigter BETWEEN '".$strdate."'and '".$enddate."' "); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ D <b><?=$records1?></b></div>
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='I' and daterigter BETWEEN '".$strdate."'and '".$enddate."'"); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ I <b><?=$records1?></b></div>
																</div>
																<div class="row">
																<?php
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='E' and daterigter BETWEEN '".$strdate."'and '".$enddate."' "); $records1 = mysql_num_rows($sql1);
																?>	
																	<div class="col-xs-6">ความรุนแรงระดับ E <b><?=$records1?></b></div>
																</div>
															</div>
														</div>
													</div>
												</div><!--ปิด ow-summary row-->   													   
											</div>
										</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
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
