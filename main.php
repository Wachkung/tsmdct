<?php
session_start();
	include("./includes/conndb.php"); 
	include("./includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	$IDCARD1=$_SESSION["IDCARD"];
	//echo $IDCARD1 ; exit;
	if($IDCARD1 == " ")
	{   
		echo $IDCARD1 ; exit;

		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}

?>

<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="UTF-8">
        <title>ระบบจัดการ Data Center โรงพยาบาล</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="includes/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="includes/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="includes/bootstrap/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="includes/bootstrap/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="includes/bootstrap/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="includes/bootstrap/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="includes/bootstrap/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="includes/bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="includes/bootstrap/css/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="includes/bootstrap/css/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        <!-- DATA TABLES -->
        <link href="includes/bootstrap/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    </head>
	<?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
         				หน้าแรก
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">
                    <?php
                        if($_SESSION['IT'] <> "0")
                        {   
                    ?>                    
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h4>
               						ระบบเทคโนโลยีสารสนเทศ
                                    </h4>
                                    <p>
               						ศุนย์เทคโนยีสารสนเทศ
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-desktop"></i>
                                </div>
                                <a href="./IT/index.php" class="small-box-footer">
                                     More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['RISK'] <> "0")
                        {   
                    ?>                                           
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                            	
                                <div class="inner">
                                    <h4>
               						ระบบจัดการบริหารความเสี่ยง
                                    </h4>
                                    <p>
              						ศุนย์จัดการบริหารความเสี่ยง
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <a href="./RISK/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['NUTRITION'] <> "0")
                        {   
                    ?>                    
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                            	
                                <div class="inner">
                                    <h4>
               						ระบบจัดการงานโภชนาการ
                                    </h4>
                                    <p>
              						เจ้าหน้าที่โภชนากร
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <a href="./NUTRITION/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['LA'] <> "0")
                        {   
                    ?>                    
						<div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            	
                                <div class="inner">
                                    <h4>
              						ระบบลา&ความเสี่ยง
                                    </h4>
                                    <p>
              						บุคลากร<?php echo $namehosp; ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <a href="./LA/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['PERSON'] <> "0")
                        {   
                    ?>                    
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                            	
                                <div class="inner">
                                    <h4>
              						ระบบจัดการบริหารบุคลากร
                                    </h4>
                                    <p>
            						เจ้าหน้าที่บุคคลากร / หัวหน้าฝ่าย 
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </div>
                                <a href="./PERSON/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['ROOM'] <> "0")
                        {   
                    ?>                    
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                            	
                                <div class="inner">
                                    <h4>
               						ระบบจองห้องประชุม
                                    </h4>
                                    <p>
              						เจ้าหน้าโสตทัศนศึกษา
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bed"></i>
                                </div>
                                <a href="./ROOM/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['REPORT'] <> "0")
                        {   
                    ?>                    
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                            	
                                <div class="inner">
                                    <h4>
               						ระบบรายงาน HIWIN
                                    </h4>
                                    <p>
              						รายงานเกี่ยวผู้ป่วย
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <a href="./REPORT/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['LA'] <> "0")
                        {   
                    ?>                    
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                            	
                                <div class="inner">
                                    <h4>
               						ระบบ UPLOAD ไฟล์เอกสาร
                                    </h4>
                                    <p>
              						บุคลากร โรงพยาบาล
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <a href="./UPLOAD/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                        if($_SESSION['DURABLE'] <> "0")
                        {   
                    ?>                    
	                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h4>
               						ระบบ ครุภัณฑ์
                                    </h4>
                                    <p>
              						เจ้าหน้าที่ครุภัณฑ์ โรงพยาบาล
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <a href="./DURABLE/index.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    <?php
                        }
                    ?>                    
    
                    </div>
                </section><!-- /.content -->
				<!-- Main row -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานไฟล์อัพโหลด 20 อันดับล่าสุด </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="30%">ชื่อเอกสาร</th>
                                                <th width="20%">ฝ่าย/กลุ่มงาน</th>
                                                <th width="10%">ชื่อไฟล์อัพโหลด</th>
                                                <th width="10%">ประเภท</th>
                                                <th width="10%">วันที่อัพโหลด</th>
                                                <th width="5%"><i class="fa fa-download"></i></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
											$total=0; $no=1;
											$sql=" SELECT * FROM upload_file  order by dupdate DESC Limit 20 "; //where (file_depart = '$depart' or file_depart = '$quality')
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$file_depart=$data['file_depart'];
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=$data['file_title']?></td>
										<?php 
											$sqlfile_depart=" SELECT * FROM rm_depart where code = '$file_depart'"; 
											$resultfile_depart = mysql_query($sqlfile_depart); $datafile_depart = mysql_fetch_array($resultfile_depart)
										?>
                                                <td><?=$datafile_depart['depart']?></td>
                                                <td><?=$data['file_name']?></td>
                                                <td><?=$data['file_type']?></td>
                                                <td><?=LongThaiDate($data['dupdate'])?></td>
                                                <td><a href="./UPLOAD/file_download/<?=$data['file_name']?>"  target="_blank"><i class="fa fa-download"></i></a></td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->


                </section><!-- /.content -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable">  
                                    <div class="box box-solid box-primary">
                                               <div class="box-header">
                                                   <i class="fa fa-calendar"></i></i>
                                                   <h3 class="box-title">ปฏิทิน รายการประชุม ณ. <?php echo $namehosp; ?></h3>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div id="calendar"></div> 
                                                </div>  <!-- /box-body -->
                                      </div> <!-- /panel panel-primary -->
                             
                        </section><!-- /.Left col -->
                        
                        
                    </div><!-- /.row (main row) -->
            </aside><!-- /.right-side -->


        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <script src="includes/bootstrap/js/jquery.min.js"></script>
        <script src="includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <!-- DATA TABES SCRIPT -->
        <script src="includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
        
        <!-- date-range-picker -->
        <script src="includes/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="includes/bootstrap/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="includes/bootstrap/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script src="includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/bootstrap/js/lang/th.js"></script>
        <!-- fullCalendar -->
        <script src="includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/bootstrap/js/lang/th.js"></script>
        <!-- Page specific script -->
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
                    events: [
					
						
						
						<?php   //แสดงงานแผน
							$sql=" SELECT meeting_list.name,meeting_list.strtime,meeting_list.endtime,date(meeting_list.strdate) as strdate,date(meeting_list.enddate+1) as enddate,meeting_list.room FROM meeting_list "; 
							$result = mysql_query($sql); 
							while($data= mysql_fetch_array($result)) {
							$room3=$data['room'];

									$sqlroom=" SELECT * FROM meeting_room where id = '$room3'"; 
									$resultroom = mysql_query($sqlroom); 
									$dataroom = mysql_fetch_array($resultroom)
						?>
                        {
							
                            title: '<?=$data['name']?> ณ. <?=$dataroom['name']?> เวลา. <?=$data['strtime']?> ถึง <?=$data['endtime']?> ',
                            start: '<?=$data['strdate']?>',
                            end: '<?=$data['enddate']?>',
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
