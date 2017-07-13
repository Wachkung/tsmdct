<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>เอกสาร Download</li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<div class="row-fluid">
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-12">
				<h4 class="page-header">ข่าวประชาสัมพันธ์ </h4>
                            <div  class="alert alert-warning" role="alert">
                                <div class="alert alert-danger" role="alert">
                                    <h3 class="box-title">ข่าวประชาสัมพันธ์ทั้งหมด</h3>
                                </div><!-- /.box-header -->
                                <div class="alert alert-info" role="alert">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No.</th>
                                                <th width="20%">หัวข้อข่าว</th>
                                                <th width="200">เนื่อหาข่าว</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                        <?php    
											$no=1;
											$sql=" SELECT * FROM news  order by news.id DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr class="alert alert-success" role="alert">
                                                <td><?=$no?></td>
                                                <td><?=$data['topic']?></td>
                                                <td><?=$data['posted']?></td>
                                            </tr>
                                        <?php  $no++;  } ?>
                                        </tbody>
                                        
                                    </table>
                                </div><!-- /.box-footer -->
                            </div><!-- /box box-solid box-primary -->
			</div>

		</div>
	<div class="clearfix">  </div>
</div>
<!--End Dashboard 2 -->
<div class="row-fluid">
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
		</div>
	<div class="clearfix">  </div>
</div>


<div style="height: 40px;"></div>
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
