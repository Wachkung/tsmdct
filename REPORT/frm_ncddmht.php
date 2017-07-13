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
                       <section class="col-lg-10 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">รายงาน NCD เบาหวาน+ความดัน ในเขต รพ.</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="frm_ncddmhtshow.php" method="post" enctype="multipart/form-data" name="frmMain" 
                                    onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
											<div class="input-group-addon">
                                                วันที่ :
                                            </div>
                                            <input type="text" class="form-control" id="sdate" name="sdate"/> 

											<div class="input-group-addon"> 
												ถึง :</i>
                                            </div>
                                            <input type="text" class="form-control"  id="edate" name="edate"/> 

										</div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <div class="form-group">
                                        <button name="btnSubmit" type="submit" class="btn btn-primary">ออกรายงาน</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                    </form>	
                                </div> <!-- /.box-footer -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- add new calendar event modal -->
        <script src="../includes/bootstrap/js/jquery.min.js"></script>
        <script src="../includes/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

		<!-- InputMask -->
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        
        <!-- DATA TABES SCRIPT -->
        <script src="../includes/bootstrap/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        
        <!-- date-range-picker -->
        <script src="../includes/bootstrap/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        
		<!-- bootstrap color picker -->
        <script src="../includes/bootstrap/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        
		<!-- bootstrap time picker -->
        <script src="../includes/bootstrap/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
       
		<!-- AdminLTE App -->
        <script src="../includes/bootstrap/js/AdminLTE/app.js" type="text/javascript"></script>
        
		<!-- AdminLTE for demo purposes -->
        <script src="../includes/bootstrap/js/AdminLTE/demo.js" type="text/javascript"></script>

        <script src="../includes/bootstrap/js/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>
        
		<!-- fullCalendar -->
        <script src="../includes/bootstrap/js/moment.min.js" type="text/javascript"></script>
        <script src="../includes/bootstrap/js/fullcalendar.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="../includes/bootstrap/js/lang/th.js"></script>
		<link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/smoothness/jquery-ui-1.7.2.custom.css">
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../includes/bootstrap/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript">
		$(function(){
			// แทรกโค้ต jquery
			$("#sdate").datepicker({dateFormat: 'yy-mm-dd'});
			$("#edate").datepicker({dateFormat: 'yy-mm-dd'});
			// รูปแบบวันที่ที่ได้จะเป็น 2009-08-16
		});
		</script>
	</body>
</html>
