<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="#">โรงพยาบาลตาลสุม</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<section class="col-xs-12 ">    
		<div id="dashboard">
        
			<div class="row one-list-message">
				<div class="col-xs-4">หัวข้อข่าว</div>
				<div class="col-xs-6">เนื่อหาข่าว</div>
				
			</div>
        <?php
			$sql=" SELECT * FROM `news` where id='$id'"; 
           $result = mysql_query($sql); while($data = mysql_fetch_array($result)) 
			   {  
		   $sql1 = mysql_query("SELECT * FROM `news` "); $records1 = mysql_num_rows($sql1);
	     
		?>
			<div class="row one-list-message">
				<div class="col-xs-4"><?=$data['topic'];?></div>
				<div class="col-xs-6"><?=$data['posted'];?></div>
			</div>
		<?php  } ?>
		</div>
</section><!-- /.Left col -->

<script type="text/javascript">
// Array for random data for Sparkline
var sparkline_arr_1 = SparklineTestData();
var sparkline_arr_2 = SparklineTestData();
var sparkline_arr_3 = SparklineTestData();
$(document).ready(function() {
	// Make all JS-activity for dashboard
	DashboardTabChecker();
	// Load Knob plugin and run callback for draw Knob charts for dashboard(tab-servers)
	LoadKnobScripts(DrawKnobDashboard);
	// Load Sparkline plugin and run callback for draw Sparkline charts for dashboard(top of dashboard + plot in tables)
	LoadSparkLineScript(DrawSparklineDashboard);
	// Load Morris plugin and run callback for draw Morris charts for dashboard
	LoadMorrisScripts(MorrisDashboard);
	// Make beauty hover in table
	$("#ticker-table").beautyHover();
});
</script>
