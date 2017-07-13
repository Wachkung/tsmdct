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
	if($_SESSION['RISK'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}


?>  
<?php if(isset($_GET['fromevent']) && $_GET['fromevent']!=""){?>  
  <option value=''>- เลือก รูปแบบของเหตุการณ์ -</option>  
  <?php  
  $q="select codegroup,namerisk,coderisk from risk2_risk WHERE codegroup='".$_GET['fromevent']."' ORDER BY coderisk";  
  $qr=mysql_query($q);  
  while($rs=mysql_fetch_array($qr)){  
  ?>  
  <option value="<?=$rs['coderisk']?>"> <?=$rs['coderisk']?>.<?=$rs['namerisk']?></option>  
  <?php } ?>  
 <?php }else{ ?>  
  <option value="">- เลือก รูปแบบของเหตุการณ์1 -</option>  
<?php } ?>  