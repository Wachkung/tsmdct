<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	//include("../includes/connhidb.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['ROOM'] <> "1")
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
    </head>
	<div >
		<table>
			<thead>
				<tr>
											    <th width="5%">No.</th>
                                                <th width="15%">ห้องประชุม</th>
                                                <th width="10%">วันที่เริ่ม</th>
                                                <th width="10%">วันสิ้นสุด</th>
                                                <th width="8%">เวลาที่เริ่ม</th>
                                                <th width="8%">เวลาสิ้นสุด</th>
                                                <th width="15%">ผู้ขอใช้ห้องประชุม</th>
                                                <th width="20%">หัวข้อการขอจองห้องประชุม</th>  
				</tr>
			</thead>
											<tbody>
											<?php
												$total=0; $no=1;
												$sqlmeeting="SELECT meeting_room.`name` as 'ห้องประชุม',
												meeting_list.strdate,
												meeting_list.enddate,
												meeting_list.strtime,
												meeting_list.endtime,
												person.title,
												person.`name` as 'ชื่อ',
												person.lastname as 'สกุล',
												meeting_list.`name` as 'หัวเรื่อง' 
												FROM meeting_list 
												INNER JOIN meeting_room ON meeting_room.id = meeting_list.room
												INNER JOIN person on person.idcard = meeting_list.idcard
												where (meeting_list.strdate between '$sdate' and '$edate') order by meeting_list.strdate DESC;
												"; 
												$resultmeeting = mysql_query($sqlmeeting); while($datameeting = mysql_fetch_array($resultmeeting)) {
											?>
												<tr>
													<td align="center"><?=$no?></td>
													<td><?=$datameeting['0']?></td>
													<td><?=$datameeting['1']?></td>
													<td><?=$datameeting['2']?></td>
													<td><?=$datameeting['3']?></td>
													<td><?=$datameeting['4']?></td>
													<td><?=$datameeting['5']?><?=$datameeting['6']?>   <?=$datameeting['7']?></td>
													<td><?=$datameeting['8']?></td>
				<?php $no++; } ?>
				</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
	</body>
</html>