<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['ROOM'] <> "1")
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
                       บันทึกขอใช้ห้องประชุม
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
                       <section class="col-lg-8 connectedSortable"> 
                       <form method="post" enctype="multipart/form-data"   action="room_save.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ฟอร์มบันทึกการให้บริการ วันที่ <?=LongThaiDate($date)?></h3>
                                </div>
                                <div class="box-body">
									<div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon">
                                                วันที่ขอใช้ห้องประชุม :
                                            </div>
                                            <input type="text" class="form-control" id="strdate" name="strdate"/> 
											<div class="input-group-addon"> 
												ถึงวันที่   :</i>
                                            </div>
											<input type="text" class="form-control" id="enddate" name="enddate"/>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon"> 
												เวลาขอใช้ห้องประชุม :</i>
                                            </div>
											<input type="text" class="form-control pull-right"name="strtime"/>
											<div class="input-group-addon"> 
												ถึงเวลา   :</i>
                                            </div>
											<input type="text" class="form-control pull-right"name="endtime"  />
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อผู้ขอใช้ห้องประชุม:
                                            </div>
                                            <select name="idcard" class="form-control" >
                                              <option value="">--- เลือกชื่อเจ้าหน้าที่------</option>

                                              <?php
													if($_SESSION['ADMIN'] <> "1") {   
													$sqlperson=" SELECT * FROM	 person WHERE idcard = '$IDCARD1'  order by name ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['idcard']?>"><?=$dataperson['idcard']?> || <?=$dataperson['name']?>  
											  <?=$dataperson['lastname']?> </option>
											  <?php  } 
											  }else{
													$sqlperson=" SELECT * FROM	 person  order by name ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['idcard']?>"><?=$dataperson['idcard']?> || <?=$dataperson['name']?>  
											  <?=$dataperson['lastname']?> </option>
											  <?php  } 
											  }	  ?>

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
                                              <?php   $sqldepart=" SELECT * FROM	 rm_depart  order by CODE ASC "; 
												 $resultdepart = mysql_query($sqldepart); while($datadepart = mysql_fetch_array($resultdepart)) {
											  ?>
                                              <option value="<?=$datadepart['CODE']?>">รหัสหน่วยงาน <?=$datadepart['CODE']?> | <?=$datadepart['depart']?> </option>  
											  <?php  } ?>
                                            </select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ห้องประชุม :
                                            </div>
                                            <select name="room" class="form-control" >
                                              <option value="">--- เลือกห้องประชุม------</option>
                                              <?php   $sqlroom=" select * from meeting_room "; 
												 $resultroom = mysql_query($sqlroom); while($dataroom = mysql_fetch_array($resultroom)) {
											  ?>
                                              <option value="<?=$dataroom['id']?>">รหัสห้องประชุม <?=$dataroom['id']?> | <?=$dataroom['name']?> </option>  
											  <?php  } ?>
                                            </select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
 
									<div class="form-group">
										<div class="input-group">
                                            <div class="input-group-addon">
                                                เพื่อใช้ :
                                            </div>
                                            <select name="roomtype" class="form-control" >
                                              <option value="">--- เลือกประเภทการประชุม------</option>
                                              <?php   $sqlroomtype=" select * from meeting_room_type "; 
												 $resultroomtype = mysql_query($sqlroomtype); while($dataroomtype = mysql_fetch_array($resultroomtype)) {
											  ?>
                                              <option value="<?=$dataroomtype['id']?>">รหัสประเภทการประชุม <?=$dataroomtype['id']?> | <?=$dataroomtype['name']?> </option>  
											  <?php  } ?>
                                            </select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon">
                                                หัวข้อเรื่อง :
                                            </div>
                                            <input type="text" class="form-control" name="name"/> 
											<div class="input-group-addon"> 
												จำนวน :</i>
                                            </div>
                                           	<input type="text" class="form-control"name="qty"  />
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ดำเนินการ :
                                            </div>
											  <label class="form-control">
												<input name="conduct" type="radio" value="Y" checked> : ผู้จัดรับผิดชอบดำเนินการเอง
											  </label>
											  <label class="form-control">
												<input name="conduct" type="radio" value="N"> : ประสงค์ให้งานธุรการดำเนินการ
											  </label>

										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                จัดเตรียมห้องประชุม :
                                            </div>
											  <label class="form-control">
												<input name="conduct_1" type="checkbox" value="Y"> : จัดสถานที่ประชุม 
											  </label>
											  <label class="form-control">
												<input name="conduct_2" type="checkbox" value="Y"> : จัดเครื่องดื่ม(น้ำเปล่า) จำนวน 
													<select name="conduct_2_qty">
															<option value=""> กรุณาเลือก </option> 
															<option value="1"> 1 รอบเบรค </option> 
															<option value="2"> 2 รอบเบรค </option> 
															<option value="3"> 3 รอบเบรค </option> 
													   </select>
											  </label>
											  <label class="form-control">
												<input name="conduct_3" type="checkbox" value="Y"> : จัดเครื่องดื่มพร้อมอาหารว่าง จำนวน 
													<select name="conduct_3_qty">
															<option value=""> กรุณาเลือก </option> 
															<option value="1"> 1 รอบเบรค </option> 
															<option value="2"> 2 รอบเบรค </option> 
															<option value="3"> 3 รอบเบรค </option> 
													   </select>
											  </label>
											  <label class="form-control">
												<input name="computer" type="checkbox" value="Y"> : จัดเครื่องคอมพิวเตอร์ 
											  </label>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                งบประมาณ :
                                            </div>
											  <label class="form-control">
												<input type="radio" name="budget" id="budget" value="1" > : เงินบำรุงของโรงพยบาล
											  </label>
											  <label class="form-control">
												<input type="radio" name="budget" id="budget" value="2" > : เงินสนับสนุน/โครงการของผู้จัด
											  </label>
											  <label class="form-control">
												<input type="radio" name="budget" id="budget" value="3" > : ไม่เสียงบประมาณ(ประชุมภายใน รพ.)
											  </label>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกขอใช้ห้องประชุม</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">
                                     <i class="fa fa-reply-all"></i>    ย้อนกลับ</button>	
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

		<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/smoothness/jquery-ui-1.7.2.custom.css">
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript">
		$(function(){
			// แทรกโค้ต jquery
			$("#strdate").datepicker({dateFormat: 'yy-mm-dd'});
			$("#enddate").datepicker({dateFormat: 'yy-mm-dd'});
			// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16

		});
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
