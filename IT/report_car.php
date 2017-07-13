<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
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
                        รายงานข้อมูลรถเจ้าหน้าที่โรงพยาบาล 
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
                        <div class="col-xs-10">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">ข้อมูลรถเจ้าหน้าที่</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"align="center">No.</th>
                                                <th width="20%"align="center">รายละเอียด</th>  
												<th width="20%"align="center">เลขทะเบียนรถ</th>
                                                <th width="20%"align="center">เจ้าของรถ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
											$total=0; $no=1;
											$sql="SELECT car_type,car_yee,car_ru,car_colur,car_number,car_city,person.title, person.`name`,person.lastname FROM person_car INNER JOIN person ON person_car.idcard = person.idcard"; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$name=$data['0'];
										?>
                                            <tr>
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['0']?> <?=$data['1']?> <?=$data['2']?> สี <?=$data['3']?></td>
                                                <td align="center"><?=$data['4']?> <?=$data['5']?></td>
                                                <td><?=$data['6']?><?=$data['7']?>  <?=$data['8']?></td>
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
    </body>
</html>
