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
                        <li><a href="report_ef.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="report_ef57.php">2557</a></li>
                        <li><a href="report_ef58.php">2558</a></li>
                        <li><a href="report_ef59.php">2559</a></li>
                        <li><a href="report_ef60.php">2560</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานความเสี่ยงระดับ E - F </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="2%">No.</th>
                                                <th width="18%">ชื่อ-สกุล</th>
                                                <th width="20%">เหตุการณ์</th>
                                                <th width="5%">คลินิก</th>
                                                <th width="25%">การอธิบาย</th>
                                                <th width="10%">หน่วยงาน</th>
                                                <th width="10%">ประสบปัญหา</th>
                                                <th width="2%"><i class="fa fa-edit"></i></th>
                                                <th width="2%"><i class="fa fa-trash-o"></i></th>
                                                <th width="2%"><i class="fa fa-check"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM risk2_datarisk WHERE (risk2_datarisk.commen IN ('E','F') OR risk2_datarisk.typereport IN ('E','F')) AND (daterigter BETWEEN '".$strdate."'and '".$enddate."')  order by daterigter DESC "; 
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
                                                <td><?=$data['notepatient']?></td>
										<?php
											$sqldepartrespon2=" SELECT * FROM risk2_departreport where code = '$departrespon'"; 
											$resultdepartrespon2 = mysql_query($sqldepartrespon2); $datadepartrespon2 = mysql_fetch_array($resultdepartrespon2)
										?>
                                                <td><?=$datadepartrespon2['DeptName']?></td>
                                                <td><?=LongThaiDate($data['daterigter'])?></td>
                                               <td><a href="risk_detail.php?id=<?=$data['id']?>" title="<?=$data['dataevent']?>"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                               <td><a href="risk_delete.php?id=<?=$data['id']?>" title="<?=$data['notepatient']?>"onclick="return confirm('ลบข้อมูลหรือไม่');"><span class="label label-primary"> <i class="fa fa-trash-o"></i></span></a></td>
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
