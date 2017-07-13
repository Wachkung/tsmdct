<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");

	session_start();

	include("../includes/connriskdb.php"); 
	include("../includes/config.inc.php"); 
		
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['LA'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}

    $data = $_GET['data'];
    $val = $_GET['val'];

         if ($data=='fromevent') { 
              echo "<select class='form-control' name='fromevent' onChange=\"dochange('dataevent', this.value)\">";
              echo "<option value=''>- เลือกโปรแกรมด้านความเสี่ยง -</option>\n";
              $result=mysql_query("select codegroup, namegroup from risk2_group order by codegroup");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[codegroup]'>$row[codegroup].$row[namegroup]</option>" ;
              }
         } else if ($data=='dataevent') {
              echo "<select class='form-control' name='dataevent'>\n";
              echo "<option value=''>- เลือก รูปแบบของเหตุการณ์ -</option>\n";
              $result=mysql_query("select codegroup,namerisk,coderisk from risk2_risk WHERE codegroup= '$val' ORDER BY coderisk");
              while($row = mysql_fetch_array($result)){
                   echo "<option value='$row[coderisk]'>$row[coderisk].$row[namerisk]</option> \n" ;
              }
         }
         echo "</select>\n";

        echo mysql_error();
?>
    <script language=Javascript>
			function validate() {
			if(document.frmMain.fromevent.value == "")
			{	alert(' เลือกโปรแกรมความเสี่ยง ');	
						document.frmMain.fromevent.focus();
						return false;
			} 	

			if(document.frmMain.dataevent.value == "")
			{	alert(' เลือกรูปแบบเหตุการ ');	
						document.frmMain.dataevent.focus();
						return false;
			} 	
			}
	</script>
