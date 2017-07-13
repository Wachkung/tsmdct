<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	//include("../includes/connhidb.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['ROOM'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบสิทธิ์การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=../main.php'>";
		exit();
	}
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
		 <script type="text/javascript">
		$(document).ready(function(){

			// calculate height
			var screen_ht = $(window).height();
			var preloader_ht = 5;
			var padding =(screen_ht/2)-preloader_ht;
			$("#preloader").css("padding-top",padding+"px");
		});
		$(document).ready(function(){
		// loading animation using script 
			function anim() {
				$("#preloader_image").animate({left:'-1400px'}, 5000,
				function(){ $("#preloader_image"),animate({left:'0px'}, 5000 );
					if (rotate==1){
						anim();
					}
				}
				);
			}
			anim();
		});
		</script> 
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ระบบรายงานโรงพยาบาล 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>
                <section class="content">             
                     <div class="row">   
						<div id="ow-marketplace" class="col-sm-12 col-md-12">
						<tbody>
								<div class="box">
									<div class="box-header"align="center">
										<h3 class="box-title"> รายงาน จองห้องประชุม รพ.ตาลสุม </h3>Excel Created <a href="frm_roomshow_excel.php?sdate=<?=$sdate?>&edate=<?=$edate?>">Click here</a> to Download.
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
											    <th width="5%">No.</th>
                                                <th width="15%">ห้องประชุม</th>
                                                <th width="10%">วันที่เริ่ม</th>
                                                <th width="10%">วันสิ้นสุด</th>
                                                <th width="8%">เวลาที่เริ่ม</th>
                                                <th width="8%">เวลาสิ้นสุด</th>
                                                <th width="15%">ผู้ขอใช้ห้องประชุม</th>
                                                <th width="20%">หัวข้อการขอจองห้องประชุม</th>  
												</tr>
											</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sqlmeeting="SELECT meeting_room.`name` as 'ห้องประชุม',
												meeting_list.strdate,
												meeting_list.enddate,
												meeting_list.strtime,
												meeting_list.endtime,
												person.title,
												person.`name` as 'ชื่อ',
												person.lastname as 'สกุล',
												meeting_list.`name` as 'หัวเรื่อง' 
												FROM meeting_list 
												INNER JOIN meeting_room ON meeting_room.id = meeting_list.room
												INNER JOIN person on person.idcard = meeting_list.idcard
												where (meeting_list.strdate between '$sdate' and '$edate') order by meeting_list.strdate DESC;
												"; 
												$resultmeeting = mysql_query($sqlmeeting); while($datameeting = mysql_fetch_array($resultmeeting)) {

											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$datameeting['0']?></td>
													<td><?=$datameeting['1']?></td>
													<td><?=$datameeting['2']?></td>
													<td><?=$datameeting['3']?></td>
													<td><?=$datameeting['4']?></td>
													<td><?=$datameeting['5']?><?=$datameeting['6']?>   <?=$datameeting['7']?></td>
													<td><?=$datameeting['8']?></td>
											<?php $no++; } ?>
											</tbody>
										</table>
									</div><!-- /.box-body -->
						</tbody>
						</div>
					</div>
				</section>
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
