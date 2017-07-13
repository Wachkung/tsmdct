<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ตรวจสอบสิทธิ์การใช้งานระบบกอน!";
		echo"<meta http-equiv='refresh' content='2;URL=../main.php'>";
		exit();
	}
	
$sdate=$_GET['sdate'];
$edate=$_GET['edate'];
	$strSQLuser = "SELECT rm_depart.depart,rm_depart.CODE,person.quality FROM person INNER JOIN rm_depart on rm_depart.`CODE` = person.depart  WHERE idcard = '$IDCARD1' ";
	$objQueryuser = mysql_query($strSQLuser);
	$objResultuser = mysql_fetch_array($objQueryuser);
	$depart=$objResultuser["CODE"];
	$quality=$objResultuser["quality"];

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
									<div class="box-body table-responsive">
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
                                                 <th width="5%">No.</th>
                                                <th width="15%">ผู้รายงาน</th>
                                                <th width="10%">วันที่รายงาน</th>
                                                <th width="15%">โปรแกรมความเสี่ยง</th>
                                                <th width="15%">เหตุการณ์</th>
                                                <th width="15%">ความรุนแรงคลิคิก</th>
                                                <th width="15%">ความรุนแรงทั่วไป</th>
                                                <th width="30%">วิเคราะห์และการอธิบาย</th>
                                                <th width="15%">ความเห็นหัวหน้าฝ่าย</th>
                                               <th width="15%">วิเคราะห์และแนวทางแก้ไข</th>
                                               <th width="15%">หมายเหตุ</th>
												</tr>
											</thead>
											<tbody>
											<?php   
												$total=0; $no=1;
												$sql="SELECT risk2_datarisk.id,person.title,person.`name`,person.lastname,risk2_datarisk.daterigter,risk2_group.namegroup,risk2_risk.namerisk,risk2_datarisk.commen,risk2_datarisk.typereport,risk2_datarisk.notepatient,risk2_datarisk.notehead,risk2_datarisk.noteceo,risk2_datarisk.notedepart FROM risk2_datarisk 
												INNER JOIN risk2_group ON risk2_group.codegroup=risk2_datarisk.fromevent
												INNER JOIN risk2_risk ON risk2_risk.coderisk=risk2_datarisk.dataevent
												INNER JOIN person ON risk2_datarisk.`name`= person.idcard
												WHERE  (departrespon = '$depart' or departrespon = '$quality' or departreport = '$depart' or departreport = '$quality') and risk2_datarisk.datereport BETWEEN '".$sdate."' and '".$edate."'
												ORDER BY fromevent;"; 
												$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$data['1']?><?=$data['2']?>  <?=$data['3']?></td>
													<td><?=LongThaiDate($data['4'])?></td>
													<td><?=$data['5']?></td>
													<td><?=$data['6']?></td>
													<td><?=$data['7']?></td>
													<td><?=$data['8']?></td>
													<td><?=$data['9']?></td>
													<td><?=$data['10']?></td>
													<td><?=$data['11']?></td>
													<td><?=$data['12']?></td>
											<?php $no++; } ?>
											</tbody>
										</table>
									</div><!-- /.box-body -->
	</body>
</html>
