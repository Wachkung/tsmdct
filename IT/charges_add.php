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
                       บันทึกค่าใช้จ่ายอื่นๆ งาน IT
                        
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="charges_add.php">ค่าใช้จ่าย</a></li>
                        <li class="active">บันทึก</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable"> 
                       <form method="post" enctype="multipart/form-data"   action="charges_save.php" 
                                 name="frmMain" onSubmit="JavaScript:return fncSubmit();" >    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกค่าใช้จ่ายอื่นๆ งาน IT วันที่ <?=LongThaiDate($date)?></h3>
                                </div>
                                
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันที่ชำระ :
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservation"  name="dupdate"  />
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->
                                     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                รายละเอียด :
                                            </div>
                                            <textarea name="detail" cols="" rows="3" class="form-control"></textarea>
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                จำนวนเงิน :
                                            </div>
                                            <input type="text" class="form-control pull-right"   name="price" onKeyPress="CheckNum();"  placeholder="0" />
                                        </div><!-- /.input group -->
                                     </div><!-- /.form group -->

                                </div><!-- /.box-body -->
                                
                                <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success"><i class="fa fa-save"></i> บันทึกค่าใช้จ่าย</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">
                                     <i class="fa fa-reply"></i> กลับหน้าหลัก</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </form>    
                        <div class="box box-solid box-primary">
                                               <div class="box-header">
                                                   <i class="fa fa-calendar"></i></i>
                                                   <h3 class="box-title">ปฏิทินรายจ่าย</h3>
                                                   </div><!-- /.box-header -->
                                                    <div class="box-body">
                                                        <div id="calendar"></div> 
                                                    </div>  <!-- /box-body -->
                         </div> <!-- /panel panel-primary -->
                        </section><!-- /.Left col -->
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">รายการค่าใช้จ่ายทั้งหมด</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="10%">No.</th>
                                                <th width="20%">วันที่</th>
                                                <th width="50%">รายละเอียด</th>
                                                <th width="10%">ราคา</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM it_charges"; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$total=$total+$data['price'];	
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate($data['dupdate'])?></td>
                                                <td><?=$data['detail']?></td>
                                                <td><?=number_format($data['price'])?></td>
                                                <th><a href="charges_edit.php?id=<?=$data['id']?>" onclick="return confirm('แก้ไขหรือไม่');" >
                                                <i class="fa fa-edit"></i></a></th>
                                                <th><a href="charges_delete.php?id=<?=$data['id']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" >
                                                <i class="fa fa-trash-o"></i></a></th>
                                            
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
                                                <th colspan="2"><?=$bathtext1?></th>
                                                <th colspan="3"><?=number_format($total);?></th>
                                            </tr>
                                        </tfoot>
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
				if(document.frmMain.dupdate.value == "")
				{	alert(' ระบุวันที่ใช้ค่าใช้จ่าย ');	
							document.frmMain.dupdate.focus();
							return false; } 
							
				if(document.frmMain.detail.value == "")
				{	alert(' ระบุรายละเอียด ');	
							document.frmMain.detail.focus();
							return false; } 
							
				if(document.frmMain.price.value == "")
				{	alert(' จำนวนราคา ');	
							document.frmMain.price.focus();
							return false; } 
			}
			</script>
			
			<script language="javascript">
			function CheckNum(){
					if (event.keyCode < 48 || event.keyCode > 57){
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
