<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$date=date("Y-m-d");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    </head>
			
    <?php  include "navigator.php";?>

			<!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       บันทึกสิทธิการเข้าถึงข้อมูล
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="service_add.php">ให้บริการ</a></li>
                        <li class="active">บันทึก</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable"> 
                       <form method="post" enctype="multipart/form-data"   action="user_save.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ฟอร์มบันทึกการให้บริการ วันที่ <?=LongThaiDate($date)?></h3>
                                </div>
                                <div class="box-body">
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อ - สกุล :
                                            </div>
                                            <select name="IDCARD" class="form-control" >
                                              <option value="">--- เลือกชื่อเจ้าหน้าที่------</option>
                                              <?php
													$sqlperson=" SELECT * FROM	 person  order by name ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['idcard']?>"><?=$dataperson['idcard']?> || <?=$dataperson['name']?>  
											  <?=$dataperson['lastname']?> </option>
											  <?php  } ?>
                                            </select>  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                หน่วยงาน :
                                            </div>
                                            <select name="depart" class="form-control" >
                                              <option value="">--- เลือกหน่วยงาน------</option>
                                              <?php
													$sqlperson=" SELECT * FROM	 rm_depart  order by CODE ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['CODE']?>">รหัสหน่วยงาน <?=$dataperson['CODE']?> | <?=$dataperson['depart']?> </option>  
											  <?php  } ?>
                                            </select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                สิทธ์การเข้าถึงข้อมูล :
                                            </div>
											  <label class="form-control">
												<input type="checkbox" name="ADMIN" id="ADMIN" value="1" > : ADMIN
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="RISK" id="RISK" value="1" > : RISK
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="HISTORY" id="REPORT" value="1" > : REPORT
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="LA" id="LA" value="1" checked> : LA
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="ROOM" id="ROOM" value="1"checked > : ROOM
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="IT" id="IT" value="1" > : IT
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="PERSON" id="PERSON" value="1" > : PERSON
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="NUTRITION" id="NUTRITION" value="1" > : NUTRITION
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="DURABLE" id="DURABLE" value="1" > : DURABLE
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="PCT" id="PCT" value="1" > : PCT
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="PTC" id="PTC" value="1" > : PTC
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="IC" id="IC" value="1" > : IC
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="IM" id="IM" value="1" > : IM
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="ENV" id="ENV" value="1" > : ENV
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="HRD" id="HRD" value="1" > : HRD
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="STATUS" id="STATUS" value="1" checked> : STATUS
											  </label>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกการให้บริการงาน IT</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='report_user.php'"><i class="fa fa-reply-all"></i>ย้อนกลับ</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>    
                        </section><!-- /.Left col -->
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
