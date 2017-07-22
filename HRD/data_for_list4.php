<?php  
	header("Content-type:text/html; charset=UTF-8");                
	header("Cache-Control: no-store, no-cache, must-revalidate");               
	header("Cache-Control: post-check=0, pre-check=0", false);     
	// ส่วนติดต่อกับฐานข้อมูล    
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
		
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['HRD'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}


?>  
<?php if(isset($_GET['fromevent']) && $_GET['fromevent']!=""){?>  
  <option value='0'>- เลือก ระดับความรุนแรงด้านทั่วไป -</option>  
  <?php  
  $q="select risk2_risk_level.code, risk2_risk_level.name from risk2_risk_level INNER JOIN risk2_group ON risk2_group.grouplevel = risk2_risk_level.grouplevel WHERE risk2_group.codegroup='".$_GET['fromevent']."' AND risk2_group.grouplevel ='2' ORDER BY code";  
  $qr=mysql_query($q);  
  while($rs=mysql_fetch_array($qr)){  
  ?>  
  <option value="<?=$rs['code']?>"> <?=$rs['code']?>.<?=$rs['name']?></option>  
  <?php } ?>  
 <?php }else{ ?>  
  <option value="0">- เลือก ระดับความรุนแรงด้านทั่วไป -</option>  
<?php } ?>  