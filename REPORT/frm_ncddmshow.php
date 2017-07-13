<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	include("../includes/connhidb.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['REPORT'] <> "1")
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
<html>
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
										<h3 class="box-title">รายงาน NCD เบาหวาน ในเขต รพ. </h3>Excel Created <a href="frm_ncddmshow_excel.php?sdate=<?=$sdate?>&edate=<?=$edate?>">Click here</a> to Download.
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%"align="center">No.</th>
													<th width="5%"align="center">HN</th>
													<th width="15%"align="center">วันที่ขึ้นทะเบียน</th>
													<th width="12%"align="center">ชื้อ - สกุล</th>
													<th width="5%"align="center">เพศ</th>
													<th width="5%"align="center">อายุ</th>
													<th width="10%"align="center">เลขบัตรประชาชน</th>
													<th width="5%"align="center">ICD10</th>
													<th width="5%"align="center">เลขที่</th>
													<th width="10%"align="center">หมู่</th>
													<th width="8%"align="center">ตำบล</th>
													<th width="8%"align="center">อำเภอ</th>
													<th width="10%"align="center">จังหวัด</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sql="select 
														ovst.hn as HN, 
														ovst.vstdttm as 'วันที่ขึ้นทะเบียน',
														pt.fname as 'ชื้อ',
														pt.lname as 'สกุล',
														if(pt.male = 1,'ชาย','หญิง') as 'เพศ',
														ROUND((date(ovst.vstdttm)- pt.brthdate)/10000) AS age,
														pt.pop_id as 'เลขบัตรประชาชน',
														ovstdx.icd10 as 'ICD10',
														pt.addrpart as 'บ้านเลขที่',
														mooban.namemoob as 'ที่อยู่',
														tumbon.nametumb as 'ตำบล',
														ampur.nameampur as 'อำเภอ',
														changwat.namechw as 'จังหวัด'
														from hi.ovst 
														inner join hi.ovstdx on ovst.vn=ovstdx.vn 
														inner join hi.pt on ovst.hn=pt.hn
														INNER JOIN hi.mooban ON mooban.chwpart = pt.chwpart AND mooban.amppart = pt.amppart AND mooban.tmbpart = pt.tmbpart AND mooban.moopart = pt.moopart
														INNER JOIN hi.tumbon ON tumbon.chwpart = mooban.chwpart AND tumbon.amppart = mooban.amppart AND tumbon.tmbpart = mooban.tmbpart
														INNER JOIN hi.ampur ON ampur.amppart = tumbon.amppart AND ampur.chwpart = tumbon.chwpart
														INNER JOIN hi.changwat ON changwat.chwpart = ampur.chwpart 
														where (ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'E10' and 'E149')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01) 
														and ovst.hn not in (select ovst.hn from hi.ovst inner join hi.ovstdx on ovst.vn=ovstdx.vn  
														where (ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'I10' and 'I159')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01))  GROUP BY hn order by hn;
														"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$data['0']?></td>
													<td><?=$data['1']?></td>
													<td><?=$data['2']?>  <?=$data['3']?></td>
													<td><?=$data['4']?></td>
													<td><?=$data['5']?></td>
													<td><?=$data['6']?></td>
													<td><?=$data['7']?></td>
													<td><?=$data['8']?></td>
													<td><?=$data['9']?></td>
													<td><?=$data['10']?></td>
													<td><?=$data['11']?></td>
													<td><?=$data['12']?></td>
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

        <!-- Page specific script -->
        <script type="text/javascript">
            $(function() {

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date();
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {//This is to add icons to the visible buttons
                        prev: "ก่อนหน้า ",
                        next: " ถัดไป",
                        today: 'วันนี้',
                        month: 'เดือน',
                        week: 'สัปดาห์',
                        day: 'วัน'
                    },
                    //Random default events
                    events: [
					
						<?php   //แสดงงานการบำรุงรักษา การซ่อมที่เคยทำมาแล้ว
							$sql=" SELECT * FROM	 it_mainten  group by date_mainten  "; 
							$result = mysql_query($sql); 
							while($data= mysql_fetch_array($result)) {
							$date_mainten=$data['date_mainten'];
							
								//หาจำนวนรายการ
								$sql2 = mysql_query("SELECT * FROM it_mainten where date_mainten='$date_mainten' ");
								$records2 = mysql_num_rows($sql2);
												
													
						?>
                        {
							
                            title: '<?=$data['detail_mainten']?>  <?=$records2?> รายการ',
                            start: '<?=$data['date_mainten']?>',
                            end: '<?=$data['date_mainten']?>',
                            url: '',
                            backgroundColor: "#483D8B", //Primary (light-blue)
                            borderColor: "#483D8B" //Primary (light-blue)
                        },
						
						<?php  } ?>
						
						
						<?php   //แสดงงานแผน
							$sql=" SELECT * FROM	 it_plan_mainten  "; 
							$result = mysql_query($sql); 
							while($data= mysql_fetch_array($result)) {
													
						?>
                        {
							
                            title: '<?=$data['detail']?>',
                            start: '<?=$data['sdate']?>',
                            end: '<?=$data['edate']?>',
                            url: '',
                            backgroundColor: "#006400", //Primary (light-blue)
                            borderColor: "#006400" //Primary (light-blue)
                        },
						
						<?php  } ?>
                    ],
					eventClick: function(event) {
						if (event.url) {

							window.open(event.url);
							return false;
						}
					},
				
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });

                /* ADDING EVENTS */
                var currColor = "#f56954"; //Red by default
                //Color chooser button
                var colorChooser = $("#color-chooser-btn");
                $("#color-chooser > li > a").click(function(e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css("color");
                    //Add color effect to button
                    colorChooser
                            .css({"background-color": currColor, "border-color": currColor})
                            .html($(this).text()+' <span class="caret"></span>');
                });
                $("#add-new-event").click(function(e) {
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var val = $("#new-event").val();
                    if (val.length == 0) {
                        return;
                    }

                    //Create events
                    var event = $("<div />");
                    event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                    event.html(val);
                    $('#external-events').prepend(event);

                    //Add draggable funtionality
                    ini_events(event);

                    //Remove event from text input
                    $("#new-event").val("");
                });
            });
        </script>

	</body>
</html>
