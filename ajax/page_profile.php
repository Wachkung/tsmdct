<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>ข้อมูลพื้นฐานโรงพยาบาล</li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<div class="row-fluid">
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-12">
				<h4 class="page-header">ข้อมูลพื้นฐานโรงพยาบาลตาลสุม</h4>
				<table id="ticker-table" class="table m-table table-bordered table-hover table-heading">
					<thead>
						<p><strong>1. ข้อมูลพื้นฐานขององค์กร </strong><br>
						  <strong>1.1 ข้อมูลทั่วไป</strong></p>
						<div align="center">
						  <table border="1" cellspacing="0" cellpadding="0" width="709">
							<tr>
							  <td width="114" rowspan="2"><br>
								ชื่อองค์กร </td>
							  <td width="64" valign="top"><p>(ไทย)</p></td>
							  <td width="532" colspan="11" valign="top"><p>โรงพยาบาลตาลสุม</p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>(อังกฤษ) </p></td>
							  <td width="532" colspan="11" valign="top"><p>TANSUM  HOSPITAL </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>ที่อยู่ </p></td>
							  <td width="595" colspan="12" valign="top"><p>99 หมู่ที่ 2  ถนนสมเด็จ      ตำบลตาลสุม  อำเภอตาลสุม  จังหวัดอุบลราชธานี  34330 </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>ประเภท/ ระดับ</p></td>
							  <td width="595" colspan="12" valign="top"><p>โรงพยาบาลชุมชน / ทุติยภูมิ    ระดับต้น (F2 )</p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>เจ้าของ / ต้นสังกัด</p></td>
							  <td width="595" colspan="12" valign="top"><p>โรงพยาบาลรัฐบาล   ต้นสังกัดในส่วนกลาง ( กรม /    กระทรวง ) กระทรวงสาธารณสุข <br>
								ต้นสังกัดในพื้นที่  สำนักงานสาธารณสุขจังหวัดอุบลราชธานี </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>จำนวนเตียง</p></td>
							  <td width="64" valign="top"><p>ขออนุญาต </p></td>
							  <td width="122" colspan="2" valign="top"><p>      30</p></td>
							  <td width="144" colspan="2" valign="top"><p>ให้บริการจริง </p></td>
							  <td width="86" colspan="3" valign="top"><p>30 เตียง</p></td>
							  <td width="104" colspan="3" valign="top"><p>อัตราครองเตียง </p></td>
							  <td width="76" valign="top"><p align="right">35.83 %</p></td>
							</tr>
							<tr>
							  <td width="177" colspan="2" valign="top"><p>ความครอบคลุมหน่วยบริการ </p></td>
							  <td width="532" colspan="11" valign="top"><p>หน่วยบริการปฐมภูมิ, ทุติยภูมิ </p></td>
							</tr>
							<tr>
							  <td width="114" rowspan="3"><p>ผู้นำสูงสุดขององค์กร</p></td>
							  <td width="64" valign="top"><p>ชื่อ </p></td>
							  <td width="532" colspan="11" valign="top"><p>นายชานนท์    พันธ์นิกุล </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>ตำแหน่ง </p></td>
							  <td width="532" colspan="11" valign="top"><p>ผู้อำนวยการโรงพยาบาลตาลสุม </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>e-mail</p></td>
							  <td width="221" colspan="3" valign="top"><p><strong><u><a href="mailto:tansumhosp@tshpt.mail.go.th">tansumhosp@tshpt.mail.go.th</a></u></strong></p></td>
							  <td width="62" colspan="2" valign="top"><p>โทรศัพท์</p></td>
							  <td width="112" colspan="3"><p align="center">045 – 427116,137,262 </p></td>
							  <td width="56" valign="top"><p>โทรสาร </p></td>
							  <td width="80" colspan="2"><p align="center">045 - 427261 </p></td>
							</tr>
							<tr>
							  <td width="114" rowspan="3"><p>ผู้ประสานงาน 1 </p></td>
							  <td width="64" valign="top"><p>ชื่อ </p></td>
							  <td width="532" colspan="11" valign="top"><p>นางศศิธร    คงสกุล </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>ตำแหน่ง </p></td>
							  <td width="532" colspan="11" valign="top"><p>พยาบาลวิชาชีพชำนาญการ    (หัวหน้าศูนย์ประสานงานคุณภาพโรงพยาบาล ) </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>e-mail</p></td>
							  <td width="221" colspan="3" valign="top"><p><a href="mailto:jumjim_kongsakul@hotmail.com"><strong>jumjim_kongsakul@hotmail.com</strong></a></p></td>
							  <td width="62" colspan="2" valign="top"><p>โทรศัพท์</p></td>
							  <td width="112" colspan="3"><p align="center">081-9671869 </p></td>
							  <td width="56" valign="top"><p>โทรสาร </p></td>
							  <td width="80" colspan="2"><p align="center">045 - 427261 </p></td>
							</tr>
							<tr>
							  <td width="114" rowspan="3"><p>ผู้ประสานงาน 2 </p></td>
							  <td width="64" valign="top"><p>ชื่อ </p></td>
							  <td width="532" colspan="11" valign="top"><p>นางสาวสราลี     บุตรวงศ์ </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>ตำแหน่ง </p></td>
							  <td width="532" colspan="11" valign="top"><p>พยาบาลวิชาชีพชำนาญการ    (เลขาศูนย์ประสานงานคุณภาพโรงพยาบาล ) </p></td>
							</tr>
							<tr>
							  <td width="64" valign="top"><p>e-mail</p></td>
							  <td width="221" colspan="3" valign="top"><p><a href="mailto:bbsaralee@hotmail.com">bbsaralee@hotmail.com</a></p></td>
							  <td width="62" colspan="2" valign="top"><p>โทรศัพท์</p></td>
							  <td width="112" colspan="3"><p align="center">085-3041866 </p></td>
							  <td width="56" valign="top"><p>โทรสาร </p></td>
							  <td width="80" colspan="2"><p align="center">045 - 427261 </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>สถานะการรับรอง</p></td>
							  <td width="64" valign="top"><p>ขั้นที่ </p></td>
							  <td width="221" colspan="3" valign="top"><p align="center">2</p></td>
							  <td width="93" colspan="3" valign="top"><p>วันหมดอายุ</p></td>
							  <td width="218" colspan="5" valign="top"><p>27  มิถุนายน  2557</p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>สาขาที่ให้บริการ</p></td>
							  <td width="595" colspan="12" valign="top"><p>ให้บริการตรวจวินิจฉัย การบำบัดรักษา    และบริการด้านสุขภาพทั่วไป    ขีดความสามารถระดับปฐมภูมิและทุติยภูมิเป็นหลักทั้งภายในและภายนอกโรงพยาบาล</p></td>
							</tr>
							<tr>
							  <td width="114" rowspan="4" valign="top"><p>ประชากรในเขตพื้นที่รับผิดชอบ</p></td>
							  <td width="65" colspan="2" valign="top"><p>ตำบล </p></td>
							  <td width="530" colspan="10" valign="top"><p>ตาลสุม , คำหว้า , สำโรง , หนองกุง , จิกเทิง ,  นาคาย</p></td>
							</tr>
							<tr>
							  <td width="65" colspan="2" valign="top"><p>อำเภอ</p></td>
							  <td width="530" colspan="10" valign="top"><p>ตาลสุม</p></td>
							</tr>
							<tr>
							  <td width="65" colspan="2" valign="top"><p>จังหวัด</p></td>
							  <td width="530" colspan="10" valign="top"><p>อุบลราชธานี </p></td>
							</tr>
							<tr>
							  <td width="65" colspan="2" valign="top"><p>เขต</p></td>
							  <td width="530" colspan="10" valign="top"><p>10 </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>Top 5 Diag. OPD</p></td>
							  <td width="595" colspan="12" valign="top"><p>Hypertension, DM, URI , Dyspepsia, Asthma </p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>Top 5  Diag. IPD </p></td>
							  <td width="595" colspan="12" valign="top"><p>Gastroenteritis,    Pneumonia, DHF, Bacterial sepsis of newborn, DM</p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>Top 5  Major Operation</p></td>
							  <td width="595" colspan="12" valign="top"><p>-</p></td>
							</tr>
							<tr>
							  <td width="114" valign="top"><p>Top 5 Cause of Death</p></td>
							  <td width="595" colspan="12" valign="top"><p>CHF , CHCA,   Hemorrhage stroke </p></td>
							</tr>
						  </table>
						  <p>&nbsp;</p>
						  <p><a><strong>1.2 อัตรากำลัง</strong></a><strong> </strong><br>
							1.2.1  แพทย์  <strong>ต่อ</strong><strong>ประชากรรวม </strong><strong>29,098  คน    </strong><strong> </strong><strong> </strong></p>
						  <p>&nbsp;</p>
						</div>
						<table border="1" cellspacing="0" cellpadding="0" width="1055">
						  <tr>
							<td width="172"><br>
							  <strong>สาขา</strong></td>
							<td width="172"><p align="center"><strong>Full time (คน    )</strong></p></td>
							<td width="172"><p align="center"><strong>Part time (ชม./สัปดาห์)</strong><strong> </strong></p></td>
							<td width="152"><p align="center"><strong>สัดส่วนประชากรในพื้นที่    (คน) </strong><strong><br>
							  ต่อบุคลากร 1 คน</strong></p></td>
						  </tr>
						  <tr>
							<td width="172"><p>-แพทย์ทั่วไป</p></td>
							<td width="172"><p align="center">3</p></td>
							<td width="172"><p align="center">0 </p></td>
							<td width="152"><p>9,699 คน    ต่อแพทย์ 1 คน </p></td>
						  </tr>
						  <tr>
							<td width="172"><p>-ทันตแพทย์</p></td>
							<td width="172"><p align="center">2</p></td>
							<td width="172"><p align="center">0 </p></td>
							<td width="152"><p>14,549 คน ต่อทันตแพทย์    1 คน </p></td>
						  </tr>
						  <tr>
							<td width="172"><p align="center"><strong>รวม</strong></p></td>
							<td width="172"><p align="center">5</p></td>
							<td width="172"><p align="center">0</p></td>
							<td width="152"><p align="center">&nbsp;</p></td>
						  </tr>
						</table>
						<p><strong>  หมายเหตุ</strong> :     แพทย์ทั่วไป มี 3 คน (รวมผู้อำนวยการ  ) ออกตรวจ OPD วันราชการทุกวัน ตั้งแต่เวลา<br>
						  08.00-16.00 น. และในวันหยุดราชการออกตรวจOPD  ตั้งแต่เวลา 08.00-12.00 น. / มีการจัดตารางเวรแพทย์<br>
						  1คน อยู่เวรตั้งแต่ในเวลา 16.00-08.00 น. ทุกวัน ในส่วนทันตแพทย์ มี  2 คน  ซึ่งทั้ง 2 คน  ทำงานวันราชการทุกวันตั้งแต่ 08.00-16.00 น. และ มีการจัดตารางเวร 1 คน  ขึ้นเวรวันเสาร์ ตั้งแต่เวลา 08.00-16.00 นาที<strong></strong></p>
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
