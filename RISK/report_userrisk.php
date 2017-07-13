<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบสิทธิ์การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=../main.php'>";
		exit();
	}
	$idcard2=$_GET['idcard2']; 


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
                        ระบบความเสี่ยง 
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
                                    <h3 class="box-title">รายงานความเสี่ยง </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="2%">No.</th>
                                                <th width="18%">ชื่อ-สกุล</th>
                                                <th width="20%">เหตุการณ์</th>
                                                <th width="5%">คลินิก</th>
                                                <th width="5%">ทั่วไป</th>
                                                <th width="25%">การอธิบาย</th>
                                                <th width="15%">ประสบปัญหา</th>
                                                <th width="15%">วันที่รายงาน</th>
                                                <th width="2%"><i class="fa fa-check"></i></th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM risk2_datarisk WHERE (name = '".$idcard2."') AND (daterigter BETWEEN '".$strdate."'and '".$enddate."') order by daterigter DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$dataevent=$data['dataevent'];
											$name=$data['name'];
											$departrespon=$data['departrespon'];
										?>
                                            <tr>
                                            	<td><?=$no?></td>
										<?php
												$sqlperson2=" SELECT * FROM person where idcard = '$name'"; 
												$resultperson2 = mysql_query($sqlperson2); $dataperson2 = mysql_fetch_array($resultperson2);
										?>
												<td><?=$dataperson2['title']?><?=$dataperson2['name']?>  <?=$dataperson2['lastname']?>
										<?php
											$sqldataevent2=" SELECT * FROM risk2_risk  where coderisk = '$dataevent'"; 
											$resultdataevent2 = mysql_query($sqldataevent2); $datadataevent2 = mysql_fetch_array($resultdataevent2)
										?>
                                                <td><?=$datadataevent2['namerisk']?></td>
                                                <td align="center"><?=$data['commen']?></td>
                                                <td align="center"><?=$data['typereport']?></td>
                                                <td><?=$data['notepatient']?></td>
										<?php
											$sqldepartrespon2=" SELECT * FROM rm_depart where code = '$departrespon'"; 
											$resultdepartrespon2 = mysql_query($sqldepartrespon2); $datadepartrespon2 = mysql_fetch_array($resultdepartrespon2)
										?>
                                                <td><?=LongThaiDate($data['daterigter'])?></td>
                                                <td><?=LongThaiDate($data['datereport'])?></td>
                                                <td ><?if ($data['noteceo'] == "") {echo "  ";}else{echo "<center><span class='label label-primary'><i class='fa fa-check' aria-hidden='true'></i></span></center>";} ?></td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
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
