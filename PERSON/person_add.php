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
                        <li class="active">เพิ่มรายการ</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content"> 
                 	<div class="row"> 
                	<form method="post" enctype="multipart/form-data"   action="person_save.php" name="frmMain" onSubmit="JavaScript:return fncSubmit();" >            
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
                                            <input type="text" class="form-control" name="idcard" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                	 
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                คำนำหน้าชื้อ :
                                            </div>
                                          <select name="title" class="form-control">
											  <option value=""></option>
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
                                            <input type="text" class="form-control"  name="name" />
                                             <div class="input-group-addon">
                                                 สกุล :
                                          	 </div>
                                           	 <input type="text" class="form-control" name="lastname" />  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เพศ :
                                            </div>
                                            <select name="sex" class="form-control">
                                              <option value=""></option>
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
                                           	 <input type="text" class="form-control" name="addr" />  
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                เบอร์โทร :
                                            </div>
                                            <input type="text" class="form-control"   name="tell" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                E-Mail :
                                            </div>
                                            <input type="text" class="form-control"   name="email" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                   
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                ตำแหน่ง :
                                            </div>
                                            <select name="position" class="form-control">
											<option value="">--- ตำแหน่ง ------</option>
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
                                            <input type="text" class="form-control" id = "bdate" name="bdate"/>
                                            <div class="input-group-addon">
                                                วันที่เข้าทำงาน :
                                            </div>
                                            <input type="text" class="form-control" id = "workdate" name="workdate"/> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                               ฝ่าย/กลุ่มงาน :
                                            </div>
											 <select name="depart" class="form-control" >
                                              <option value="">--- ฝ่าย/กลุ่มงาน ------</option>
                                              <?php
												$sqlperson=" SELECT * FROM risk2_departreport  where STATUS='0' order by CODE ASC "; 
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
                                              <option value=""></option>
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
                                            <input type="text" class="form-control"   name="lasasom" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
     
                                     <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                สังกัด :
                                            </div>
                                            <select name="personla" class="form-control" >
                                              <option value="">--- สังกัดหัวหน้าฝ่าย / ผู้แก้ไขข้อมูล ------</option>
                                              <?php
													$sqlperson=" SELECT * FROM person where personla != '' order by name ASC "; 
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
										<button  type="submit" class="btn btn-success" onclick="return confirm('ต้องการบันทึกการแก้ไขหรือไม่')"><i class="fa fa-save"></i> บันทึกบุคลากร</button>
										<button type="button" class="btn btn-danger" onclick="window.location.href='index.php'"><i class="fa fa-reply"></i> กลับหน้าแรก</button>	
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
												$sql=" SELECT * FROM	 person   where  personla='$IDCARD1'  order by name ASC "; 
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
												$sql=" SELECT * FROM person  order by name ASC "; 
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

		<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/smoothness/jquery-ui-1.7.2.custom.css">
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>

		<script type="text/javascript">
		$(function(){
			// แทรกโค้ต jquery
			$("#bdate").datepicker({dateFormat: 'yy-mm-dd'});
			$("#workdate").datepicker({dateFormat: 'yy-mm-dd'});
			// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16

		});
		</script>
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
