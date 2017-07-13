<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
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
                       เพิ่มไฟล์ตรวจรับ
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="file_add.php">จัดการไฟล์อัพโหลด</a></li>
                        <li class="active">เพิ่มใหม่</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-5 connectedSortable"> 
                       <form method="post" enctype="multipart/form-data"   action="file_save.php" 
                                 name="frmMain" onSubmit="JavaScript:return fncSubmit();" role="form">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ฟอร์มเพิ่มไฟล์ Up Load</h3>
                                </div>
                                <div class="box-body">
                                	<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันที่บันทึก
                                            </div>
                                            <input type="text" class="form-control" name="dupdate" value="<?=LongThaiDate($date)?>" readonly  />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เรื่อง/หัวข้อ
                                            </div>
                                            <input type="text" class="form-control"  name="file_title"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ฝ่าย/กลุ่มงาน :
                                            </div>
											 <select class="form-control"  name="file_depart">
												<option value="">- เลือก ฝ่าย/กลุ่มงาน-</option>
												<?php
														$sql="select CODE, DeptName from risk2_departreport order by DeptName ";
														$dbquery = mysql_db_query($db, $sql);
														$num_rows = mysql_num_rows($dbquery);
														$i=0;
														while ($i < $num_rows)
															{
																$result = mysql_fetch_array($dbquery);
																$codedepartreport = $result[0];
																$namedepartreport = $result[1];
																echo"<option value='$codedepartreport'>$namedepartreport</option>";
																$i++;
															}
												?>
											</select> 
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ประเภท :
                                            </div>
                                        <select class="form-control"  name="file_type">
                                            <option value="">----- เลือกประเภท -----</option>
                                            <option value="1. เอกสารทั่วไป">1. เอกสารทั่วไป</option>
                                            <option value="2. หนังสือ">2. หนังสือ</option>
                                            <option value="3. คำสั่ง">3. คำสั่ง</option>
                                            <option value="4. อื่นๆ">4. อื่นๆ</option>
                                        </select> 
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เลือกไฟล์อัพโหลด :
                                            </div>
                                            <input name="file_download"  type="file" class="form-control">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
 
									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เลือกไฟล์อัพโหลด : .pdf .rar .zip เท่านั้น
                                            </div>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->                               
								</div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<div class="form-group">
                                    <input name="IDCARD" type="hidden" class="form-control"  value="<?= $IDCARD1 ?>">
                                   	<button  type="submit" class="btn btn-success">อัพโหลดไฟล์</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">
                                    <i class="fa fa-reply-all"></i> หน้าแรก</button>
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-7 connectedSortable">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ไฟล์ตรวจรับทั้งหมด</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="8%">No.</th>
                                                <th width="20%">วันที่</th>
                                                <th width="42%">เอกสาร</th>
                                                <th width="5%"><i class="fa fa-download"></i></th>  
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM upload_file where IDCARD='$IDCARD1'   order by dupdate DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$total=$total+$data['price_repair'];	
											$file_depart=$data['file_depart'];
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate($data['dupdate'])?></td>
                                                <td><?=$data['file_title']?></td>
                                                <td><a href="file_download/<?=$data['file_name']?>"  target="_blank"><i class="fa fa-download"></i></a></td>
                                                <th><a href="file_edit.php?id=<?=$data['id']?>" onclick="return confirm('แก้ไขหรือไม่');" >
                                                <i class="fa fa-edit"></i></a></th>
                                                <th><a href="file_delete.php?id=<?=$data['id']?>&file_name=<?=$data['file_name']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" >
                                                <i class="fa fa-trash-o"></i></a></th>
                                            </tr>
                                        <?php  $no++;  } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /box box-solid box-primary -->
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
				if(document.frmMain.file_title.value == "")
				{	alert(' ระบุหัวข้อ/เรื่อง ');	
							document.frmMain.file_title.focus();
							return false; } 
							
				if(document.frmMain.file_number.value == "")
				{	alert(' เลขที่หนังสือ ');	
							document.frmMain.file_number.focus();
							return false; } 
				
				if(document.frmMain.file_download.value == "")
				{	alert(' เลือกไฟล์ ');	
							document.frmMain.file_download.focus();
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
