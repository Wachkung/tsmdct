<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<?php
	$sql1 = mysql_query("SELECT * FROM risk2_datarisk where daterigter BETWEEN '$strdate' and '$enddate' ");
   $records1 = mysql_num_rows($sql1);
?>
<div id="dashboard-header" class="row">
	<div class="col-xs-10 col-sm-4">
		<h3>โปรแกรมความเสี่ยง ปีงบ 2559</h3><br>
        <h4>จำนวนความเสี่ยงทั้งหมด <?=$records1?> เหตุการณ์</h4>
        
	</div>
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-12 col-sm-8 col-md-7 pull-right">
		<div class="row">
        	<?php 
				//จำนวนความเสี่ยง
				$sql2 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.noteceo != ' ' and daterigter BETWEEN '$strdate' and '$enddate' ");
			   	$records2 = mysql_num_rows($sql2);
			?>
			<div class="col-xs-6">
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-h-square"></i> <?=$records2?>
					<span>อุบัติการณ์แก้ไขแล้ว</span>
				</div>
			</div>
            <?php 
				//จำนวนอุบัติการณ์
				$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.noteceo = ' '  and daterigter BETWEEN '$strdate' and '$enddate' ");
			   	$records1 = mysql_num_rows($sql1);
			?>
			<div class="col-xs-6">
				<div class="sparkline-dashboard" id="sparkline-3"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa fa-h-square"></i> <?=$records1?>
					<span>อุบัติการณ์รอแก้ไข</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Dashboard 1-->

<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#" class="tab-link" id="overview">สรุปภาพรวม</a></li>
			<li><a href="#" class="tab-link" id="clients">สรุปหน่วยงานรายงาน</a></li>
			<li><a href="#" class="tab-link" id="clients1">สรุปหน่วยงานรับรายงาน</a></li>

		</ul>
	</div>

	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<h4 class="page-header">ความเสี่ยงแยกตามโปรแกรม</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
						<tr>
							<th>โปรแกรมความเสี่ยง</th>
							<th>จำนวน</th>
						</tr>
					</thead>
					<tbody>
														<tr>
															<?php 
																//จำนวน P1
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R100' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P1) โปรแกรมด้านคลินิค</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php 
																//จำนวน P2
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R200' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P2) โปรแกรมด้านระบบยา/สารน้ำ/เลือด</td>
															<td class="m-price" align="center"><?=$records1?></td>
														</tr>
														<tr>
															<?php 
																//จำนวน P3
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R300' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P3) โปรแกรมด้านการติดเชิ้อในโรงพยาบาล</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php 
																//จำนวน P4
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R400'and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P4) โปรแกรมด้านเครื่องมือ/อุปกรณ์</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php 
																//จำนวน P5
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R500' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P5) โปรแกรมด้านสารสนเทศ/ เวชระเบียน</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php 
																//จำนวน P6
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R600' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P6) โปรแกรมด้านโครงสร้างทางกายภาพ/อาชีวอนามัยและความปลอดภัย</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
														<tr>
															<?php 
																//จำนวน P7
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R700' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P7) โปรแกรมด้านข้อร้องเรียน</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>

														<tr>
															<?php 
																//จำนวน P8
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R800' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P8) โปรแกรมด้านบุคลากร/การประสานงาน</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>

														<tr>
															<?php 
																//จำนวน P9
																$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.fromevent = 'R900' and daterigter BETWEEN '$strdate' and '$enddate' ");
																$records1 = mysql_num_rows($sql1);
															?>
															<td class="m-ticker">(P9) โปรแกรมด้านอื่นๆ</td>
															<td class="m-price" align="center"><?=$records1?></td>
															
														</tr>
					</tbody>
				</table>
               
			</div>
            
            
			<div class="col-xs-12 col-md-6">
				<div id="ow-donut" class="row">
                	<?php 
								//จำนวนทั่วไป
								$sqlA = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport  != '0' and daterigter BETWEEN '$strdate' and '$enddate' ");
								$recordsA = mysql_num_rows($sqlA);
					?>
					<div class="col-xs-6">
						<br>
                        <p align="left">ความเสี่ยงทั่วไป = <span class='badge bg-green'><?=$recordsA?></span></p>
					</div>

                     <?php 
								//จำนวนคลินิค
								$sqlB = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen != '0' and daterigter BETWEEN '$strdate' and '$enddate' ");
								$recordsB = mysql_num_rows($sqlB);
					?>
					<div class="col-xs-6">
						<br>
                        <p align="left">ความเสี่ยงทางคลินิค = <span class='badge bg-green'><?=$recordsB?></span></p>
					</div>
				</div>
                
				<div id="ow-summary" class="row">
					<div class="col-xs-12">
                    <br>
						<h4 class="page-header">&Sigma; ความเสี่ยงทั่วไป <?=$recordsA?></h4>
                        
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='A' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ A<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='F' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ F<b><?=$records1?></b></div>
								</div>
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='B' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ B<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='G' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ G<b><?=$records1?></b></div>
								</div>
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='C' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>
									<div class="col-xs-6">ความรุนแรงระดับ C<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='H' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>
									<div class="col-xs-6">ความรุนแรงระดับ H<b><?=$records1?></b></div>
								</div>
                                <div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='D' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ D<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='I' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ I<b><?=$records1?></b></div>
								</div>
                                <div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.typereport='E' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ E<b><?=$records1?></b></div>
								</div>

							</div>
						</div>
					</div>
				</div><!--ปิด ow-summary row-->    
                
                <div id="ow-summary" class="row">
					<div class="col-xs-12">
                    <br>
						<h4 class="page-header">&Sigma; ความเสี่ยงทางคลินิค <?=$recordsB?></h4>
                        
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='A' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ A<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='F' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ F<b><?=$records1?></b></div>
								</div>
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='B' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ B<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='G' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ G<b><?=$records1?></b></div>
								</div>
								<div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='C' and daterigter BETWEEN '$strdate' and '$enddate'  "); $records1 = mysql_num_rows($sql1);	
								?>
									<div class="col-xs-6">ความรุนแรงระดับ C<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='H' and daterigter BETWEEN '$strdate' and '$enddate'  "); $records1 = mysql_num_rows($sql1);	
								?>
									<div class="col-xs-6">ความรุนแรงระดับ H<b><?=$records1?></b></div>
								</div>
                                <div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='D' and daterigter BETWEEN '$strdate' and '$enddate'  "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ D<b><?=$records1?></b></div>
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='I' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ I<b><?=$records1?></b></div>
								</div>
                                <div class="row">
                                <?php
									$sql1 = mysql_query("SELECT * FROM risk2_datarisk WHERE risk2_datarisk.commen='E' and daterigter BETWEEN '$strdate' and '$enddate'  "); $records1 = mysql_num_rows($sql1);	
								?>	
									<div class="col-xs-6">ความรุนแรงระดับ E<b><?=$records1?></b></div>
								</div>

							</div>
						</div>
					</div>
				</div><!--ปิด ow-summary row-->   
			</div>
		</div>
		<!--End Dashboard Tab 1-->
		<!--Start Dashboard Tab 2-->
		<div id="dashboard-clients" class="row" style="visibility: hidden; position: absolute;">
        
			<div class="row one-list-message">
				<div class="col-xs-6"><b>ชื่อหน่วยงานรายงานความเสี่ยง</b></div>
				<div class="col-xs-2">ความเสี่ยง ทั้งหมด</div>
                <div class="col-xs-2">แก้ไขแล้ว</div>
                <div class="col-xs-2">ยังไม่ได้แก้ไข</div>
				
			</div>
        <?php
			$sql=" SELECT * FROM `risk2_departreport` "; 
           $result = mysql_query($sql); while($data = mysql_fetch_array($result)) {  
		   $DD=$data['CODE'];
		   
		   $sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departreport='$DD' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);
		?>
            
			<div class="row one-list-message">
				<div class="col-xs-6"><b><?=$data['DeptName'];?></b></div>
				<div class="col-xs-2"><?=$records1?></div>
                <?  $sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departreport='$DD' and noteceo!=' ' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1); ?>
                <div class="col-xs-2"><?=$records1?></div>
                <?  $sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departreport='$DD' and noteceo=' ' and daterigter BETWEEN '$strdate' and '$enddate'  "); $records1 = mysql_num_rows($sql1); ?>
                <div class="col-xs-2"><?=$records1?></div>
			</div>
		<?php }?>
		</div>
		<!--End Dashboard Tab 2-->
		<!--Start Dashboard Tab 3-->
		<div id="dashboard-clients1" class="row" style="visibility: hidden; position: absolute;">
        
			<div class="row one-list-message">
				<div class="col-xs-6"><b>ชื่อหน่วยงานรับรายงานความเสี่ยง</b></div>
				<div class="col-xs-2">ความเสี่ยง ทั้งหมด</div>
                <div class="col-xs-2">แก้ไขแล้ว</div>
                <div class="col-xs-2">ยังไม่ได้แก้ไข</div>
				
			</div>
        <?php
			$sql=" SELECT * FROM `risk2_departreport` "; 
           $result = mysql_query($sql); while($data = mysql_fetch_array($result)) {  
		   $DD=$data['CODE'];
		   
		   $sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departrespon='$DD' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1);
		?>
            
			<div class="row one-list-message">
				<div class="col-xs-6"><b><?=$data['DeptName'];?></b></div>
				<div class="col-xs-2"><?=$records1?></div>
                <?php
					$sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departrespon='$DD' and noteceo!=' ' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1); 
				?>
                <div class="col-xs-2"><?=$records1?></div>
                <?php
					$sql1 = mysql_query("SELECT * FROM `risk2_datarisk` where departrespon='$DD' and noteceo=' ' and daterigter BETWEEN '$strdate' and '$enddate' "); $records1 = mysql_num_rows($sql1); 
				?>
                <div class="col-xs-2"><?=$records1?></div>
			</div>
		<?php }?>
		</div>
		<!--End Dashboard Tab 3-->

	</div>
	<div class="clearfix">  </div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
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
