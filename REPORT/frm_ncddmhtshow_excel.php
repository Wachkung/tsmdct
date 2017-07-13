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
    </head>
	<div >
		<table>
			<thead>
				<tr>
					<th width="5%"align="center">No.</th>
					<th width="5%"align="center">HN</th>
					<th width="15%"align="center">วันที่ขึ้นทะเบียน</th>
					<th width="12%"align="center">ชื้อ - สกุล</th>
					<th width="5%"align="center">เพศ</th>
					<th width="5%"align="center">อายุ</th>
					<th width="10%"align="center">เลขบัตรประชาชน</th>
					<th width="5%"align="center">ICD10</th>
					<th width="5%"align="center">เลขที่</th>
					<th width="10%"align="center">หมู่</th>
					<th width="8%"align="center">ตำบล</th>
					<th width="8%"align="center">อำเภอ</th>
					<th width="10%"align="center">จังหวัด</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$total=0; $no=1;
				$sql="select 
						ovst.hn as HN, 
						ovst.vstdttm as 'วันที่ขึ้นทะเบียน',
						pt.fname as 'ชื้อ',
						pt.lname as 'สกุล',
						if(pt.male = 1,'ชาย','หญิง') as 'เพศ',
						ROUND((date(ovst.vstdttm)- pt.brthdate)/10000) AS age,
						pt.pop_id as 'เลขบัตรประชาชน',
						ovstdx.icd10 as 'ICD10',
						pt.addrpart as 'บ้านเลขที่',
						mooban.namemoob as 'ที่อยู่',
						tumbon.nametumb as 'ตำบล',
						ampur.nameampur as 'อำเภอ',
						changwat.namechw as 'จังหวัด'
						from hi.ovst 
						inner join hi.ovstdx on ovst.vn=ovstdx.vn 
						inner join hi.pt on ovst.hn=pt.hn
						INNER JOIN hi.mooban ON mooban.chwpart = pt.chwpart AND mooban.amppart = pt.amppart AND mooban.tmbpart = pt.tmbpart AND mooban.moopart = pt.moopart
						INNER JOIN hi.tumbon ON tumbon.chwpart = mooban.chwpart AND tumbon.amppart = mooban.amppart AND tumbon.tmbpart = mooban.tmbpart
						INNER JOIN hi.ampur ON ampur.amppart = tumbon.amppart AND ampur.chwpart = tumbon.chwpart
						INNER JOIN hi.changwat ON changwat.chwpart = ampur.chwpart 
						where ((ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'E10' and 'E149')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01) 
						and ovst.hn in (select ovst.hn from hi.ovst inner join hi.ovstdx on ovst.vn=ovstdx.vn  
						where (ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'I10' and 'I159')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01))) 
						or ((ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'I10' and 'I159')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01) 
						and ovst.hn in (select ovst.hn from hi.ovst inner join hi.ovstdx on ovst.vn=ovstdx.vn  
						where (ovst.vstdttm between '$sdate' and '$edate') and (ovstdx.icd10 between 'E10' and 'E149')and (pt.moopart in (1,2,3,5,6,12,13,10,11))and (pt.amppart = 20) and (pt.tmbpart = 01)))  GROUP BY hn order by hn;
						"; 
				$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
			?>
				<tr>
					<td align="center"><?=$no?></td>
					<td><?=$data['0']?></td>
					<td><?=$data['1']?></td>
					<td><?=$data['2']?>  <?=$data['3']?></td>
					<td><?=$data['4']?></td>
					<td><?=$data['5']?></td>
					<td><?=$data['6']?></td>
					<td><?=$data['7']?></td>
					<td><?=$data['8']?></td>
					<td><?=$data['9']?></td>
					<td><?=$data['10']?></td>
					<td><?=$data['11']?></td>
					<td><?=$data['12']?></td>
				<?php $no++; } ?>
				</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
	</body>
</html>
