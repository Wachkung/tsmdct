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
                        ข้อมูลบุคลากร
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายชื่อบุคลากร โรงพยาบาล</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ชื่อ-สกุล</th>
                                                <th>เลขบัตรประชาชน</th>
                                                <th>ตำแหน่ง</th>
                                                <th>จำนวนลาป่วย</th>
                                                <th>จำนวนลากิจ</th>
                                                <th>จำนวนลาพักพ่อน</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
											if($admin<> "1") {   
												//echo $IDCARD1;exit;								
												$sql=" SELECT * FROM person where personla='$IDCARD1' order by name ,lastname ASC "; 
                        						$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
												$position2=$data['position'];
												$idcard4=$data['idcard']
										?>
                                            <tr>
                                                <td><a  href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['title']?> <?=$data['name']?> <?=$data['lastname']?>"><?=$data['title']?><?=$data['name']?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data['lastname']?></a></td>
                                                <td><?=$data['idcard']?></td>
										<?php 	
												 $sqlposition2=" SELECT * FROM position  where PosId = '$position2'"; 
												 $resultposition2 = mysql_query($sqlposition2); $dataposition2 = mysql_fetch_array($resultposition2)
										?>
                                                <td><?=$dataposition2['PosName']?></td>
												
										<?php
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle1 FROM la where idcard='$idcard4' and latype='ลาป่วย' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery1 = mysql_query($strSQL1);	$objResult1 = mysql_fetch_array($objQuery1);
												$la_day1=$objResult1['dsum_totle1'];
										?>
												<td><? if ($la_day1 == '') { echo "0"; } else { echo "$la_day1";} ?></td>
										<?php
												$strSQL2 = "SELECT sum(la.dsum) as dsum_totle2 FROM la where idcard='$idcard4' and latype='ลากิจ' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery2 = mysql_query($strSQL2);$objResult2 = mysql_fetch_array($objQuery2);
												$la_day2=$objResult2['dsum_totle2'];
										?>
                                                <td><? if ($la_day2 == '') { echo "0"; } else { echo "$la_day2";} ?></td>
										<?php
												$strSQL3 = "SELECT sum(la.dsum) as dsum_totle3 FROM la where idcard='$idcard4' 	and latype='ลาพักผ่อน' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery3 = mysql_query($strSQL3);	$objResult3 = mysql_fetch_array($objQuery3);
												$la_day3=$objResult3['dsum_totle3'];
										?>
                                                <td><? if ($la_day3 == '') { echo "0"; } else { echo "$la_day3";} ?></td>
                                            </tr>
                                        <?php } 
										}else{
												$sql=" SELECT * FROM person where personla != ''  order by name ,lastname  ASC "; 
                        						$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
												$position2=$data['position'];
												$idcard4=$data['idcard']
										?>
                                            <tr>
                                                <td><a  href="person_edit.php?idcard=<?=$data['idcard']?>" title="<?=$data['title']?> <?=$data['name']?> <?=$data['lastname']?>"><?=$data['title']?><?=$data['name']?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$data['lastname']?></a></td>
                                                <td><?=$data['idcard']?></td>
										<?php 	
												 $sqlposition2=" SELECT * FROM position  where PosId = '$position2'"; 
												 $resultposition2 = mysql_query($sqlposition2); $dataposition2 = mysql_fetch_array($resultposition2)
										?>
                                                <td><?=$dataposition2['PosName']?></td>
										<?
												$strSQL1 = "SELECT sum(la.dsum) as dsum_totle1 FROM la where idcard='$idcard4' and latype='ลาป่วย' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery1 = mysql_query($strSQL1);$objResult1 = mysql_fetch_array($objQuery1);
												$la_day1=$objResult1['dsum_totle1'];
										?>
												<td><? if ($la_day1 == '') { echo "0"; } else { echo "$la_day1";} ?></td>
										<?php
												$strSQL2 = "SELECT sum(la.dsum) as dsum_totle2 FROM la where idcard='$idcard4' and latype='ลากิจ' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery2 = mysql_query($strSQL2);$objResult2 = mysql_fetch_array($objQuery2);
												$la_day2=$objResult2['dsum_totle2'];
										?>
                                                <td><? if ($la_day2 == '') { echo "0"; } else { echo "$la_day2";} ?></td>
										<?php
												$strSQL3 = "SELECT sum(la.dsum) as dsum_totle3 FROM la where idcard='$idcard4' and latype='ลาพักผ่อน' and sdate BETWEEN '".$strdate."'and '".$enddate."'";
												$objQuery3 = mysql_query($strSQL3);$objResult3 = mysql_fetch_array($objQuery3);
												$la_day3=$objResult3['dsum_totle3'];
										?>
                                                <td><? if ($la_day3 == '') { echo "0"; } else { echo "$la_day3";} ?></td>
                                            </tr>
                                        <?php }
										}
												?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
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
