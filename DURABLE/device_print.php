<?php 
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}
	$device_code=$_GET['device_code'];
	$strSQL = "SELECT * FROM it_device WHERE device_code = '$device_code' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
    $person = $objResult["person"];

    $strSQLperson = "SELECT * FROM person WHERE idcard = '$person' ";
	$objQueryperson = mysql_query($strSQLperson);
	$objResultperson = mysql_fetch_array($objQueryperson);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
    </head>

    <?php // include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-8 connectedSortable">    
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">หมายเลขครุภัณฑ์ <?=$objResult["serial"];?></h3>
                                </div>
                                <div class="box-body">
                                	<p align="left"><img  src="../IT/picture_device/<?=$objResult["picture"];?>"
                                    width="300"  class="img-thumbnail"/>  </p>  
                                    <p>ยี่ห้อ <code><?=$objResult["brand"];?></code> รุ่น: <code><?=$objResult["model"];?></code> </p>
                                    <p>เลขครุภัณฑ์: <code><?=$objResult["serial"];?></code></p>
                                    <p>S/N: <code><?=$objResult["serialkey"];?></code></p>
                                    <p>IP Address <code><?=$objResult["ip"];?></code> Mac: <code><?=$objResult["mac"];?></code></p>
                                    <p>รายละเอียด : <code><?=$objResult["spec"];?></code> </p>
                                    <p>สถานะ : <code><?=$objResult["status"];?></code> </p>
                                    <p>งบประมาณ : <code><?=$objResult["budgets"];?></code> </p>
                                    <p> วิธีการที่ได้มา  <code> <?=$objResult["get"];?> </code> ราคา <code><?=$objResult["price"];?> </code>
                                    วันที่ติดตั้ง <code><?=LongThaiDate($objResult["date_install"])?></code></p>
                                    <p> เลขที่เอกสารตรวจรับ  <code> <?=$objResult["file_number"];?> </code> 
                                    Download <code> <?=$objResult["file_number"];?> </code></p>
                                    <p>ของหน่วยงาน <code><?=$objResult["depart"];?></code> 
                                    ผู้ดูแล <code><?=$objResultperson["title"];?><?=$objResultperson["name"];?><?echo " ";?> <?=$objResultperson["lastname"];?></code></p>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
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
    </body>
</html>
