<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 

	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}

	$strSQLuser = "SELECT * FROM user_datacenter WHERE idcard = '$IDCARD1' ";
	$objQueryuser = mysql_query($strSQLuser);
	$objResultuser = mysql_fetch_array($objQueryuser);
	$admin=$objResultuser["ADMIN"];

	$idcard=$_GET['idcard'];
	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$position=$objResult["position"];
	$depart=$objResult["depart"];
	$personla=$objResult["personla"];
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
                       เลขที่บัตรประชาชน : <?=$objResult["idcard"];?>  
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li class="active">แก้ไขรายการ</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content"> 
                 	<div class="row"> 
                	<form method="post" enctype="multipart/form-data"   action="person_update.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >            
                       <section class="col-lg-5 connectedSortable">    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกเจ้าหน้าที่ </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                รหัสบัตรประชาชน :
                                            </div>
                                            <input type="text" class="form-control" name="idcard" value="<?=$objResult["idcard"];?> " readonly  />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                	 
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                คำนำหน้าชื้อ :
                                            </div>
                                          <select name="title" class="form-control">
											  <option value="<?=$objResult["title"];?>"><?=$objResult["title"];?></option>
                                              <option value="นาย">นาย</option>
                                              <option value="นางสาว">นางสาว</option>
                                              <option value="นาง">นาง</option>
                                              <option value="ว่าที่ ร้อยตรี">ว่าที่ ร้อยตรี</option>
                                              <option value="ว่าที่ ร้อยตรี หญิ่ง">ว่าที่ ร้อยตรี หญิง</option>
                                            </select>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ชื่อ :
                                            </div>
                                            <input type="text" class="form-control"  name="name"  
                                            value="<?=$objResult["name"];?>"  />
                                             <div class="input-group-addon">
                                                 สกุล :
                                          	 </div>
                                           	 <input type="text" class="form-control" name="lastname"
                                              value="<?=$objResult["lastname"];?>" />  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เพศ :
                                            </div>
                                            <select name="sex" class="form-control">
                                              <option value="<?=$objResult["sex"];?>"><?=$objResult["sex"];?></option>
                                              <option value="ชาย">ชาย</option>
                                              <option value="หญิง">หญิง</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									 <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ที่อยู่ :
                                            </div>
                                           	 <input type="text" class="form-control" name="addr" value="<?=$objResult["addr"];?>" />  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เบอร์โทร :
                                            </div>
                                            <input type="text" class="form-control"   name="tell" value="<?=$objResult["tell"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                E-Mail :
                                            </div>
                                            <input type="text" class="form-control"   name="email" value="<?=$objResult["email"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ตำแหน่ง :
                                            </div>
												<select name="position" class="form-control" >
                                               <?php  	
												 $sqlposition1=" SELECT * FROM position  where PosId = '$position'"; 
												 $resultposition1 = mysql_query($sqlposition1); $dataposition1 = mysql_fetch_array($resultposition1)
											  ?>
												<option value="<?=$dataposition1["PosId"];?>"><?=$dataposition1['PosName']?></option>
                                               <?php  	
												 $sqlposition=" SELECT * FROM position  order by PosName ASC "; 
												 $resultposition = mysql_query($sqlposition); while($dataposition = mysql_fetch_array($resultposition)) {
											  ?>
												<option value="<?=$dataposition['PosId']?>"><?=$dataposition['PosName'];?></option>
											  <?php } ?>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                               วันเกิด :
                                            </div>
                                            <input type="text" class="form-control" name="bdate" value="<?=$objResult["bdate"];?>"    />
                                            <div class="input-group-addon">
                                                วันที่เข้าทำงาน :
                                            </div>
                                            <input type="text" class="form-control" name="workdate" value="<?=$objResult["workdate"];?>"   /> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ฝ่าย/กลุ่มงาน :
                                            </div>
											 <select name="depart" class="form-control" >
                                              <?php  
													$sqlperson1=" SELECT * FROM risk2_departreport  where CODE = '$depart'"; 
													$resultperson1 = mysql_query($sqlperson1); $dataperson1 = mysql_fetch_array($resultperson1)
											  ?>
                                              <option value="<?=$dataperson1["CODE"];?>">รหัสหน่วยงาน <?=$dataperson1['CODE']?> | <?=$dataperson1['DeptName']?></option>
											  <?php
													$sqlperson=" SELECT * FROM risk2_departreport where STATUS='0' order by DeptName ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['CODE']?>">รหัสหน่วยงาน <?=$dataperson['CODE']?> | <?=$dataperson['DeptName']?> </option>  
											  <?php } ?>
                                            </select>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                 ประเภทตำแหน่ง :
                                          	 </div>
                                            <select name="typetext" class="form-control">
                                              <option value="<?=$objResult["typetext"];?>"><?=$objResult["typetext"];?></option>
                                              <option value="ข้าราชการ">ข้าราชการ</option>
                                              <option value="ลูกจ้างประจำ">ลูกจ้างประจำ</option>
                                              <option value="พนักงานราชการ">พนักงานราชการ</option>
                                              <option value="พนักงานกระทรวงสาธารณสุข">พนักงานกระทรวงสาธารณสุข</option>
                                              <option value="ลูกจ้างชั่วคราว">ลูกจ้างชั่วคราว</option>
                                            </select>
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันลาพักผ่อน :
                                            </div>
                                            <input type="text" class="form-control"   name="lasasom" value="<?=$objResult["lasasom"];?>"   />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                สังกัด :
                                            </div>
                                            <select name="personla" class="form-control" >
											  <?php
													$sqlperson1=" SELECT * FROM	 person  where idcard = '$personla' "; 
													$resultperson1 = mysql_query($sqlperson1); $dataperson1 = mysql_fetch_array($resultperson1)
											  ?>
                                              <option value="<?=$dataperson1["idcard"];?>"><?=$dataperson1["idcard"];?> || <?=$dataperson1['name']?>  <?=$dataperson1['lastname']?> </option>
                                              <option value="">--- ย้ายสถานบริการ / ลาแแกจากสถานบริการ ------</option>
                                              <?php
													$sqlperson=" SELECT * FROM	 person  order by name ASC "; 
													$resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['idcard']?>"><?=$dataperson['idcard']?> || <?=$dataperson['name']?>  <?=$dataperson['lastname']?> </option>
											  <?php } ?>
                                            </select>  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                                    <div class="box-footer">
                                	<div class="form-group">
                                   	<button  type="submit" class="btn btn-success" onclick="return confirm('ต้องการบันทึกการแก้ไขหรือไม่')"><i class="fa fa-save"></i> บันทึกการแก้ไข</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='person_report.php'"><i class="fa fa-reply"></i> กลับหน้าแรก</button>	
                                 </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายชื้อเจ้าหน้าที่</h3>
                                </div><!-- /.box-header -->

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-สกุล</th>
                                                <th>ตำแหน่ง</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										if($admin<> "1") {   
												$sql=" SELECT * FROM	 person where personla='$IDCARD1' order by id ASC "; 
                        						$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
												$position2=$data['position'];
										?>
                                            <tr>
                                                <td><a  href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['name']?>  <?=$data['lastname']?>"><?=$data['name']?>  <?=$data['lastname']?></a></td>
										<?php  	
												 $sqlposition2=" SELECT * FROM position  where PosId = '$position2'"; 
												 $resultposition2 = mysql_query($sqlposition2); $dataposition2 = mysql_fetch_array($resultposition2)
										?>
                                                <td><?=$dataposition2['PosName']?></td>
                                                <td><a href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['name']?>  <?=$data['lastname']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                            </tr>
                                        <?php } 
											}else{
												$sql=" SELECT * FROM	 person  order by name ASC "; 
                        						$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
												$position2=$data['position'];
										?>
                                            <tr>
                                                <td><a  href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['name']?>  <?=$data['lastname']?>"><?=$data['name']?>  <?=$data['lastname']?></a></td>
										<?php  	
												 $sqlposition2=" SELECT * FROM position  where PosId = '$position2'"; 
												 $resultposition2 = mysql_query($sqlposition2); $dataposition2 = mysql_fetch_array($resultposition2)
										?>
                                                <td><?=$dataposition2['PosName']?></td>
                                                <td><a href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['name']?>  <?=$data['lastname']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                            </tr>
										<?php
												}
											}
										?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ชื่อ-สกุล</th>
                                                <th>ตำแหน่ง</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
							</div><!-- /.box -->
                            </section><!-- /.Left col -->
                    </form>        
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
				if(document.frmMain.idcard.value == "")
				{	alert(' ใส่ รหัสบัตรประชาชน ');	
							document.frmMain.idcard.focus();
							return false; } 
							
				if(document.frmMain.title.value == "")
				{	alert(' ใส่ คำนำหน้าชื่อ ');	
							document.frmMain.title.focus();
							return false; } 
							
				if(document.frmMain.name.value == "")
				{	alert(' ใส่ ชื้อ ');	
							document.frmMain.name.focus();
							return false; } 
				
				if(document.frmMain.lastname.value == "")
				{	alert('  ใส่ สกุล ');	
							document.frmMain.lastname.focus();
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
