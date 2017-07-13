<?php
	session_start();
	include("../includes/config.inc.php"); 
	include("../includes/connhidb.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
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
										<h3 class="box-title">จำนวนผู้ป่วยนอนโรงพยาบาล  ปีงบประมาณ 2559</h3>
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%"align="center">No.</th>
													<th width="5%"align="center">License</th>
													<th width="30%"align="center">รายชื่อแพทย์</th>
													<th width="5%"align="center">ต.ค.</th>
													<th width="5%"align="center">พ.ย.</th>
													<th width="5%"align="center">ธ.ค.</th>
													<th width="5%"align="center">ม.ค.</th>
													<th width="5%"align="center">ก.พ.</th>
													<th width="5%"align="center">มี.ค.</th>
													<th width="5%"align="center">เม.ย.</th>
													<th width="5%"align="center">พ.ค.</th>
													<th width="5%"align="center">มิ.ย.</th>
													<th width="5%"align="center">ก.ค.</th>
													<th width="5%"align="center">ส.ค.</th>
													<th width="5%"align="center">ก.ย.</th>
													<th width="5%"align="center">ครั้ง</th>
													<th width="5%"align="center">คน</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sql="SELECT   aa.dct,aa.name,SUM(aa.10),SUM(aa.11),SUM(aa.12),SUM(aa.01),SUM(aa.02),SUM(aa.03),SUM(aa.04),SUM(aa.05),SUM(aa.06),SUM(aa.07),SUM(aa.08),SUM(aa.09),SUM(aa.vn) as Sum ,SUM(aa.hn) as hn
												from (
												SELECT
													count(ovst.vn) as vn ,
													count(DISTINCT(ovst.hn)) as hn ,
													dct.lcno as dct,CONCAT(dct.fname,' ',dct.lname) as 'name',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 10 THEN '10' END) AS '10',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 11 THEN '11' END) AS '11',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 12 THEN '12' END) AS '12',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 01 THEN '01' END) AS '01',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 02 THEN '02' END) AS '02',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 03 THEN '03' END) AS '03',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 04 THEN '04' END) AS '04',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 05 THEN '05' END) AS '05',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 06 THEN '06' END) AS '06',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 07 THEN '07' END) AS '07',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 08 THEN '08' END) AS '08',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 09 THEN '09' END) AS '09'
												from dct 
												INNER JOIN ovst ON dct.dct = substr(ovst.dct,3,2) 
												WHERE LEFT(ovst.dct,1) REGEXP '[a-z]' and date(ovst.vstdttm) BETWEEN '2015-10-01' and  '2016-09-30' and ovst.ovstost= '4'
												GROUP BY dct
												UNION

												SELECT 
													count(ovst.vn) as vn ,
													count(DISTINCT(ovst.hn)) as hn ,
													dct.lcno as dct,CONCAT(dct.fname,' ',dct.lname) as 'name',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 10 THEN '10' END) AS '10',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 11 THEN '11' END) AS '11',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 12 THEN '12' END) AS '12',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 01 THEN '01' END) AS '01',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 02 THEN '02' END) AS '02',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 03 THEN '03' END) AS '03',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 04 THEN '04' END) AS '04',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 05 THEN '05' END) AS '05',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 06 THEN '06' END) AS '06',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 07 THEN '07' END) AS '07',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 08 THEN '08' END) AS '08',
													COUNT(CASE WHEN MONTH(ovst.vstdttm) = 09 THEN '09' END) AS '09'
												FROM ovst 
												INNER JOIN dct on dct.lcno = ovst.dct
												where  (date(ovst.vstdttm) BETWEEN '".$strdate."'and '".$enddate."' ) and ovst.ovstost= '4' 
												GROUP BY dct

												) as aa
												GROUP BY aa.dct"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
       
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$data['0']?></td>
													<td><?=$data['1']?></td>
													<td align="right"><?=$data['2']?></td>
													<td align="right"><?=$data['3']?></td>
													<td align="right"><?=$data['4']?></td>
													<td align="right"><?=$data['5']?></td>
													<td align="right"><?=$data['6']?></td>
													<td align="right"><?=$data['7']?></td>
													<td align="right"><?=$data['8']?></td>
													<td align="right"><?=$data['9']?></td>
													<td align="right"><?=$data['10']?></td>
													<td align="right"><?=$data['11']?></td>
													<td align="right"><?=$data['12']?></td>
													<td align="right"><?=$data['13']?></td>
													<td align="right"><b><?=$data['14']?></b></td>
													<td align="right"><b><?=$data['15']?></b></td>

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
    </body>
</html>
