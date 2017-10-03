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
                                    <h3 class="box-title">รายงานจำนวนความเสี่ยงแยกกลุ่มงาน+แยกเดือน</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                
                                                 <th width="5%"align="center">No.</th>
                                                <th width="15%"align="center">ฝ่าย/กลุ่มงาน</th>
                                                <th width="5%"align="center">มค</th>
                                                <th width="5%"align="center">กพ</th>
                                                <th width="5%"align="center">มีค</th>
                                                <th width="5%"align="center">เมย</th>
                                                <th width="5%"align="center">พค</th>
                                                <th width="5%"align="center">มิย</th>
                                                <th width="5%"align="center">กค</th>
                                                <th width="5%"align="center">สค</th>
                                                <th width="5%"align="center">กย</th>
                                                <th width="5%"align="center">ตค</th>
                                                <th width="5%"align="center">พย</th>
                                                <th width="5%"align="center">ธค</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
											$total=0; $no=1;
											$sql=" SELECT
														risk2_departreport.DeptName,
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-01-01' AND '2018-01-31' THEN '01' END) AS 'มกราคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-02-01' AND '2018-02-29' THEN '02' END) AS 'กุมภาพันธ์',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-03-01' AND '2018-03-30' THEN '03' END) AS 'มีนาคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-04-01' AND '2018-04-30' THEN '04' END) AS 'เมษายน',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-05-01' AND '2018-05-31' THEN '05' END) AS 'พฤษภาคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-06-01' AND '2018-06-30' THEN '06' END) AS 'มิถุนายน',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-07-01' AND '2018-07-31' THEN '07' END) AS 'กรกฏาคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-08-01' AND '2018-08-31' THEN '08' END) AS 'สิงหาคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2018-09-01' AND '2018-09-31' THEN '08' END) AS 'กันยายน',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2017-10-01' AND '2017-10-31' THEN '08' END) AS 'ตุลาคม',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2017-11-01' AND '2017-11-31' THEN '08' END) AS 'พศจิกายน',
														COUNT(CASE WHEN risk2_datarisk.datereport BETWEEN '2017-12-01' AND '2017-12-31' THEN '08' END) AS 'ธันวาคม'
														FROM
														risk2_datarisk
														INNER JOIN risk2_departreport ON risk2_departreport.`CODE`=risk2_datarisk.departrespon
														WHERE risk2_datarisk.datereport BETWEEN '".$strdate."'and '".$enddate."'
														GROUP BY departrespon"; 

                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$name=$data['0'];


										?>
                                            <tr>
                                                
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['0']?></td>
                                                <td align="center"><?=$data['1']?></td>
                                                <td align="center"><?=$data['2']?></td>
                                                <td align="center"><?=$data['3']?></td>
                                                <td align="center"><?=$data['4']?></td>
                                                <td align="center"><?=$data['5']?></td>
                                                <td align="center"><?=$data['6']?></td>
                                                <td align="center"><?=$data['7']?></td>
                                                <td align="center"><?=$data['8']?></td>
                                                <td align="center"><?=$data['9']?></td>
                                                <td align="center"><?=$data['10']?></td>
                                                <td align="center"><?=$data['11']?></td>
                                                <td align="center"><?=$data['12']?></td>
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
