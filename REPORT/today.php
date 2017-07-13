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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<META HTTP-EQUIV='Refresh' CONTENT='60'; URL='../REPORT/todaynew.php'>

        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>

    <!-- MetisMenu CSS -->
    <link href="../includes/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../includes/css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" href="../includes/jqwidgets/styles/jqx.base.css" type="text/css" />

    <!-- <script type="text/javascript" src="../includes/bootstrap/js/jquery-1.10.2.js"></script> -->

    <script type="text/javascript" src="../includes/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../includes/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../includes/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../includes/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../includes/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../includes/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="../includes/jqwidgets/jqxdropdownlist.js"></script> 
     <script type="text/javascript" src="../includes/jqwidgets/jqxlistbox.js"></script> 
    <script type="text/javascript" src="generatedata.js"></script>

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

						   <!-- Page Content -->
						   <div id="page-wrapper">
								<div class="row">
									<div class="col-lg-12">
										<h1 class="page-header">TODAY <?php 
									   $yearT   =  date('Y')+543;
										   $dm     =  date('d/m');
									   echo'   '. $dm.'/'.$yearT;  ?>  </h1>
									</div>
									<!-- /.col-lg-12 -->
								</div>
								<!-- /.row -->
								  <div class="panel-body alert-info">
											  OPD  
								  </div>   
									<!-- /.col-lg-12 -->
								   
							 <div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอกวันนี้รวมทั้งสิ้น</h4> 
												  <div class="row show-grid">
													<div id="showdivopdt"></div> 
												   </div>
											</div>
										</div>
									</div>
								</div>
								<div>
									<input type="button" value="Export to Excel" id='excelExportopduc' />
								</div> 
								 <div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอกวันนี้แยกตามสิทธิ์</h4> 
												<h3> </h3>
												<p> </p>
												  <div class="row show-grid">
													<div id="showdivopduc"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
								  <div>
									<input type="button" value="Export to Excel" id='excelExport9' />
								</div>  
							   
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก</h4> 
												<h3> </h3>
												<p> </p>
												  <div class="row show-grid">
													  <div id="showdiv9"></div> 
												   </div>
											</div>
										</div>
									</div>
								</div>
							   <div>
									<input type="button" value="Export to Excel" id='excelExport10' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก(ตามเวร)</h4> 
												 <div class="row show-grid">
													  <div id="showdiv10"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportopdrefer' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงาน OPD + ER ส่งREFER</h4> 
												  <div class="row show-grid">
													<div id="showdivopdrefer"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportipdre' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงาน IPD ส่งREFER</h4> 
												  <div class="row show-grid">
													 <div id="showdivipdref"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								 <div>
									<input type="button" value="Export to Excel" id='excelExportipdre_refer' />
								 </div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานรับAdmitted_refer</h4> 
												  <div class="row show-grid">
													<div id="showdivipdre_refer"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportallemer' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานสรุปอุบัติเหตุ</h4> 
												  <div class="row show-grid">
													<div id="showdivallemer"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportcaseemer' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานcaseอุบัติเหตุ</h4> 
												   <div class="row show-grid">
													<div id="showdivcaseemer"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportipddead' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-danger">รายงานเสียชีวิตผู้ป่วยใน</h4> 
												  <div class="row show-grid">
													 <div id="showdivipddead"></div> 
												   </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportopddead' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-danger">รายงานเสียชีวิตผู้ป่วยนอก</h4> 
												  <div class="row show-grid">
													<div id="showdivopddead"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
							  
								<div>
									<input type="button" value="Export to Excel" id='excelExport11' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก(20 อันดับโรคเฉพาะเวชปฏิบติ)</h4> 
												  <div class="row show-grid">
													 <div id="showdiv11"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
							   
								<div class="panel-body alert-info">
											  ER 
							   </div>   
									<!-- /.col-lg-12 -->

								<div>
									<input type="button" value="Export to Excel" id='excelExport12' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยห้องฉุกเฉิน(20 อันดับโรค)</h4> 
												  <div class="row show-grid">
														  <div id="showdiv12"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
							   
								<div class="panel-body alert-info">
											  IPD  
								</div>   
									<!-- /.col-lg-12 -->
							 <div>
									<input type="button" value="Export to Excel" id='excelExport2' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">ผู้มารับบริการงานผู้ป่วยใน ข้อมูลปัจจุบัน</h4> 
												  <div class="row show-grid">
															<div id="showdiv2"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
						   
								<div class="panel-body alert-info">
											  OR 
							   </div>   
									<!-- /.col-lg-12 -->

								<div>
									<input type="button" value="Export to Excel" id='excelExportor' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการนัดผ่าตัดวันนี้</h4> 
												  <div class="row show-grid">
														<div id="showdivor"></div> 
												</div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportortime' />
								</div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผ่าตัดวันนี้</h4> 
												  <div class="row show-grid">
													 <div id="showdivortime"></div> 
												 </div>
											</div>
										</div>
									</div>
								</div>

								<div>
									<input type="button" value="Export to Excel" id='excelExportoryes' />
							   </div>  
								
								<div class="row">
									<div class="col-lg-12">
										<div class="panel panel-default">
											<div class="panel-body">
												 <h4 class=" alert alert-success">รายงานผู้มารับบริการนัดผ่าตัดพรุ่งนี้</h4> 
												  <div class="row show-grid">
														 <div id="showdivoryes"></div> 
												  </div>
											</div>
										</div>
									</div>
								</div>
								 <!-- /.row -->
						   
							  </div>
								
							</div>
							<!-- /#page-wrapper -->

						</div>
						<!-- /#wrapper -->

						</tbody>
						</div>
					</div>
				</section>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    <!-- Metis Menu Plugin JavaScript -->
		<script src="../includes/bootstrap/js/plugins/metisMenu/metisMenu.min.js"></script>
		
		<script src="../includes/bootstrap/js/jquery.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

		 <!-- Custom Theme JavaScript -->
		 <script src="../includes/bootstrap/js/sb-admin-2.js"></script>
		 <script src="plugins/today_opd_total.js"></script>
		 <script src="plugins/today_opd_uc.js"></script>
		 <script src="plugins/today_opd.js"></script>
		 <script src="plugins/time_today_opd.js"></script>
		 <script src="plugins/today_refer_opd.js"></script>
		 <script src="plugins/today_refer_ref.js"></script>
		 <script src="plugins/today_resive_ipd.js"></script>
		 <script src="plugins/today_total_emer.js"></script>
		 <script src="plugins/today_case_emer.js"></script>
		 <script src="plugins/today_ipd_dead.js"></script>
		 <script src="plugins/today_opd_dead.js"></script>
		 <script src="plugins/today_opd_dx.js"></script>
		 <script src="plugins/today_er.js"></script>
		 <script src="plugins/today_or.js"></script>
		 <script src="plugins/today_or_time.js"></script>
		 <script src="plugins/today_or_yes.js"></script>
		 <script src="plugins/today_ipt.js"></script>
		 <script src="plugins/job_m_today_ipt.js"></script>
		 <script src="plugins/job_ref15_today_ipt.js"></script>
		 <script src="plugins/job_ref152_today_ipt.js"></script>
		 <script src="plugins/job_ref152e_today_ipt.js"></script>
		 <script src="plugins/job_ref153_today_ipt.js"></script>
		 <script src="plugins/job_e_today_ipt.js"></script>
		 <script src="plugins/job_ey_today_ipt.js"></script>
		 <script src="plugins/job_n_today_ipt.js"></script>
		 <script src="plugins/today_ipt_medm.js"></script>
		 <script src="plugins/today_ipt_medf.js"></script>
		 <script src="plugins/today_ipt_ped.js"></script>
		 <script src="plugins/today_ipt_gen.js"></script>
		 <script src="plugins/today_ipt_ort.js"></script>
		 <script src="plugins/today_ipt_icu.js"></script>

    </body>
</html>
