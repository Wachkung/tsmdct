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
                        ระบบจัดความเสี่ยง 
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
                                    <h3 class="box-title">รายงานจำนวนครั้งที่เกิดความเสี่ยง</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                 <th width="5%"align="center">No.</th>
                                                <th width="20%"align="center">โปรแกรมความเสี่ยง</th>
                                                <th width="30%"align="center">บัญชีความเสี่ยง</th>
                                                <th width="5%"align="center">จำนวนครั้ง</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
											$total=0; $no=1;
											$sql="SELECT
														risk2_datarisk.dataevent,
														risk2_group.namegroup,
														risk2_risk.namerisk,
														COUNT(risk2_datarisk.id) AS 'Num',
														risk2_risk.coderisk
														FROM
														risk2_datarisk
														INNER JOIN risk2_group on risk2_group.codegroup = risk2_datarisk.fromevent
														INNER JOIN risk2_risk on risk2_risk.coderisk=risk2_datarisk.dataevent
														WHERE risk2_datarisk.datereport BETWEEN '".$strdate."'and '".$enddate."'
														GROUP BY namerisk ORDER BY Num DESC"; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$name=$data['0'];
										?>
                                            <tr>
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['1']?></td>
                                                <td><a href="report_risk.php?dataevent=<?=$data['4']?>" title="<?=$data['4']?>"><?=$data['2']?></a></td>
                                                <td align="center"><a href="report_risk.php?dataevent=<?=$data['4']?>" title="<?=$data['4']?>"><?=$data['3']?></a></td>
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
        </div><!-- ./wrapper -->
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
