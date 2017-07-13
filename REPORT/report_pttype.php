<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	include("../includes/connhidb.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['REPORT'] <> "1")
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
                        ระบบรายงานโรงพยาบาล 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>
                <section class="content">             
                     <div class="row">   
                        
						<div id="ow-marketplace" class="col-sm-12 col-md-12">
						<tbody>
								<div class="box">
									<div class="box-header"align="center">
										<h3 class="box-title">จำนวนผู้ป่วยมารับบริการ วันนี้</h3>
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%"align="center">No.</th>
													<th width="5%"align="center">HN</th>
													<th width="15%"align="center">วันที่รับบริการ</th>
													<th width="15%"align="center">เลขบัตรประชาชน</th>
													<th width="20%"align="center">ชื่อ - สกุล</th>
													<th width="15%"align="center">รหัสสิทธิ์</th>
													<th width="15%"align="center">ชื่อสิทธิ์</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sql="SELECT o.vn,o.hn,o.vstdttm,p.pop_id,p.fname,p.lname,o.pttype,t.namepttype from ovst as o
														INNER JOIN pt as p on p.hn = o.hn
														INNER JOIN pttype as t on t.pttype	= o.pttype
														where date(o.vstdttm) BETWEEN DATE(NOW())-1 AND DATE(NOW()) ORDER BY o.vstdttm DESC"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$data['1']?></td>
													<td align="center"><?=$data['2']?></td>
													<td align="center"><?=$data['3']?></td>
													<td><?=$data['4']?>  <?=$data['5']?></td>
													<td align="center"><?=$data['6']?></td>
													<td><?=$data['7']?></td>
											<?php $no++; } ?>
											</tbody>
										</table>
									</div><!-- /.box-body -->
						</tbody>
						</div>
					</div>
				</section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="../includes/bootstrap/js/jquery.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->

		 <script type="text/javascript">
		$(document).ready(function(){
			// calculate height
			var screen_ht = $(window).height();
			var preloader_ht = 5;
			var padding =(screen_ht/2)-preloader_ht;
			$("#preloader").css("padding-top",padding+"px");
		});
		$(document).ready(function(){
		// loading animation using script 
			function anim() {
				$("#preloader_image").animate({left:'-1400px'}, 5000,
				function(){ $("#preloader_image"),animate({left:'0px'}, 5000 );
					if (rotate==1){
						anim();
					}
				}
				);
			}
			anim();
		});
		</script> 
    </body>
</html>
