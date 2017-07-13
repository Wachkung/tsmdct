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
                        ระบบรายงานความเสี่ยง 
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
                                    <h3 class="box-title">รายงานความเสี่ยงรอการวิเคราะห์แยกกลุ่มงาน</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                 <th width="10%"align="center">No.</th>
                                                <th width="75%"align="center">ฝ่าย/กลุ่มงาน</th>
                                                <th width="15%"align="center">จำนวน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
											$total=0; $no=1;
											$sql="SELECT risk2_departreport.DeptName as 'หน่วยงาน',COUNT(risk2_datarisk.id) as 'จำนวน'
													FROM risk2_datarisk 
													INNER JOIN risk2_departreport on risk2_datarisk.departrespon = risk2_departreport.`CODE`
													WHERE risk2_datarisk.noteceo = ' '
													GROUP BY หน่วยงาน
													ORDER BY จำนวน DESC"; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$name=$data['0'];
										?>
                                            <tr>
                                                
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['0']?></td>
                                                <td align="center"><?=$data['1']?></td>
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
