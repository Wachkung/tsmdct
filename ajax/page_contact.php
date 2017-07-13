<?php

	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
$catId  = (isset($_GET['c']) && $_GET['c'] != '1') ? $_GET['c'] : 0;

$stringMail = '';
$name = '';
$last = '';
$phone = '';
$email = '';
if(isset($_SESSION['plaincart_customer_id'])) {
	$userProfile = getCustomerProfile(); 
	extract($userProfile);
	$name = $user_first_name;
	$last = $user_last_name;
	$phone = $user_phone;
	$email = $user_email;
} 
if(isset($_POST['txtUserFirstName'])){
	if(md5($_POST['captcha']) == $_SESSION['captchaKey']){
		$title = (isset($_POST['txtTitle']))?$_POST['txtTitle']:'';
		$name = (isset($_POST['txtUserFirstName']))?$_POST['txtUserFirstName']:'';
		$last = (isset($_POST['txtUserLastName']))?$_POST['txtUserLastName']:'';
		$phone = (isset($_POST['txtUserPhone']))?$_POST['txtUserPhone']:'';
		$email = (isset($_POST['txtUserEmail']))?$_POST['txtUserEmail']:'';
		$data = (isset($_POST['txtData']))?$_POST['txtData']:'';

		$shopEmail  = $shopConfig['email'];

		$subject = '<h3>ข้อคิดเห็น เรื่อง - '.$title.'</h3>';
		$stringMail .= '<p>ชื่อลูกค้า : '.$name.' '.$last.'</p>';
		$stringMail .= '<p>เบอร์โทรศัพท์ : '.$phone.'</p>';
		$stringMail .= '<p>อีเมล : '.$email.'</p>';
		$stringMail .= '<h4>ข้อคิดเห็น-เสนอแนะ</h4>';
		$stringMail .= '<p>เนื้อหา : '.$data.'</p>';
		$stringMail .= '<p>อีเมลร้านค้า : '.$shopEmail.'</p>';
	
		$headers = 'From: '.$email."\r\n".
				'Reply-To: '.$email."\r\n" .
				'X-Mailer: PHP/' . phpversion();
		@mail($shopEmail, $subject, $stringMail, $headers); 
		setSuccess('ขอขอบคุณสำหรับคำแนะนำติชม');
 	}else {
 		setError('คุณกรอกรหัส Captcha ไม่ถูกต้อง');
 	}
}

?>
	
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>Contact</li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<div class="row-fluid">
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-12">
				<h4 class="page-header">ติดต่อ โรงพยาบาลตาลสุม </h4>
                   <div  class="alert alert-warning" role="alert">
                              <div  class="alert alert-info" role="alert">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
											<table width="100%" border="0" cellspacing="0" cellpadding="10">
											 <tr>
											  <td>
												<p>หน่วยงาน : <?php echo 'โรงพยาบาลตาลสุม'; ?><br>
												Address : <?php echo '99 หมู่ 2 ตำบลตาลสุม อำเภอตาลสุม จังหวัดอุบลราชธานี 34330'; ?><br>
												Phone : <?php echo '045 - 427137'; ?><br>
												Email : <a href="mailto:<?php echo 'tansumhosp@tshpt.mail.go.th'; ?>"><?php echo 'tansumhosp@tshpt.mail.go.th'; ?></a><br>
												Facebook : <a href="https://www.facebook.com/TalSumHosPiTal?ref=hl"> TalSumHosPiTal </a> << หรือ >> Line : <a href="http://line.me/ti/p/%40gjh5866y"><img height="36" border="0" alt="เพิ่มเพื่อน" src="http://biz.line.naver.jp/line_business/img/btn/addfriends_en.png"></a></p><br> 
											   </td>
											 </tr>
											</table>

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

<script>

$(function(){
	var n = true;
	$.ajax({
  		url:'include/miniCartAjax.php',
  		data:{link:n},
  		type:'get',
  		success:function(data){
  			$("#cart-content-mini").empty().append(data).fadeIn(1000);
  		}
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
