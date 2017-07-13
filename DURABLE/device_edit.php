<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$device_code=$_GET['device_code'];
	$strSQL = "SELECT * FROM it_device WHERE device_code = '$device_code' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
    $dtype=$objResult['dtype'];
    $depart2=$objResult["depart"];

	$sqldepart=" SELECT * FROM rm_depart where CODE = '$depart2'"; 
	$resultdepart = mysql_query($sqldepart); 
    $datadepart = mysql_fetch_array($resultdepart);



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
                       แก้ไขอุปกรณ์ IT รหัส : <?=$objResult["device_code"];?> 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="device.php">อุปกรณ์ IT</a></li>
                        <li class="active">แก้ไข</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content"> 
                 	<div class="row"> 
                	<form method="post" enctype="multipart/form-data"   action="device_update.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >            
                       <section class="col-lg-5 connectedSortable">    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">คุณสมบัติ อุปกรณ์ IT อื่นๆ </h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                รหัสเครื่อง :
                                            </div>
                                            <input type="text" class="form-control" placeholder="7440-010-0001/1" name="device_code" value="<?=$objResult["device_code"];?>" readonly  />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                	 
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เลขครุภัณฑ์ :
                                            </div>
                                            <input type="text" class="form-control"  name="serial" 
                                            value="<?=$objResult["serial"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ประเภทอุปกรณ์ :
                                            </div>
                                            <select name="dtype" class="form-control">
												<?php
													$strSQLgroup = "SELECT * FROM durable WHERE durable_code = '$dtype'";
													$objQuerygroup = mysql_query($strSQLgroup);
													$objResultgroup = mysql_fetch_array($objQuerygroup);
												?>
                                              <option value="<?=$objResultgroup['durable_code']?>"><?=$objResultgroup['durable_code']?> : <?=$objResultgroup['durable_name']?> </option>
                                              <?php
													$sqldurable=" SELECT * FROM durable where durable_type_code='DT106' order by durable_code ASC "; 
													$resultdurable = mysql_query($sqldurable); while($datadurable = mysql_fetch_array($resultdurable)) {
											  ?>
                                              <option value="<?=$datadurable['durable_code']?>"><?=$datadurable['durable_code']?> : <?=$datadurable['durable_name']?> </option>
											  <?php  } ?>
                                              
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                IP Address :
                                            </div>
                                            <input type="text" class="form-control" placeholder="192.168.01.1"  name="ip" value="<?=$objResult["ip"];?>"/>
                                            <div class="input-group-addon">
                                                MAC :
                                            </div>
                                           	 <input type="text" class="form-control" name="mac" placeholder="00 : 00 : 00 : 00 : 00 : 00" value="<?=$objResult["mac"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
 
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ยี่ห้อ :
                                            </div>
                                            <input type="text" class="form-control" name="brand"   
                                            value="<?=$objResult["brand"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                รุ่น Model :
                                            </div>
                                            <input type="text" class="form-control" name="model"   
                                            value="<?=$objResult["model"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                S/N :
                                            </div>
                                            <input type="text" class="form-control"   name="serialkey" value="<?=$objResult["serialkey"];?>"  />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                คุณสมบัติ Spec :
                                            </div>
                                            <textarea name="spec" cols="" rows="5" class="form-control"><?=$objResult["spec"];?></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-7 connectedSortable"> 
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">รายละเอียดการจัดซื้อ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                	<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                วันที่ติดตั้ง :
                                            </div>
                                            <input type="text" class="form-control" placeholder="2001-01-01" id="date_install" name="date_install" value="<?=$objResult["date_install"];?>"/>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                	
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ผู้รับผิดชอบดูแล :
                                            </div>
                                            <select name="person" class="form-control" >
                                              <option value="<?=$objResult["person"];?>"><?=$objResult["person"];?></option>
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
                                                ของหน่วยงาน :
                                            </div>
                                            <select name="depart" class="form-control" >
                                              <option value="<?=$datadepart['CODE']?>">รหัสหน่วยงาน <?=$datadepart['CODE']?> | <?=$datadepart['depart']?> </option>  
                                              <?php
													$sqlperson=" SELECT * FROM	 rm_depart  order by CODE ASC "; 
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
                                                สถานะ :
                                            </div>
                                            <select name="status" class="form-control" >
                                              <option value="<?=$objResult["status"];?>"><?=$objResult["status"];?></option>
                                              <option value="ใช้งาน">ใช้งาน</option>
                                              <option value="เสีย ส่งซ่อม">เสีย ส่งซ่อม</option>
                                              <option value="เสีย ใช้งานไม่ได้">เสีย ใช้งานไม่ได้</option>
                                              <option value="แทงจำหน่าย">แทงจำหน่าย</option>
                                            </select>
                                            
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                	<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ราคา :
                                            </div>
                                            <input type="text" class="form-control pull-left"  name="price"    
                                             onKeyPress="CheckNum();"  placeholder="จำนวนเงิน" value="<?=$objResult["price"];?>" />
                                             <div class="input-group-addon">
                                                 วิธีการได้มา :
                                          	 </div>
                                             <select name="get"  class="form-control pull-right">
                                              <option value="<?=$objResult["get"];?>"><?=$objResult["get"];?></option>
                                              <option value="ตกลงราคา">ตกลงราคา</option>
                                              <option value="สอบราคา">สอบราคา</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                งบประมาณ :
                                            </div>
                                            <select name="budgets" class="form-control" >
                                              <option value="<?=$objResult["budgets"];?>"><?=$objResult["budgets"];?></option>
                                              <option value="งบประมาณจากเงินบำรุ่ง">งบประมาณจากเงินบำรุ่ง</option>
                                              <option value="งบประมาณจากงบลงทุน">งบประมาณจากงบลงทุน</option>
                                              <option value="งบประมาณจากโครงการ">งบประมาณจากโครงการ</option>
                                              <option value="เงินนอกงบประมาณ">เงินนอกงบประมาณ</option>
                                              <option value="ไม่ใช้เงิน">ไม่ใช้เงิน</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เลขที่หนังสือตรวจรับ :
                                            </div>
                                            <input type="text" class="form-control"   name="file_number" value="<?=$objResult["file_number"];?>"  />
                                        </div><!-- /.input group -->

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                 อัพโหลดรูป :
                                            </div>
                                            <input name="picture" type="file" class="form-control pull-right">
                                            <input type="hidden" class="form-control"   name="picture1"  value="<?=$objResult["picture"];?>" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                        
                                    </div><!-- /.form group -->
                                                                    
                                <div class="box-footer">
                                	<div class="form-group">
                                    <button name="btnSubmit" type="submit" class="btn btn-primary" 
                                    onclick="return confirm('ต้องการบันทึกการแก้ไขหรือไม่')">บันทึกแก้ไขครุภัณฑ์</button> 
                                    <a class="btn btn-warning"  href="device_delete.php?device_code=<?=$objResult["device_code"];?>&picture=<?=$objResult["picture"];?>"
                                     onclick="return confirm('ต้องการลบ ครุภัณฑ์ หรือไม่')" >ลบครุภัณฑ์</a>
                                    <button type="button" class="btn btn-danger" 
                                    onclick="window.location.href='device_detail.php?device_code=<?=$device_code?>'">
                                         ยกเลิก</button>	
                                    </div><!-- /.form group -->
                                </div><!-- /.box-footer -->
                            </div><!-- /box box-solid box-primary -->
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
		
		<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/smoothness/jquery-ui-1.7.2.custom.css">
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script language="javascript">
			function fncSubmit() {
				if(document.frmMain.dtype.value == "")
				{	alert(' เลือกประเภทอุปกรณ์ ');	
							document.frmMain.dtype.focus();
							return false; } 

				if(document.frmMain.brand.value == "")
				{	alert(' เลือกยี่ห้อ ');	
							document.frmMain.brand.focus();
							return false; } 
							
				if(document.frmMain.model.value == "")
				{	alert(' ใส่รุ่นของอุปกรณ์ ');	
							document.frmMain.model.focus();
							return false; } 
							
				if(document.frmMain.spec.value == "")
				{	alert(' ใส่รายละเอียดของอุปกรณ์ ');	
							document.frmMain.spec.focus();
							return false; } 			
							
				if(document.frmMain.date_install.value == "")
				{	alert(' ใส่วันที่ติดตั้ง ');	
							document.frmMain.date_install.focus();
							return false; } 
							
				if(document.frmMain.price.value == "")
				{	alert(' ราคา ');	
							document.frmMain.price.focus();
							return false; } 
				
				if(document.frmMain.get.value == "")
				{	alert(' วิธีการได้มา ');	
							document.frmMain.get.focus();
							return false; } 
				
				if(document.frmMain.status.value == "")
				{	alert(' สถานะ ');	
							document.frmMain.status.focus();
							return false; } 
				
				if(document.frmMain.get.value == "")
				{	alert(' วิธีการได้มา ');	
							document.frmMain.get.focus();
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
    			$("#date_install").datepicker({dateFormat: 'yy-mm-dd'});
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
