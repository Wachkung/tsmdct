<?
	session_start();
	include("./includes/conndb.php"); 
	include("./includes/config59.inc.php"); 
	include("./includes/connhidb2.php"); 
	$strdate = "2015-10-1";
	$enddate = "2016-09-30";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบรายงานโรงพยาบาลตาลสุม</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
        <link href="./includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="./includes/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="./includes/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="./includes/bootstrap/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="./includes/bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link href="./includes/bootstrap/css/card.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript"src="./includes/bootstrap/js/jquery-latest.js"></script>
		<link type="text/css" href="./includes/bootstrap/css/custom-theme/jquery-ui-1.9.2.custom.css" rel="stylesheet" /> 
		<script type="text/javascript" src="./includes/bootstrap/js/jquery-1.8.0.min.js"></script> 
        <script type="text/javascript" src="./includes/bootstrap/js/jquery-ui-1.8.23.custom.min.js"></script>
 
    </head>
    <?// include "navigator.php";?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside>
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h2>
                        ระบบรายงานโรงพยาบาลตาลสุม 
                    </h2>
                    <ol class="breadcrumb">
                        <li><a href="./popup.php"><i class="fa fa-dashboard"></i><b> Home</b></a></li>
                        <li><a href="./popup56.php"><b>2556</b></a></li>
                        <li><a href="./popup57.php"><b>2557</b></a></li>
                        <li><a href="./popup58.php"><b>2558</b></a></li>
                        <li><a href="./popup59.php"><b>2559</b></a></li>
                        <li><a href="./popup60.php"><b>2560</b></a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>
                <section class="content">             
             <!--        <div class="row">   -->
                        
						<div id="ow-marketplace" class="col-sm-12 col-md-12">
						<tbody>
								<div class="box">
									<div class="box-header"align="center">
									<h3 class="box-title"><font color=blue size=4>จำนวนผู้ป่วยนอนโรงพยาบาล  ปีงบประมาณ  2559</font></h3>
									</div><!-- /.box-header -->
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%"align="center"><center>No.</center></th>
													<th width="25%"align="center"><center>รายชื่อแพทย์</center></th>
													<th width="5%"align="center"><center>ต.ค.</center></th>
													<th width="5%"align="center"><center>พ.ย.</center></th>
													<th width="5%"align="center"><center>ธ.ค.</center></th>
													<th width="5%"align="center"><center>ม.ค.</center></th>
													<th width="5%"align="center"><center>ก.พ.</center></th>
													<th width="5%"align="center"><center>มี.ค.</center></th>
													<th width="5%"align="center"><center>เม.ย.</center></th>
													<th width="5%"align="center"><center>พ.ค.</center></th>
													<th width="5%"align="center"><center>มิ.ย.</center></th>
													<th width="5%"align="center"><center>ก.ค.</center></th>
													<th width="5%"align="center"><center>ส.ค.</center></th>
													<th width="5%"align="center"><center>ก.ย.</center></th>
													<th width="5%"align="center"><center>รวม(ครั้ง)</center></th>
													<th width="5%"align="center"><center>รวม(คน)</center></th>
												</tr>
											</thead>
											<tbody>
											<?php   
												$total=0; $no=1;$data2=0;$data3=0;$data4=0;$data5=0;$data6=0;$data7=0;$data8=0;$data9=0;$data10=0;$data11=0;$data12=0;$data13=0;$data14=0;$data15=0;
												$sql="SELECT aa.dct,aa.name,SUM(aa.10),SUM(aa.11),SUM(aa.12),SUM(aa.01),SUM(aa.02),SUM(aa.03),SUM(aa.04),SUM(aa.05),SUM(aa.06),SUM(aa.07),SUM(aa.08),SUM(aa.09),SUM(aa.vn) AS Sum ,SUM(aa.hn) AS hn
												FROM (
												SELECT
													count(ovst.vn) AS vn ,
													count(DISTINCT(ovst.hn)) AS hn ,
													dct.lcno AS dct,CONCAT(dct.fname,' ',dct.lname) AS 'name',
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
												FROM dct 
												INNER JOIN ovst ON dct.dct = substr(ovst.dct,3,2)  
												WHERE dct.lcno !='' AND ovst.dct !='' AND ovst.dct IS NOT NULL AND LEFT(ovst.dct,1) REGEXP '[a-z]' AND date(ovst.vstdttm) BETWEEN '".$strdate."' AND '".$enddate."'  AND ovst.ovstost= '4'
												GROUP BY dct 
												UNION

												SELECT 
													count(ovst.vn) AS vn ,
													count(DISTINCT(ovst.hn)) AS hn ,
													dct.lcno AS dct,CONCAT(dct.fname,' ',dct.lname) AS 'name',
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
												INNER JOIN dct ON dct.lcno = ovst.dct 
												WHERE dct.lcno !='' AND ovst.dct !='' AND ovst.dct IS NOT NULL AND (date(ovst.vstdttm) BETWEEN '".$strdate."' AND '".$enddate."' ) AND ovst.ovstost= '4' 
												GROUP BY dct 

												) AS aa
												GROUP BY aa.dct ORDER BY sum DESC"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {

											?>
												<tr>
													<td align="center"><?=$no?></td>
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
													<td align="right"><font color=blue size=2><b><?=$data['14']?></b></font></td>
													<td align="right"><font color=blue size=2><b><?=$data['15']?></b></font></td>
												</tr>
											<? $no++;
											$data2=$data2+$data['2'];$data3=$data3+$data['3'];$data4=$data4+$data['4'];$data5=$data5+$data['5'];
											$data6=$data6+$data['6'];$data7=$data7+$data['7'];$data8=$data8+$data['8'];$data9=$data9+$data['9'];$data10=$data10+$data['10'];
											$data11=$data11+$data['11'];$data12=$data12+$data['12'];$data13=$data13+$data['13'];$data14=$data14+$data['14'];$data15=$data15+$data['15'];
											} ?>
											</tbody>
											<tfoot>
												<tr>
													<td align="center"></td>
													<td align="center"><font color=blue size=3><b>รวมทั้งหมด</b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data2?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data3?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data4?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data5?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data6?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data7?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data8?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data9?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data10?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data11?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data12?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data13?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data14?></b></font></td>
													<td align="right"><font color=blue size=3><b><?=$data15?></b></font></td>

											</tfoot>
										</table>
								</div><!-- /.box-body -->
								<div class="box" align="center">
                                    <div class="form-group">
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" ><font size=4><b>...::: เข้าสู่เว็บไซต์โรงพยาบาล :::...</b></font></button>
                                    </div><!-- /.form group -->
								</div><!-- /.box-body -->

						</tbody>
						</div>
					</div>
				</section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<!--End Container-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="includes/bootstrap/js/jquery.min.js"></script>
        <script src="includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="includes/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="includes/bootstrap/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="includes/bootstrap/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/bootstrap/js/lang/th.js"></script>
        <!-- fullCalendar -->
        <script src="includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="includes/bootstrap/js/lang/th.js"></script>
		<!-- All functions for this theme + document.ready processing -->
		<script src="includes/bootstrap/js/devoops.js"></script>
		<script type="text/javascript">
			function hidestatus(){
				window.status=''
				return true
			}
			if (document.layers)
				document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)

				document.onmouseover=hidestatus
				document.onmouseout=hidestatus
		</script>

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
