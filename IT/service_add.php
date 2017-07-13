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
                       บันทึกการให้บริการงาน IT ทั่วไป
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
                       <form method="post" enctype="multipart/form-data"   action="service_save.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ฟอร์มบันทึกการให้บริการ วันที่ <?=LongThaiDate($date)?></h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันที่แจ้ง :
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation"  name="date_inform"  />
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เวลา :
                                            </div>
                                            <select name="hh1" class="form-control">
                                            <option value="">--- ชั่วโมง ---</option>
                                           <option value="00">00 นาฬิกา</option>
                                            <option value="01">01 นาฬิกา</option>
                                            <option value="02">02 นาฬิกา</option>
                                            <option value="03">03 นาฬิกา</option>
                                            <option value="04">04 นาฬิกา</option>
                                            <option value="05">05 นาฬิกา</option>
                                            <option value="06">06 นาฬิกา</option>
                                            <option value="07">07 นาฬิกา</option>
                                            <option value="08">08 นาฬิกา</option>
                                            <option value="09">09 นาฬิกา</option>
                                            <option value="10">10 นาฬิกา</option>
                                            <option value="11">11 นาฬิกา</option>
                                            <option value="12">12 นาฬิกา</option>
                                            <option value="13">13 นาฬิกา</option>
                                            <option value="14">14 นาฬิกา</option>
                                            <option value="15">15 นาฬิกา</option>
                                            <option value="16">16 นาฬิกา</option>
                                            <option value="17">17 นาฬิกา</option>
                                            <option value="18">18 นาฬิกา</option>
                                            <option value="19">19 นาฬิกา</option>
                                            <option value="20">20 นาฬิกา</option>
                                            <option value="21">21 นาฬิกา</option>
                                            <option value="22">22 นาฬิกา</option>
                                            <option value="23">23 นาฬิกา</option>
                                            </select>
                                            <div class="input-group-addon">
                                                นาที :
                                            </div>
                                            <select name="mm1" class="form-control">
                                            <option value="">--- นาที ---</option>
                                            <option value="00">00 นาที</option>
                                            <option value="10">10 นาที</option>
                                            <option value="20">20 นาที</option>
                                            <option value="30">30 นาที</option>
                                            <option value="40">40 นาที</option>
                                            <option value="50">50 นาที</option>
                                            </select>
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                	 
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อผู้แจ้ง :
                                            </div>
                                            <select name="person" class="form-control" >
                                              <option value="">--- เลือกชื่อผู้แจ้งซ่อม------</option>
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
                                              <option value="<?=$dataperson['depart']?>">รหัสหน่วยงาน <?=$dataperson['CODE']?> | <?=$dataperson['depart']?> </option>  
											  <?php  } ?>
                                            </select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ปัญหาที่เกิดขึ้น หรือ งานที่ไปแก้ไข :
                                            </div>
                                            <select name="cause" class="form-control">
												<option value="">--- เลือกปัญหา ---</option>
												<option value="ประชุม อบรม ศึกษาดูงาน">ประชุม อบรม ศึกษาดูงาน</option>
												<option value="แก้ไข และติดตั้ง ระบบ OS">แก้ไข และติดตั้ง ระบบ OS</option>
												<option value="แก้ไข และติดตั้ง Program">แก้ไข และติดตั้ง Program</option>
												<option value="แก้ไข และติดตั้ง ระบบ  HI For Win">แก้ไข และติดตั้ง ระบบ HI For Win </option>
												<option value="แก้ไข และติดตั้ง ระบบ Express">แก้ไข และติดตั้ง ระบบ Express</option>
												<option value="แก้ไข และติดตั้ง ระบบ Internet">แก้ไข และติดตั้ง ระบบ Internet</option>
												<option value="แก้ไข และติดตั้ง เครื่อง Computer">แก้ไข และติดตั้ง เครื่อง Computer</option>
												<option value="แก้ไข และติดตั้ง เครื่อง Printer">แก้ไข และติดตั้ง เครื่อง Printer</option>
												<option value="แก้ไขปัญหา ไวรัส และ สปายแวร์">แก้ไขปัญหา ไวรัส และ สปายแวร์</option>
												<option value="ติดตั้งโปรเจ็คเตอร์ห้องประชุม บันทึกภาพกิจกรรม">ติดตั้งโปรเจ็คเตอร์ห้องประชุม บันทึกภาพกิจกรรม</option>
												<option value="เขียนโปรแกรม เขียนรายงาน ส่งข้อมมูล">เขียนโปรแกรม เขียนรายงาน ส่งข้อมมูล</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันที่ดำเนินการ :
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservationtime"  name="date_service"  />
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เวลา :
                                            </div>
                                            <select name="hh2" class="form-control">
                                            <option value="">--- ชั่วโมง ---</option>
                                            <option value="00">00 นาฬิกา</option>
                                            <option value="01">01 นาฬิกา</option>
                                            <option value="02">02 นาฬิกา</option>
                                            <option value="03">03 นาฬิกา</option>
                                            <option value="04">04 นาฬิกา</option>
                                            <option value="05">05 นาฬิกา</option>
                                            <option value="06">06 นาฬิกา</option>
                                            <option value="07">07 นาฬิกา</option>
                                            <option value="08">08 นาฬิกา</option>
                                            <option value="09">09 นาฬิกา</option>
                                            <option value="10">10 นาฬิกา</option>
                                            <option value="11">11 นาฬิกา</option>
                                            <option value="12">12 นาฬิกา</option>
                                            <option value="13">13 นาฬิกา</option>
                                            <option value="14">14 นาฬิกา</option>
                                            <option value="15">15 นาฬิกา</option>
                                            <option value="16">16 นาฬิกา</option>
                                            <option value="17">17 นาฬิกา</option>
                                            <option value="18">18 นาฬิกา</option>
                                            <option value="19">19 นาฬิกา</option>
                                            <option value="20">20 นาฬิกา</option>
                                            <option value="21">21 นาฬิกา</option>
                                            <option value="22">22 นาฬิกา</option>
                                            <option value="23">23 นาฬิกา</option>
                                            </select>
                                            <div class="input-group-addon">
                                                นาที :
                                            </div>
                                            <select name="mm2" class="form-control">
                                            <option value="">--- นาที ---</option>
                                            <option value="00">00 นาที</option>
                                            <option value="10">10 นาที</option>
                                            <option value="20">20 นาที</option>
                                            <option value="30">30 นาที</option>
                                            <option value="40">40 นาที</option>
                                            <option value="50">50 นาที</option>
                                            </select>
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                การแก้ไขปัญหา :
                                            </div>
                                            <textarea name="detail_service" cols="" rows="3" class="form-control"></textarea>
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ผู้ดำเนินการ :
                                            </div>
                                            <select name="person_service" class="form-control">
                                            <option value="">--- เลือกผู้ดำเนินงาน ---</option>
                                            <option value="นายการุณ บุญครอบ">นายการุณ บุญครอบ</option>
                                            <option value="นายธวัชชัย แสงเดือน">นายธวัชชัย แสงเดือน</option>
                                            <option value="นายพิษณุ  โทคำเวช">นายพิษณุ  โทคำเวช</option>
                                            <option value="นายสุริยา คุณดก">นายสุริยา คุณดก</option>
                                            </select>
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกการให้บริการงาน IT</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">
                                     <i class="fa fa-reply-all"></i>    ย้อนกลับ</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>    
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">รายการออกให้บริการ IT</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="10%">No.</th>
                                                <th width="20%">วันที่</th>
                                                <th width="25%">ปัญหา</th>
                                                <th width="25%">หน่วยงาน</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM	 it_service order by id desc  "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {	
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate($data['date_service'])?></td>
                                                <td><?=$data['detail_service']?></td>
                                                <td><?=$data['depart']?></td>
                                                <th><a href="service_edit.php?id=<?=$data['id']?>" onclick="return confirm('แก้ไขหรือไม่');" >
                                                <i class="fa fa-edit"></i></a></th>
                                                <th><a href="service_delete.php?id=<?=$data['id']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" >
                                                <i class="fa fa-trash-o"></i></a></th>
                                            </tr>
                                        <?php  $no++;  } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /box box-solid box-primary -->
                            </section><!-- /.Left col -->

							<section class="col-lg-12 connectedSortable">
                                    <div class="box box-solid box-primary">
                                               <div class="box-header">
                                                   <i class="fa fa-calendar"></i></i>
                                                   <h3 class="box-title">ปฏิทิน รายการออกให้บริการ IT</h3>
                                                   </div><!-- /.box-header -->
                                                    <div class="box-body">
                                                        <div id="calendar"></div> 
                                                    </div>  <!-- /box-body -->
                                      </div> <!-- /panel panel-primary -->
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
			function fncSubmit() {
				if(document.frmMain.date_inform.value == "")
				{	alert(' เลือกวันที่แจ้งซ่อม ');	
							document.frmMain.date_inform.focus();
							return false; } 
							
				if(document.frmMain.hh1.value == "")
				{	alert(' ระบุเวลาแจ้ง นาฬิกา ');	
							document.frmMain.hh1.focus();
							return false; } 
							
				if(document.frmMain.mm1.value == "")
				{	alert(' ระบุเวลาแจ้ง นาที ');	
							document.frmMain.mm1.focus();
							return false; } 
				
				if(document.frmMain.person.value == "")
				{	alert(' ระบุชื่อผู้แจ้งซ่อม ');	
							document.frmMain.person.focus();
							return false; } 
				
				if(document.frmMain.depart.value == "")
				{	alert(' เลือหน่วยงาน ');	
							document.frmMain.depart.focus();
							return false; } 
				
				if(document.frmMain.cause.value == "")
				{	alert(' เลือกปัญหา ');	
							document.frmMain.cause.focus();
							return false; } 
							
				if(document.frmMain.date_service.value == "")
				{	alert(' เลือกวันที่ให้บริการ ');	
							document.frmMain.date_service.focus();
							return false; } 
							
				if(document.frmMain.hh2.value == "")
				{	alert(' ระบุเวลาให้บริการ นาฬิกา ');	
							document.frmMain.hh2.focus();
							return false; } 
							
				if(document.frmMain.mm2.value == "")
				{	alert(' ระบุเวลาให้บริการ นาที ');	
							document.frmMain.mm2.focus();
							return false; } 
				
				if(document.frmMain.detail_service.value == "")
				{	alert(' ระบุรายละเอียดการให้บริการ ');	
							document.frmMain.detail_service.focus();
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
