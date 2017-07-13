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
                       ค่าใช้จ่ายซ่อม || ทั้งหมด 
							<?php  //สรุปค่าใช้จ่าย
							$strSQL1 = "SELECT sum(price_repair) as sum_total FROM it_repair  ";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$sum_total=$objResult1['sum_total'];
							echo number_format( $sum_total );  
							?> บาท
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="main2.php">ค่าใช้จ่าย</a></li>
                        <li class="active">ค่าซ่อม</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">รายการค่าใช้จ่ายซ่อมทั้งหมด</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                	<div class="form-group">
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='main2.php'">
                                     <i class="fa fa-reply"></i> กลับหน้าค่าใช้จ่าย</button>		
                                 	</div><!-- /.form group -->
                                </div><!-- /.box-body --> 
                                
                                <div class="box-footer table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="8%">No.</th>
                                                <th width="18%">วันที่</th>
                                                <th width="15%">รหัสครุภัณฑ์</th>
                                                <th width="44%">รายละเอียด</th>
                                                <th width="15%">ราคา</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
											$total=0; $no=1;
											$sql=" SELECT * FROM	 it_repair  where date_repair >= '2014-01-01' order by date_repair desc "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$total=$total+$data['price_repair'];	
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate($data['date_repair'])?></td>
                                                <td><?=$data['code']?></td>
                                                <td><?=$data['detail_repair']?><br>ผู้ดำเนินงาน : <?=$data['person_repair']?></td>
                                                <td><?=number_format($data['price_repair'])?></td>
                                            </tr>
                                        <?php  $no++;  } ?>
                                        <?php 
												$input_number=$total;
												$digit=array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ','สิบเอ็ด');
												$digit2=array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
												$explode_number = explode(".",$input_number);
												$num0=$explode_number[0]; // เลขจำนวนเต็ม
												$num1=$explode_number[1]; // หลักทศนิยม
												// เลขจำนวนเต็ม
												$didit2_chk=strlen($num0)-1;
												for($i=0;$i<=strlen($num0)-1;$i++){
												  $cut_input_number=substr($num0,$i,1);
												  if($cut_input_number==0){ // ถ้าเลข 0 ไม่ต้องใส่ค่าอะไร
												   //$bathtext1.=''."".$digit2[$didit2_chk]; 
												  }elseif($cut_input_number==2 && $didit2_chk==1){ // ถ้าเลข 2 อยู่หลักสิบ
												   $bathtext1.='ยี่'."".$digit2[$didit2_chk]; 
												  }elseif($cut_input_number==1 && $didit2_chk==1){ // ถ้าเลข 1 อยู่หลักสิบ
												   //$bathtext1.= ''."".$digit2[$didit2_chk]; 
												  }elseif($cut_input_number==1 && $didit2_chk==0){ // ถ้าเลข 1 อยู่หลักหน่วย
												   if(substr($num0,$i-1,1)==0){
													$bathtext1.= 'หนึ่ง'."".$digit2[$didit2_chk];
												   }else{
													$bathtext1.= 'เอ็ด'."".$digit2[$didit2_chk];
												   } 
												  }else{
												   $bathtext1.= $digit[$cut_input_number]."".$digit2[$didit2_chk];
												  }
												  $didit2_chk=$didit2_chk-1;
												}
												$bathtext1.='บาท ';
												// เลขทศนิยม
												$didit2_chk=strlen($num1)-1;
												for($i=0;$i<=strlen($num1)-1;$i++){
												  $cut_input_number=substr($num1,$i,1);
												  if($cut_input_number==0){ // ถ้าเลข 0 ไม่ต้องใส่ค่าอะไร
												  }elseif($cut_input_number==2 && $didit2_chk==1){ // ถ้าเลข 2 อยู่หลักสิบ
												   $bathtext1.='ยี่'."".$digit2[$didit2_chk]; 
												  }elseif($cut_input_number==1 && $didit2_chk==1){ // ถ้าเลข 1 อยู่หลักสิบ
												   $bathtext1.= ''."".$digit2[$didit2_chk];
												  }elseif($cut_input_number==1 && $didit2_chk==0){ // ถ้าเลข 1 อยู่หลักหน่วย
												   if(substr($num1,$i-1,1)==0){
													$bathtext1.= 'หนึ่ง'."".$digit2[$didit2_chk];
												   }else{
													$bathtext1.= 'เอ็ด'."".$digit2[$didit2_chk];
												   } 
												  }else{
												   $bathtext1.= $digit[$cut_input_number]."".$digit2[$didit2_chk];
												  }
												  $didit2_chk=$didit2_chk-1;
												}
											?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            	<th colspan="1">รวม</th>
                                                <th colspan="3"><?=$bathtext1?></th>
                                                <th colspan="1"><?=number_format($total);?></th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /box box-solid box-primary -->
                            </section><!-- /.Left col -->

							<section class="col-lg-6 connectedSortable">
                                    <div class="box box-solid box-primary">
                                               <div class="box-header">
                                                   <i class="fa fa-calendar"></i></i>
                                                   <h3 class="box-title">ค่าซ่อมจำแนกตามวันที่</h3>
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
