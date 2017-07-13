<?php
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
?>
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li>โรงพยาบาลตาลสุม</li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 2-->
<!--End Dashboard 2-->

<!--Start Dashboard 3-->
<?//	include("../includes/connriskdb.php"); 
?>
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
					<tbody>
						<div width="641" class="alert alert-warning" role="alert">
							<table width="100%" border="0">
						         <div align="center" class="alert alert-danger" role="alert">
								   <h3><strong> ผู้อำนวยการโรงพยาบาลตาลสุม</strong></h2>
								 </div><br>
								  <div align="center"class="alert alert-info" role="alert">
									<p><img src="img/personnel/1387339353_1234561.jpg" width="156" height="198"  alt=""/></p>
									<p>&nbsp;</p>
								  </div>
						         <div align="center" class="alert alert-info" role="alert">
								   <h3><strong> นายแพทย์ชานนท์  พันธ์นิกุล</strong></h2>
								 </div><br>
							</table>
						</div>
						 <div align="center"  class="alert alert-warning" role="alert">
						        <div align="center" class="alert alert-danger" role="alert">
                                    <h3 class="box-title"align="center">ข้อมูลบุคลากรแยกประเภทตำแหน่ง</h3>
                                </div><!-- /.box-header -->
						        <div align="center" class="alert alert-info" role="alert">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="alert alert-warning" role="alert">
                                                 <th width="5%"align="center" >No.</th>
                                                <th width="15%"align="center">ประเภทตำแหน่ง</th>
                                                <th width="5%"align="center">จำนวน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?   
											$total=0; $no=1;
											$sql="SELECT person.typetext ,COUNT(person.idcard) FROM person WHERE person.personla !='' GROUP BY  person.typetext "; 
											$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {

										?>
                                            <tr class="alert alert-success" role="alert">
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['0']?></td>
                                                <td align="center"><?=$data['1']?></td>
                                        <? $no++; } ?>
                                        </tbody>
                                    </table>
							</div>

							<div align="center"  class="alert alert-warning" role="alert">
								<div class="fb-page" data-href="https://www.facebook.com/TalSumHosPiTal/" data-tabs="timeline" data-width="600"data-heigth="1800" data-small-header="false" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
									<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/TalSumHosPiTal/"><a href="https://www.facebook.com/TalSumHosPiTal/">โรงพยาบาลตาลสุม จังหวัดอุบลราชธานี</a></blockquote></div>
								</div>						       
                                    
							</div>


					</div>

				</tbody>
			</div>
           
 			<div id="ow-marketplace" class="col-sm-12 col-md-6">
					<tbody>
                            <div  class="alert alert-warning" role="alert">
                                <div class="alert alert-danger" role="alert" align="center">
                                    <h3 class="box-title">ข่าวประชาสัมพันธ์</h3>
                                </div><!-- /.box-header -->
                                        <?php    
											$no=1;
											$sql="SELECT * FROM	 news WHERE news.category ='1' order by news.id DESC LIMIT 5 "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
									 <div class="alert alert-info" role="alert">
										  <div class="alert alert-success" role="alert">
											<h3><?=$data['topic']?></h3>
											<p><?=$data['posted']?></p>
										  </div>
									</div><!-- /.box-body -->
								       <?php }   ?>
					</tbody>
			</div>
                            <div  class="alert alert-warning" role="alert">						
                                <div class="alert alert-danger" role="alert">
                                    <h3 class="box-title">เอกสาร 20 อันดับล่าสุด</h3>
                                </div><!-- /.box-header -->
                                <div  class="alert alert-info" role="alert">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                            	<th width="8%">No.</th>
                                                <th width="42%">หัวข้อ</th>
                                                <th width="5%"><i class="fa fa-download"></i></th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   $total=0; $no=1;
											$sql=" SELECT * FROM it_file_download  order by it_file_download.dupdate DESC LIMIT 10"; 
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


<!--End Dashboard -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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