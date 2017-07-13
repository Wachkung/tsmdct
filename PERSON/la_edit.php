<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['PERSON'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	
	$idcard=$_GET['idcard'];
	$id=$_GET['id'];
	$latype=$_GET['latype'];
	$dsum=$_GET['dsum'];
	$lasasom=$_GET['lasasom'];

	$strSQL = "SELECT * FROM person WHERE idcard = '$idcard' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	$lasasom=$objResult['lasasom'];

	$strSQLla = "SELECT * FROM la WHERE idcard = '$idcard' and id=$id ";
	$objQueryla = mysql_query($strSQLla);
	$objResultla = mysql_fetch_array($objQueryla);
	$dsum=$objResultla['dsum'];
if ($latype == 'ลาพักผ่อน') {

				$total_lasasom=$lasasom+$dsum ;
}else {
    $total_lasasom=$lasasom;
}
	$eng_date=time(); // แสดงวันที่ปัจจุบัน  
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
                                    <form action="update_la.php" method="post" enctype="multipart/form-data" name="frmMain" 
                                    onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"> วันลาพักผ่อนคงเหลือ</i>
                                            </div>
                                           	<input type="text" class="form-control pull-right"  name="lasasom" value="<?=$total_lasasom?>" readonly />
                                            
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
                                            <input type="text" class="form-control pull-right" id="reservation" name="la_date"   value="<?=$objResultla["sdate"];?> - <?=$objResultla["edate"];?>" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-suitcase"> ประเภทการลา</i>
                                            </div>
                                           	<select class="form-control"  name="latype"  >
                                            		<option value="<?=$objResultla["latype"];?>"><?=$objResultla["latype"];?></option>
                                            		<option value="">----- เลือกประเภทการลา -----</option>
                                                <option value="ลาป่วย">1. ลาป่วย</option>
                                                <option value="ลากิจ">2. ลากิจ</option>
                                                <option value="ลาพักผ่อน">3. ลาพักผ่อน</option>
                                                <option value="ลาคลอด/เลี้ยงดูบุตร">4. ลาคลอด/เลี้ยงดูบุตร</option>
                                            </select> 
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> จำนวนวันลา</i>
                                            </div>
                                           	<input name="dsum" type="text" class="form-control"  value="<?=$objResultla["dsum"];?>" onKeyPress="CheckNum()" >
                                            
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> เนื่องจาก</i>
                                            </div>
                                           	<input name="ladetail" type="text" class="form-control"   value="<?=$objResultla["ladetail"];?>">
                                        </div><!-- /.input group -->
									</div><!-- /.form group -->
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-o"> ผู้ปฏิบัติงานแทน</i>
											</div>
											<input name="laname" type="text" class="form-control"   value="<?=$objResultla["laname"];?>" >
										</div><!-- /.input group -->
                                    </div><!-- /.form group -->

                                    <div class="form-group">
                                     	<input name="id" type="hidden" class="form-control"  value="<?=$id?>">
	                                   	<input name="idcard" type="hidden" class="form-control"  value="<?=$idcard?>">
                                        <button name="btnSubmit" type="submit" class="btn btn-primary">แก้ไขวันลา</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='la_detail.php?idcard=<?=$idcard?>'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <p> ชื่อ <code><?=$objResult["title"];?><?=$objResult["name"];?>  <?=$objResult["lastname"];?></cod  เลขบัตรประชาชน <code><?=$objResult["idcard"];?></code></p>
                                    <p> เริ่มทำงานวันที่ <code><?=LongThaiDate($objResult["workdate"])?></code></p>
                                    <table class="table table-bordered" align="center">
                                        <tr>
                                            <td align="center"><h4>ลาป่วย</h4></td>
                                            <td align="center"><h4>ลากิจ</h4></td>
                                            <td align="center"><h4>ลาพักผ่อน</h4></td>
                                            <td align="center"><h4>ลาคลอด/เลี้ยงดูบุตร</h4></td>
                                        </tr>
                                        <tr>
                                        <?php
											//จำนวน ลากิจ
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' and latype='ลาป่วย'  and sdate BETWEEN '".$strdate."'and '".$enddate."' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
										?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                        <?php
											//จำนวน ลาป่วย
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' and latype='ลากิจ'  and sdate BETWEEN '".$strdate."'and '".$enddate."' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
										?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                        <?php
											//จำนวน ลาพักผ่อน
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' and latype='ลาพักผ่อน'  and sdate BETWEEN '".$strdate."'and '".$enddate."' ";
												$objQuery1 = mysql_query($strSQL1);
												$objResult1 = mysql_fetch_array($objQuery1);
												$la_day=$objResult1['dsum_totle'];
										?>
                                            <td align="center"><h3><strong><? if ($la_day == '') { echo "0"; } else { echo "$la_day";} ?></strong></h3></td>
                                        <?php 
											//จำนวน ลาคลอด
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle FROM la where idcard='$idcard' and latype='ลาคลอด/เลี้ยงดูบุตร'  and sdate BETWEEN '".$strdate."'and '".$enddate."' ";
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
                                                <th width="3%">No.</th>
                                                <th width="30%">วันที่</th>
                                                <th width="10%">ประเภท</th>
                                                <th width="4%">วัน</th>  
                                                <th width="4%"><i class="fa fa-edit"></i></th>
                                                <th width="4%"><i class="fa fa-trash-o"></i></th>
                                                <th width="4%"><i class="fa fa-print"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
											$total=0; $no=1;
											$sql=" SELECT * FROM la where idcard='$idcard' AND sdate BETWEEN '".$strdate."'and '".$enddate."'  order by sdate DESC "; 
											$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate(substr($data['sdate'],0,10))?>-<?=LongThaiDate(substr($data['edate'],0,10))?></td>
                                                <td><?=$data['latype']?> </td>
                                                <td><?=$data['dsum']?></td>
                                                <td><a href="la_edit.php?id=<?=$data['id']?>&latype=<?=$data['latype']?>&dsum=<?=$data['dsum']?>&idcard=<?=$data['idcard']?>&lasasom=<?=$objResult['lasasom']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                                <th><a href="delete_la.php?id=<?=$data['id']?>&latype=<?=$data['latype']?>&dsum=<?=$data['dsum']?>&idcard=<?=$data['idcard']?>&lasasom=<?=$objResult['lasasom']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><span class="label label-primary"><i class="fa fa-trash-o"></i></span></a></th>
                                                 <th><a href="report_la.php?id=<?=$data['id']?>&latype=<?=$data['latype']?>&dsum=<?=$data['dsum']?>&idcard=<?=$data['idcard']?>&lasasom=<?=$objResult['lasasom']?>" onclick="return confirm('พิมพ์ข้อมูลหรือไม่');" ><span class="label label-primary"><i class="fa fa-print"></i></span></a></th>
                                            </tr>
                                        <?php  $no++; } ?>
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

		<script type="text/javascript">
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
		if(document.frmMain.ladetail.value == "")
			{	alert(' ใส่เหตุผลที่ลา ');	
						document.frmMain.ladetail.focus();
						return false;
			} 	
		if(document.frmMain.laname.value == "")
			{	alert(' ใส่ผู้ปฏิบัติงานแทน');	
						document.frmMain.laname.focus();
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
