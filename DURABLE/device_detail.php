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
    $person = $objResult["person"];

    $strSQLperson = "SELECT * FROM person WHERE idcard = '$person' ";
	$objQueryperson = mysql_query($strSQLperson);
	$objResultperson = mysql_fetch_array($objQueryperson);

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
                       <?=$objResult["dtype"];?>  รหัส : <?=$objResult["device_code"];?>  
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าแรก</a></li>
                        <li><a href="device.php">อุปกรณ์ IT อื่นๆ</a></li>
                        <li class="active">รหัส <?=$objResult["device_code"];?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-5 connectedSortable">    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">หมายเลขครุภัณฑ์ <?=$objResult["serial"];?></h3>
                                </div>
                                <div class="box-body">
                                	<p align="left"><img  src="../IT/picture_device/<?=$objResult["picture"];?>"
                                    width="300"  class="img-thumbnail"/>  </p>  
                                    <p>ยี่ห้อ <code><?=$objResult["brand"];?></code> รุ่น: <code><?=$objResult["model"];?></code> </p>
                                    <p>เลขครุภัณฑ์: <code><?=$objResult["serial"];?></code></p>
                                    <p>S/N: <code><?=$objResult["serialkey"];?></code></p>
                                    <p>IP Address <code><?=$objResult["ip"];?></code> Mac: <code><?=$objResult["mac"];?></code></p>
                                    <p>รายละเอียด : <code><?=$objResult["spec"];?></code> </p>
                                    <p>สถานะ : <code><?=$objResult["status"];?></code> </p>
                                    <p>งบประมาณ : <code><?=$objResult["budgets"];?></code> </p>
                                    <p> วิธีการที่ได้มา  <code> <?=$objResult["get"];?> </code> ราคา <code><?=$objResult["price"];?> </code>
                                    วันที่ติดตั้ง <code><?=LongThaiDate($objResult["date_install"])?></code></p>
                                    <p> เลขที่เอกสารตรวจรับ  <code> <?=$objResult["file_number"];?> </code> 
                                    Download <code> <?=$objResult["file_number"];?> </code></p>
                                    <p>ของหน่วยงาน <code><?=$objResult["depart"];?></code> 
                                    ผู้ดูแล <code><?=$objResultperson["title"];?><?=$objResultperson["name"];?><?echo " ";?> <?=$objResultperson["lastname"];?></code></p>
                                </div><!-- /.box-body -->

                                <div class="box-footer">
                                	<div class="form-group">
                                   	<button type="button" class="btn btn-success" onclick="window.location.href='device_repair.php?device_code=<?=$objResult["device_code"]?>'">1.ซ่อม/อัพเกรด</button>
                                    <button type="button" class="btn btn-success" onclick="window.location.href='device_edit.php?device_code=<?=$objResult["device_code"]?>'">2.แก้ไขขครุภัณฑ์</button>
                                    <button type="button" class="btn btn-success" onclick="window.location.href='device_print.php?device_code=<?=$objResult["device_code"]?>'">3.พิมพ์</button>
                                    <button type="button" class="btn btn-danger" onclick="window.location.href='device.php'"> ย้อนกลับ</button>	
                                    </div><!-- /.form group -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-7 connectedSortable">  
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">ประวัติการซ่อม/อัพเกรด</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="8%">No.</th>
                                                <th width="20%">วันที่</th>
                                                <th width="42%">รายละเอียด</th>
                                                <th width="15%">ผู้ดำเนินการ</th>
                                                <th width="10%">เป็นเงิน</th>  
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM	 it_repair where code='$device_code'  order by date_repair DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$total=$total+$data['price_repair'];	
										?>
                                            <tr>
                                            	<td><?=$no?></td>
                                                <td><?=LongThaiDate($data['date_repair'])?></td>
                                                <td><?=$data['detail_repair']?></td>
                                                <td><?=$data['person_repair']?></td>
                                                <td><?=number_format( $data['price_repair'] );?></td>
                                                <th><a href="delete_repair_device.php?id=<?=$data['id']?>&device_code=<?=$data['code']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
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
                                            	<th colspan="2">รวม</th>
                                                <th colspan="2"><?=$bathtext1?></th>
                                                <th colspan="2"><?=number_format( $total );?></th>
                                            </tr>
                                        </tfoot>
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
