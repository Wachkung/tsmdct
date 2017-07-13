<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$id=$_GET['id']; 
	$strSQL = "SELECT * FROM risk2_risk WHERE id = '$id'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	$codegroup1=$objResult["codegroup"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    <script>

function validate() {
if(document.frmMain.codegroup.value == "")
{	alert('ใส่ รหัสด้านโปรแกรมความเสี่ยง');	
			document.frmMain.la_date.focus();
			return false;
} 
if(document.frmMain.namegroup.value == "")
{	alert(' ใส่ ชื่อด้านโปแกรมความเสี่ยง ');	
			document.frmMain.latype.focus();
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
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
				    <h1>
                        ระบบจัดการความเสี่ยง 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกบัญชีความเสี่ยง</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกบัญชีความเสี่ยง</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="grouprisk_update.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                โปรแกรมด้านความเสี่ยง :</i>
                                            </div>
											<span id="codegroup">
												<select class="form-control" name="codegroup">
												<?php
													$strSQLgroup = "SELECT * FROM risk2_group WHERE codegroup = '$codegroup1'";
													$objQuerygroup = mysql_query($strSQLgroup);
													$objResultgroup = mysql_fetch_array($objQuerygroup);
												?>
													<option value="<?=$objResultgroup[codegroup];?>"><?=$objResultgroup[codegroup];?>:<?=$objResultgroup["namegroup"];?></option>
												<?php
														$sql="select codegroup, namegroup from risk2_group order by codegroup ";
														$dbquery = mysql_db_query($db, $sql);
														$num_rows = mysql_num_rows($dbquery);
														$i=0;
														while ($i < $num_rows)
															{
																$result = mysql_fetch_array($dbquery);
																$codegroup = $result[0];
																$namegroup = $result[1];

																echo"<option value='$codegroup'>$codegroup:$namegroup</option>";

																$i++;
															}
												?>
												</select>
											</span>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> รหัสบัญชีความเสี่ยง</i>
                                            </div>
                                           	<input name="coderisk" type="text" class="form-control" value="<?=$objResult["coderisk"];?>">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> เนื้อหาบัญชีความเสี่ยง</i>
                                            </div>
											<textarea name="namerisk" cols="47" rows="3" class="form-control" id="namerisk"><?=$objResult["namerisk"];?></textarea>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
									    <input name="id" type="hidden" class="form-control"  value="<?=$objResult["id"];?>">
										<button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกบัญชีความเสี่ยง</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานบัญชีความเสี่ยง</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รหัสบัญชี</th>
                                                <th>เนื้อหาบัญชีความเสี่ยง</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$sql=" SELECT * FROM risk2_risk  order by coderisk DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                                <td><?=$data['coderisk']?> </td>
                                                <td><?=$data['namerisk']?></td>
                                                <td><a href="grouprisk_edit.php?id=<?=$data['id']?>&codrisk=<?=$data['coderisk']?>&namerisk=<?=$data['namerisk']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                                <th><a href="grouprisk_delete.php?id=<?=$data['id']?>&coderisk=<?=$data['coderisk']?>&namerisk=<?=$data['namerisk']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
                                            
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
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY-MM-DD H:mm:ss'});
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
