<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TanSumHospital : โรงพยาบาลตาลสุม</title>
		<meta name="description" content="description">
		<meta name="author" content="Risk">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<link href="./includes/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="./includes/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="./includes/bootstrap/css/font-awesome.css" rel="stylesheet">
		<link href="./includes/bootstrap/css/Righteous.css" rel="stylesheet" type="text/css">
		<link href="./includes/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="./includes/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="./includes/plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="./includes/plugins/select2/select2.css" rel="stylesheet">
		<link href="./includes/bootstrap/css/style.css" rel="stylesheet">
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span></span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="index.php">TSHospital</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-4 col-sm-2">
						  <i class="fa fa-bars"></i>
					</div>
					<nav class="navbar-right">
						<ul class="nav pagination pull-right">
							<!-- User Account: style can be found in dropdown.less -->
							<li>
								<a href="index.php">
									<i class="fa fa-home"></i> <span class="hidden-xs">Home </span>
								</a>
							</li>
							<li>
								<a href="ajax/page_download.php" class="ajax-link">
									<i class="fa fa-download"></i> <span class="hidden-xs">Download </span>
								</a>
							</li>
							<li>
								<a href="ajax/page_news.php" class="ajax-link">
									<i class="fa fa-newspaper-o"></i> <span class="hidden-xs">News </span>
								</a>
							</li>
							<li>
								<a href="ajax/page_link.php" class="ajax-link">
									<i class="fa fa-desktop"></i> <span class="hidden-xs">Agencies</span>
								</a>
							</li>
							<li>
								<a href="ajax/page_contact.php" class="ajax-link">
									<i class="fa fa-keyboard-o"></i> <span class="hidden-xs">Contact </span>
								</a>
							</li>
							<li>
								<a href="ajax/page_login.php" class="ajax-link">
									<i class="fa fa-cog"></i> <span class="hidden-xs">เข้าสู่ระบบ</span>
								</a>
							</li>
							<li>
								<a href="#" class="ajax-link">
									<span>  </span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-12">
			<div class="preloader">
				<img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>



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

<?php require_once './includes/footer.php'; ?>

</body>
</html>
