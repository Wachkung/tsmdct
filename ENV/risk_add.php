<?php
session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
		
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['ENV'] <> "1")
	{   
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
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>

		<style type="text/css">
			.ui-datepicker{
				width:150px;
				font-family:tahoma;
				font-size:11px;
				text-align:center;
			}
		</style>
</head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ระบบความเสี่ยง 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกความเสี่ยง</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-10 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกความเสี่ยง</h3>
                                </div>
                                
                                <div class="box-body"  style="margin:auto;width:90%;">
                                	<!-- Date and time range -->
                                    <form action="risk_save.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ผู้ประสบปัญหา :</i>
                                            </div>
											  <select name="name" class="form-control" >
                                              <option value="">--- เลือกผู้ประสบปัญหา------</option>
                                              <?php 
												  $sqlperson=" SELECT * FROM	 person where personla != '' order by name ASC "; 
												  $resultperson = mysql_query($sqlperson); while($dataperson = mysql_fetch_array($resultperson)) {
											  ?>
                                              <option value="<?=$dataperson['idcard']?>"> <?=$dataperson['idcard']?> || <?=$dataperson['name']?>  
											  <?=$dataperson['lastname']?> </option>
											  
											  <?php } ?>
                                            </select>  
                                            <div class="input-group-addon">
                                                HN :</i>
                                            </div>
                                           	<input type="text" class="form-control pull-right"  name="hnno"  />
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon">
                                                วันที่ประสบปัญหา :
                                            </div>
                                            <input type="text" class="form-control" id="daterigter" name="daterigter"/> 
											<div class="input-group-addon"> 
												เวลาประสบปัญหา :</i>
                                            </div>
                                           	<input type="text" class="form-control pull-right"name="timer"  />
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                หน่วยงานที่รายงาน :</i>
                                            </div>
											 <select class="form-control"  name="departreport">
												<option value="">- เลือก หน่วยงานที่รายงาน -</option>
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

                                            <div class="input-group-addon">
                                                หน่วยงานที่รับผิดชอบ :</i>
                                            </div>
                                           	<select class="form-control"  name="departrespon">
												<option value="">- เลือก หน่วยงานที่รับผิดชอบ -</option>

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
                                                โปรแกรมด้านความเสี่ยง :</i>
                                            </div>
												<select class="form-control" id="fromevent" name="fromevent">
													<option value="">- เลือก โปรแกรมด้านความเสี่ยง -</option>
												<?php
														$sqlgroup="select codegroup, namegroup from risk2_group order by codegroup";
														$dbquerygroup = mysql_db_query($db, $sqlgroup);
														$num_rowsgroup = mysql_num_rows($dbquerygroup);
														$i=0;
														while ($i < $num_rowsgroup)
															{
																$resultgroup = mysql_fetch_array($dbquerygroup);
																echo"<option value='$resultgroup[codegroup]'>$resultgroup[codegroup].$resultgroup[namegroup]</option>";
																$i++;
															}
												?>
												</select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon">
                                                รูปแบบของเหตุการณ์ที่เกิดขึ้น :</i>
                                            </div>
												<select class="form-control" id="dataevent" name="dataevent">
													<option value="">- เลือก รูปแบบของเหตุการณ์ -</option>
												</select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ระดับความรุนแรงทางคลินิก :</i>
                                            </div>
                                           	<select class="form-control" id="commen" name="commen">
											  <option value="">- เลือก ระดับความรุนแรงด้านคลินิก -</option>  
											</select> 

                                            <div class="input-group-addon">
                                                ระดับความรุนแรงทั่วไป :</i>
                                            </div>
                                           	<select class="form-control" id="typereport" name="typereport">
											  <option value="">- เลือก ระดับความรุนแรงด้านทั่วไป -</option>  
											</select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                รูปแบบของการวิเคราะห์และการอธิบาย :</i>
                                            </div>
											<textarea name="notepatient" cols="47" rows="3" class="form-control" id="notepatient"></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ความเห็น หัวหน้างาน/ฝ่าย :</i>
                                            </div>
											<textarea name="notehead" cols="47" rows="3" class="form-control" id="notehead"></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วิเคราะห์สาเหตุและแนวทางแก้ไข :</i>
                                            </div>
											<textarea name="noteceo" cols="47" rows="3" class="form-control" id="noteceo"disabled="disabled"></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                หมายเหตุ :</i>
                                            </div>
											<textarea name="notedepart" cols="47" rows="3" class="form-control" id="notedepart"></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                    	<input name="idcard" type="hidden" class="form-control"  value="<?=$idcard1?>">
                                        <button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกความเสี่ยง</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                    </form>	
                                </div> <!-- /.box-footer -->
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
        
		<!-- AdminLTE for demo purposes  -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script src="../includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>
       
		<!-- fullCalendar -->
        <script src="../includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>

		<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/smoothness/jquery-ui-1.7.2.custom.css">
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript">
		$(function(){
			// แทรกโค้ต jquery
			$("#daterigter").datepicker({dateFormat: 'yy-mm-dd'});
			// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16

		});
		</script>

		<script type="text/javascript">
		function validate() {
			
		if(document.frmMain.name.value == "")
		{	alert('เลือกผู้ประสบปัญหา');	
					document.frmMain.name.focus();
					return false;
		} 
		if(document.frmMain.commen.value == document.frmMain.typereport.value)
		{	alert('เลือกระดับความรุนแรง');	
					document.frmMain.commen.focus();
					document.frmMain.typereport.focus();
					return false;
		} 

		if(document.frmMain.daterigter.value == "")
		{	alert(' ใสวันที่ประสบปัญหา ');	
					document.frmMain.daterigter.focus();
					return false;
		} 

		if(document.frmMain.departreport.value == "")
		{	alert(' เลือกหน่วยงานที่รายงาน ');	
					document.frmMain.departreport.focus();
					return false;
		} 	

		if(document.frmMain.departrespon.value == "")
		{	alert(' เลือกหน่วยงานที่รับผิดชอบ ');	
					document.frmMain.departreport.focus();
					return false;
		} 	

		if(document.frmMain.fromevent.value == "")
		{	alert(' เลือกโปรแกรมความเสี่ยง ');	
					document.frmMain.fromevent.focus();
					return false;
		} 	

		if(document.frmMain.dataevent.value == "")
		{	alert(' เลือกรูปแบบเหตุการ ');	
					document.frmMain.dataevent.focus();
					return false;
		} 	

		if(document.frmMain.notepatient.value == "")
		{	alert(' ลงรูปแบบวิเคราะห์และการอธิบาย  ');	
					document.frmMain.notepatient.focus();
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

		<script type="text/javascript">  
		$(function(){  
			  
			// เมื่อเปลี่ยนค่าของ select id เท่ากับ list1  
			 $("select#fromevent").change(function(){    
				 // ส่งค่า ตัวแปร list1 มีค่าเท่ากับค่าที่เลือก ส่งแบบ get ไปที่ไฟล์ data_for_list2.php  
				 $.get("data_for_list2.php",{  
					 fromevent:$(this).val()  
				 },function(data){ // คืนค่ากลับมา  
						$("select#dataevent").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2  
				 });  
				 $.get("data_for_list3.php",{  
					 fromevent:$(this).val()  
				 },function(data){ // คืนค่ากลับมา  
						$("select#commen").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2  
				 });  
				 $.get("data_for_list4.php",{  
					 fromevent:$(this).val()  
				 },function(data){ // คืนค่ากลับมา  
						$("select#typereport").html(data);  // นำค่าที่ได้ไปใส่ใน select id เท่ากับ list2  
				 });  

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
