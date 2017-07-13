<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	include("../includes/connhidb.php"); 
	
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['REPORT'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบสิทธิ์การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=../main.php'>";
		exit();
	}
	
$sdate=$_GET['sdate'];
$edate=$_GET['edate'];

$strExcelFileName="Excel-All.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
?>
<!DOCTYPE html>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="5%"align="center">No.</th>
													<th width="10%"align="center">รหัสโรค</th>
													<th width="15%"align="center">ชื้อโรค</th>
													<th width="10%"align="center">จำนวนครั้ง</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sql="SELECT 
																hi.ovstdx.icd10 as ICD10,
																hi.icd101.icd10name as ICD10NAME,
																COUNT(hi.icd101.icd10) as num 
															FROM hi.ovstdx 
															INNER JOIN hi.icd101 ON hi.icd101.icd10 = hi.ovstdx.icd10 
															INNER JOIN hi.ovst ON hi.ovst.vn = hi.ovstdx.vn 
															WHERE date(hi.ovst.vstdttm) BETWEEN '$sdate' and '$edate' AND
																hi.ovstdx.icd10 NOT LIKE 'Z%' AND hi.ovstdx.icd10 NOT LIKE 'U%' AND
																hi.ovstdx.icd10 NOT BETWEEN 'O80' AND 'O849'
															GROUP BY hi.icd101.icd10 
															ORDER BY num DESC
															LIMIT 0,20"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$data['0']?></td>
													<td><?=$data['1']?></td>
													<td align="center"><?=$data['2']?></td>
											<?php $no++; } ?>
											</tbody>
										</table>
									</div><!-- /.box-body -->
	</body>
</html>
