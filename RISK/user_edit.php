<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$date=date("Y-m-d");
	$id=$_GET['id'];
	$strSQL = "SELECT * FROM user_datacenter WHERE id = '$id' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$IDCARD=$objResult["IDCARD"];
	$DEPART1=$objResult["DEPART"];

	$strSQL1 = "SELECT * FROM person  WHERE idcard = '$IDCARD' ";
	$objQuery1 = mysql_query($strSQL1);
	$objResult1 = mysql_fetch_array($objQuery1);

	$strSQLDEPART1 = "SELECT * FROM rm_depart  WHERE CODE = '$DEPART1' ";
	$objQueryDEPART1 = mysql_query($strSQLDEPART1);
	$objResultDEPART1 = mysql_fetch_array($objQueryDEPART1);
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
                       แก้ไขบันทึกสิทธิการเข้าถึงข้อมูล
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="service_add.php">ให้บริการ</a></li>
                        <li class="active">แก้ไข</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable"> 
                       <form method="post" enctype="multipart/form-data"   action="user_update.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ฟอร์มแก้ไขการให้บริการ วันที่ <?=LongThaiDate($todays)?></h3>
                                </div>
                                <div class="box-body">
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อผู้แจ้ง :
                                            </div>
                                            <select name="IDCARD" class="form-control" >
                                              <option value="<?=$objResult1["idcard"];?>"><?=$objResult1["idcard"];?> || <?=$objResult1['name']?>  
											  <?=$objResult1['lastname']?> </option>
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
                                            <select name="DEPART" class="form-control" >
                                              <option value="<?=$objResultDEPART1["CODE"];?>">รหัสหน่วยงาน <?=$objResultDEPART1['CODE']?> | <?=$objResultDEPART1['depart']?></option>
                                              <?php
													$sqlperson=" SELECT * FROM rm_depart  order by CODE ASC "; 
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
												<input type="checkbox" name="RISK" id="RISK" value="1"<?php if ($objResult['RISK'] == 1) {echo 'checked';}?> > : RISK
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="PCT" id="PCT" value="1" <?php if ($objResult['PCT'] == 1) {echo 'checked';}?> > : PCT
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="PTC" id="PTC" value="1" <?php if ($objResult['PTC'] == 1) {echo 'checked';}?> > : PTC
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="IC" id="IC" value="1" <?php if ($objResult['IC'] == 1) {echo 'checked';}?> > : IC
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="IM" id="IM" value="1" <?php if ($objResult['IM'] == 1) {echo 'checked';}?> > : IM
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="ENV" id="ENV" value="1" <?php if ($objResult['ENV'] == 1) {echo 'checked';}?> > : ENV
											  </label>
											  <label class="form-control">
												<input type="checkbox" name="HRD" id="HRD" value="1" <?php if ($objResult['HRD'] == 1) {echo 'checked';}?> > : HRD
											  </label>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<div class="form-group">
									<input name="id" type="hidden" class="form-control"  value="<?=$id?>">
                                   	<button  type="submit" class="btn btn-success" onclick="return confirm('ต้องการบันทึกการแก้ไขหรือไม่')">
                                    <i class="fa fa-save"></i> บันทึกการแก้ไขการให้บริการ IT</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='report_user.php'">
                                     <i class="fa fa-reply-all"></i>ย้อนกลับ</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>    
                        </section><!-- /.Left col -->
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
