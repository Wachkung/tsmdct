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
				<h4 class="page-header">เอกสาร Download </h4>
                            <div  class="alert alert-warning" role="alert">
                                <div class="alert alert-danger" role="alert">
                                    <h3 class="box-title">เอกสารทั้งหมด</h3>
                                </div><!-- /.box-header -->
                                <div  class="alert alert-info" role="alert">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="5%">No.</th>
                                                <th width="42%">หัวข้อ</th>
                                                <th width="5%"><i class="fa fa-download"></i></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM it_file_download  order by it_file_download.dupdate DESC"; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$total=$total+$data['price_repair'];	
											
										?>
                                            <tr class="alert alert-success" role="alert">
                                            	<td><?=$no?></td>
                                                <td><?=$data['file_title']?></td>
                                                <td><a href="/tsdch/IT/file_download/<?=$data['file_name']?>"  target="_blank"><i class="fa fa-download"></i></a></td>
                                            
                                            </tr>
                                        <?php  $no++;  } ?>
                                       
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
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
