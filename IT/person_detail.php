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

    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกวันลา</a></li>
                        <li class="active"><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกวันลา</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="save_la.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"> จำนวนวันลาพักผ่อน</i>
                                            </div>
                                           	<input type="text" class="form-control pull-right"  name="lasasom" value="<?=$objResult["lasasom"];?>"  />
                                            <div class="input-group-addon">
                                                <i class="fa"><a href="add_lasasom.php?idcard=<?=$objResult["idcard"];?>" target="_parent">แก้ไข</a></i>
                                            </div>                                            
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> เลือกวันที่</i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservationtime" name="la_date"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-suitcase"> ประเภทการลา</i>
                                            </div>
                                           	<select class="form-control"  name="latype">
                                            	<option value="">----- เลือกประเภทการลา -----</option>
                                                <option value="1">1. ป่วย</option>
                                                <option value="2">2. กิจ</option>
                                                <option value="3">3. พักผ่อน</option>
                                                <option value="4">4. คลอด/เลี้ยงดูบุตร</option>
                                            </select> 
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> จำนวนวันลา</i>
                                            </div>
                                           	<input name="dsum" type="text" class="form-control" onKeyPress="CheckNum()" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                    	<input name="idcard" type="hidden" class="form-control"  value="<?=$idcard?>">
                                        <button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกวันลา</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                    <p> ชื่อ <code><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></code>
                                     เลขบัตรประชาชน <code><?=$objResult["idcard"];?></code></p>
                                    <p> เริ่มทำงานวันที่ <code><?=LongThaiDate($objResult["workdate"])?></code></p>
                                    <table class="table table-bordered" align="center">
                                        <tr>
                                            <td align="center"><h4>ลาป่วย</h4></td>
                                            <td align="center"><h4>ลากิจ</h4></td>
                                            <td align="center"><h4>ลาพักผ่อน</h4></td>
                                            <td align="center"><h4>ลาคลอด</h4></td>
                                        </tr>
                                        <tr>
                                        	<?php 
												//จำนวน ลากิจ
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' 
												and latype='1' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
											?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                            <?php 
												//จำนวน ลาป่วย
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' 
												and latype='2' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
											?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                            <?php 
												//จำนวน ลาพักผ่อน
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' 
												and latype='3' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
											?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                            <?php 
												//จำนวน ลาคลอด
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' 
												and latype='4' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
											?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                        </tr>
                                    </table>
                                </div> <!-- /.box-footer -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">ประวัติการลา</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>วันที่</th>
                                                <th>ประเภทการลา</th>
                                                <th>จำนวนวัน</th>  
                                                <th><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$sql=" SELECT * FROM	 la where idcard='$idcard'  order by sdate DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$latype=$data['latype'];
											if ($latype == 1) { $text1="ลาป่วย";}
											if ($latype == 2) { $text1="ลากิจ";}
											if ($latype == 3) { $text1="ลาพักผ่อน";}
											if ($latype == 4) { $text1="ลาคลอด/เลี้ยงดูบุตร";}
										?>
                                            <tr>
                                                <td><?=LongThaiDate($data['sdate'])?>-<?=LongThaiDate($data['edate'])?></td>
                                                <td><?=$text1?>
                                                </td>
                                                <td><?=$data['dsum']?></td>
                                                <th><a href="delete_la.php?id=<?=$data['id']?>&latype=<?=$data['latype']?>&dsum=<?=$data['dsum']?>&card=<?=$data['idcard']?>&lasasom=<?=$objResult['lasasom']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
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
		function validate() {
		if(document.frmMain.la_date.value == "")
		{	alert('เลือกวันที่ลา');	
					document.frmMain.la_date.focus();
					return false;
		} 

		if(document.frmMain.latype.value == "")
		{	alert(' เลือกประเภทการลา ');	
					document.frmMain.latype.focus();
					return false;
		} 

		if(document.frmMain.dsum.value == "")
		{	alert(' ใส่จำนวนวันลา ');	
					document.frmMain.dsum.focus();
					return false;
		} 	
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
