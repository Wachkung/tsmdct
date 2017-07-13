<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 

	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['NUTRITION'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}


	
	$strSQLuser = "SELECT * FROM user_datacenter WHERE idcard = '$IDCARD1' ";
	$objQueryuser = mysql_query($strSQLuser);
	$objResultuser = mysql_fetch_array($objQueryuser);
	$admin=$objResultuser["ADMIN"];

	$idcard=$_GET['idcard'];
	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$position=$objResult["position"];
	$depart=$objResult["depart"];
	$personla=$objResult["personla"];

?>
	



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
        <script type="text/javascript">
			function fncSubmit() {
				if(document.frmMain.idcard.value == "")
				{	alert(' ใส่ รหัสบัตรประชาชน ');	
							document.frmMain.idcard.focus();
							return false; } 
							
				if(document.frmMain.title.value == "")
				{	alert(' ใส่ คำนำหน้าชื่อ ');	
							document.frmMain.title.focus();
							return false; } 
							
				if(document.frmMain.name.value == "")
				{	alert(' ใส่ ชื้อ ');	
							document.frmMain.name.focus();
							return false; } 
				
				if(document.frmMain.lastname.value == "")
				{	alert('  ใส่ สกุล ');	
							document.frmMain.lastname.focus();
							return false; } 
			}
			</script>
			<script language="javascript">
			function CheckNum(){
					if (event.keyCode < 46 || event.keyCode > 57){
						  event.returnValue = false;
						}
				}
		</script>
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li class="active">ข้อมูลผู้รับบริการโภชนาการ</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content"> 
                 	<div class="row"> 
                	<form method="post" enctype="multipart/form-data"   action="nutrition_save.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >            
                       <section class="col-lg-5 connectedSortable">    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">เพิ่มข้อมูลผู้ป่วย </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                HN :
                                            </div>
                                            <input type="text" class="form-control" name="nutrition_hn" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                	 
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อ - สกุล :
                                            </div>
                                            <input type="text" class="form-control" name="nutrition_name" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เพศ :
                                            </div>
                                            <select name="nutrition_sex" class="form-control">
                                              <option value=""></option>
                                              <option value="ชาย">ชาย</option>
                                              <option value="หญิง">หญิง</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันเดือนปีที่รับบริการ :
                                            </div>
                                            <input type="text" class="form-control"data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="nutrition_date"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                 DX ที่รับบริการ :
                                          	 </div>
                                            <select name="nutrition_dx" class="form-control">
                                              <option value=""></option>
                                              <option value="I149">โรคความดันสูง</option>
                                              <option value="E115">โรคเบาหวาน</option>
                                            </select>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                FBS :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_fbs" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                BP :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_bp" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                BVN :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_bvn" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                CR :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_cr" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                TC :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_tc" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                TG :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_tg" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                LDL :
                                            </div>
                                            <input type="text" class="form-control"   name="nutrition_ldl" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                    <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success" onclick="return confirm('ต้องการบันทึกการแก้ไขหรือไม่')"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'"><i class="fa fa-reply"></i> กลับหน้าแรก</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">ข้อมูลผู้รับบริการ</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="3%">No.</th>
                                                <th width="3%">HN</th>
                                                <th width="10%">ชื่อ-สกุล</th>
                                                <th width="10%">วันรับบริการ</th>
                                                <th width="3%"><i class="fa fa-edit"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>

										<?php  
												   $total=0; $no=1;
												$sql="  SELECT * FROM nutrition order by nutrition_date DESC "; 
                        						$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=$data['nutrition_hn']?></td>
                                                <td><?=$data['nutrition_name']?></td>
                                                <td><?=LongThaiDate($data['nutrition_date'])?></td>
                                                <td><a href="nutrition_edit.php?nutrition_id=<?=$data['nutrition_id']?>" title="<?=$data['nutrition_name']?> "  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                            </tr>
                                        <?php 
											  $no++; } 
										?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
							</div><!-- /.box -->
                            </section><!-- /.Left col -->
                    </form>        
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
