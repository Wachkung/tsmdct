<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] == "")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$idcard=$_GET['idcard'];

	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    </head>
    <? include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Advanced Form Elements
                        <small>Preview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">Advanced Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">เลือกวันลา</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <div class="form-group">
                                        <label>เลือกวันที่ลา</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservationtime"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>ประเภทการลา</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                           	<select class="form-control">
                                            	<option value="">----- เลือกประเภทการลา -----</option>
                                                <option value="">ป่วย</option>
                                                <option value="">กิจ</option>
                                                <option value="">พักผ่อน</option>
                                                <option value="">คลอด/เลี้ยงดูบุตร</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<p align="left"><img  src="http://www.wkhospital.go.th/2557/registry/person/output/<?=$objResult["idcard"];?>.png"
                                    width="104" height="140" class="img-thumbnail"/></p>
                                    <p> ชื่อ <code><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></code>
                                    เลขบัตรประชาชน <code><?=$objResult["idcard"];?></code></p>
                                    <p> วันเกิด <code><?=LongThaiDate($objResult["bdate"])?></code></p>
                                    <p> เริ่มทำงานวันที่ <code><?=LongThaiDate($objResult["workdate"])?></code></p>
                                    <p> ตำแหน่ง <code><?=$objResult["position"];?></code></p>
                                    <p> หน่วยงาน <code><?=$objResult["depart"];?></code></p>
                                </div> <!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col (right) -->
                        
                        <div class="col-xs-8">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายชื่อเจ้าหน้าที่ โรงพยาบาล</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-สกุล</th>
                                                <th>เลขบัตรประชาชน</th>
                                                <th>ตำแหน่ง</th>
                                                <th>สถานะ</th>
                                                <th>วันที่เริ่มทำงาน</th>
                                                <th>บันทึกวันลา</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
											$sql=" SELECT * FROM	 person  order by id ASC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                                <td><a href="" title="<?=$data['name']?>  <?=$data['lastname']?>"><?=$data['name']?>  <?=$data['lastname']?></a></td>
                                                <td><?=$data['idcard']?></td>
                                                <td><?=$data['position']?></td>
                                                <td><?=$data['typetext']?></td>
                                                <td><?=$data['workdate']?></td>
                                                <td><a href="" title="<?=$data['name']?>  <?=$data['lastname']?>"><span class="label label-primary">บันทึกวันลา</span></a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>เลขบัตรประชาชน</th>
                                                <th>ชื่อ-สกุล</th>
                                                <th>ตำแหน่ง</th>
                                                <th>สถานะ</th>
                                                <th>วันที่เริ่มทำงาน</th>
                                                <th>บันทึกวันลา</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
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
