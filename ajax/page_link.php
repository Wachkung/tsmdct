<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>หน่วยงานที่เกี่ยวข้อง</li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<div class="row-fluid">
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<h4 class="page-header">เว็บโรงพยาบาล</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
						  <li><a href="http://www.sappasit.go.th">- สรรพสิทธิประสงค์</a></li>
						  <li><a href="http://www.50pansa.go.th/">- ๕๐ พรรษา มหาวชิราลงกรณ</a></li>
						  <li><a href="http://www.detudomhospital.org/">- สมเด็จพระยุพราชเดชอุดม</a></li>
						  <li><a href="http://www.warin.go.th">- วารินชำราบ</a></li>
						  <li><a href="http://www.knhosp.go.th/">- เขื่องใน</a></li>
						  <li><a href="http://www.m30hosp.com">- ม่วงสามสิบ</a></li>
						  <li><a href="http://www.dmdhospital.com/">- ดอนมดแดง</a></li>
						  <li><a href="http://www.tansumhospital.go.th">- ตาลสุม</a></li>
						  <li><a href="http://www.laosuaekok.go.th">- เหล่าเสือโก้ก</a></li>
						  <li><a href="http://www.trakanhospital.org">- ตระการพืชผล</a></li>
						  <li><a href="http://www.kmhos.org/main/">- เขมราฐ</a></li>
						  <li><a href="http://www.smmhospital.com/">- ศรีเมืองใหม่</a></li>
						  <li><a href="http://www.kkphospital.go.th">- กุดข้าวปุ้น</a></li>
						  <li><a href="http://www.psh.go.th/">- โพธิ์ไทร</a></li>
						  <li><a href="http://www.cupnatan.com/">- นาตาล</a></li>
						  <li><a href=" http://www.pbhospital.go.th">- พิบูลมังสาหาร</a></li>
						  <li><a href="http://www.srhospital.go.th">- สำโรง</a></li>
						  <li><a href="http://www.khongch.go.th">- โขงเจียม</a></li>
						  <li><a href="http://www.sirinhospital.go.th">- สิรินธร</a></li>
						  <li><a href="http://www.bundharikhos.com/">- บุณฑริก</a></li>
						  <li><a href="http://namyuenhospital.com/NYHOSP/index.aspx">- น้ำยืน</a></li>
						  <li><a href="http://www.nlhospital.go.th">- นาจะหลวย</a></li>
						  <li><a href="http://www.thungsrihospital.go.th">- ทุ่งศรีอุดม</a></li>
						  <li><a href="http://numkhunhospital.com">- น้ำขุ่น</a></li>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<h4 class="page-header">สำนักงานสาธารณสุขอำเภอ</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
					  <li><a href="http://www.ssomuang.com/">- เมือง</a></li>
					  <li><a href="http://www.ssokn.com/">- เขื่องใน</a></li>
					  <li><a href="http://sso14.net/">- ม่วงสามสิบ</a></li>
					  <li><a href="http://ssodmd.thaiddns.com/">- ดอนมดแดง</a></li>
					  <li><a href="http://www.thaikok.net/">- เหล่าเสือโก้ก</a></li>
					  <li><a href="http://www.ssotrakarn.com">- ตระการพืชผล</a></li>
					  <li><a href="http://www.khemmarat.org">- เขมราฐ</a></li>
					  <li><a href="http://www.ssophosai.in.th">- โพธิ์ไทร</a></li>
					  <li><a href="http://www.bok.in.th/sso12/">- กุดข้าวปุ้น</a></li>
					  <li><a href="http://www.smmpho.org/">- ศรีเมืองใหม่</a></li>
					  <li><a href="http://www.ssophiboon.in.th">- พิบูลมังสาหาร</a></li>
					  <li><a href="http://www.ssokhongchiam.go.th">- โขงเจียม</a></li>
					  <li><a href="http://www.sirinthonphc.in.th">- สิรินธร</a></li>
					  <li><a href="http://www.sasukwarin.com/">- วารินชำราบ</a></li>
					  <li><a href="http://www.ssosamrong.org">- สำโรง</a></li>
					  <li><a href="http://www.ssosawang.com/">- สว่างวีระวงศ์</a></li>
					  <li><a href="http://www.ssodetudom.org/">- เดชอุดม</a></li>
					  <li><a href="http://www.buntharik.com">- บุณฑริก</a></li>
					  <li><a href="http://www.sasuknajaluay.go.th">- นาจะหลวย</a></li>
					  <li><a href="http://www.ssonamyuen.com">- น้ำยืน</a></li>
					  <li><a href="http://www.thungsriudom.go.th">- ทุ่งศรีอุดม</a></li>
					  <li><a href="http://www.phonumkhun.com">- น้ำขุ่น</a></li>
					  <li><a href="http://www.ssotansum.com/">- ตาลสุม</a></li>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<h4 class="page-header">หน่วยงานอื่นๆ</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
					  <li><a href="http://www.uboncancer.go.th">- โรงพยาบาลมะเร็งอุบลราชธานี</a></li>
					  <li><a href="http://www.prasri.go.th/">- โรงพยาบาลพระศรีมหาโพธิ์</a></li>
					  <li><a href="http://www.bcnsp.ac.th/2015/index.php">- วพบ.สรรพสิทธิประสงค์</a></li>
					  <li><a href="http://www.scphub.ac.th/newweb/">- วสส.อุบลราชธานี</a></li>
					  <li><a href="http://www.hpc7.net">- ศูนย์อนามัยที่ 7</a></li>
					  <li><a href="http://dpc7.net/">- สำนักงานป้องกันควบคุมโรคที่ 7 </a></li>
					  <li><a href="http://www.spbket10.com">- สำนักงานเขตสุขภาพที่ 10</a></li>
					  <li><a href="http://www.coopubon.com/coopubon/">- สหกรณ์ออมทรัพย์ฯ</a></li>
					</thead>
					<tbody>
					</tbody>
				</table>
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
