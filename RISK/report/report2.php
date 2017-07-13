<?

session_start();
	include("../includes/connriskdb.php"); 
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ระบบความเสี่ยง</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<script language='javascript' src='popcalendar.js'></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <? include "../navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ระบบความเสี่ยง 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานความเสี่ยง ที่ยังไม่ได้รับการแก้ไข</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
								<table width="100%" border="0" cellspacing="2" cellpadding="2">
								  <tr>
									<td bgcolor="#CCCCCC"> &nbsp;&nbsp;<strong class="unnamed1">รายงานแยกตามหน่วยงานที่ทำการรายงาน</strong></td>
								  </tr>
								</table>
								<br>
								<form name="form1" method="post" action="reportmainmonth_1.php">
								  <div align="center" class="unnamed1">
									<table width="500" border="0" cellspacing="2" cellpadding="2">
									  <tr>
										<td width="314"><table width="500" border="0">
										  <tr bgcolor="#BDDCEC" class="unnamed1">
											<td bgcolor="#BDDCEC">ระบุ เดือน และ พ.ศ. ที่ต้องการออกรายงาน </td>
										  </tr>
										  <tr class="unnamed1">
											<td>ตั้งแต่ วันที่ : 
											  <input name="daymonthyear1" type=text id="daymonthyear1" onKeyPress="kod_pum()" size="12">
											  <script language='javascript'>
								  
									if (!document.layers) {
									 document.write("<input type=button onclick='popUpCalendar(this, form1.daymonthyear1, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
								   }

											  </script>              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ถึงวันที่ : 
											  <input name="daymonthyear2" type=text id="daymonthyear2" onKeyPress="kod_pum()" size="12">
											  <script language='javascript'>
								  
									if (!document.layers) {
									 document.write("<input type=button onclick='popUpCalendar(this, form1.daymonthyear2, \"dd/mm/yyyy\")' value=' Date ' style='font-size:11px'>")
								   }

											  </script>              </td>
										  </tr>
										  <tr class="unnamed1">
											<td bgcolor="#BDDCEC">หน่วยงานที่รายงาน</td>
										  </tr>
										  <tr class="unnamed1">
											<td><select name="departreport" id="departreport">
											  <option value="0">กรุณาระบุหน่วยงานที่รายงาน</option>
											  <?
									
									$sql="select DeptId, DeptName from risk2_departreport order by DeptId ";
									//echo"$sql";
									
									$dbquery = mysql_db_query($dbname, $sql);
									$num_rows = mysql_num_rows($dbquery);
									$i=0;
									while ($i < $num_rows)
									{
									$result = mysql_fetch_array($dbquery);
									$codedepartreport = $result[0];
									$namedepartreport = $result[1];

									echo"<option value='$namedepartreport'>$namedepartreport</option>";

									$i++;
									}
									?>
												</select></td>
											  </tr>
											</table></td>
										  </tr>
										  <tr>
											<td>        <table width="500" border="0">
											  <tr bgcolor="#BDDCEC" class="unnamed1">
												<td>รูปแบบรายงาน</td>
											  </tr>
											  <tr bgcolor="#BDDCEC" class="unnamed1">
												<td bgcolor="#F4F4F4"><select name="sel_exportType" class="ListBox">
												  <option value="HTML" selected>HTML</option>
												  <option value="XLS">Excel</option>
												</select>
												  <input type="button" name="Button" value="   ตกลง   " onClick="reportmonth()"></td>
											  </tr>
											</table></td>
										  </tr>
										</table>
										<br>
										<br>
									</div>
								</form>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
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

<script language="javascript">
<!--//

function check_number() {
e_k=event.keyCode
if (((e_k < 48) || (e_k > 47)) && e_k != 46 && e_k != 13) {
//if (e_k != 13 && (e_k < 48) || (e_k > 57) || e_k == ) {
event.returnValue = false;
alert(" กรุณาใส่วันที่ โดยการกดปุ่ม DATE");
}
} 

function reportmonth(){



 exporttype = document.form1.sel_exportType.value;
$URL="report2_1.php?daymonthyear1="+document.forms[0].daymonthyear1.value+"&exp="+exporttype+"&daymonthyear2="+document.forms[0].daymonthyear2.value+"&departreport="+document.forms[0].departreport.value;
window.open($URL,'','toolbar=no,location=no,status=no,resizable=yes,menubar=no,scrollbars=yes');

}//of function

function kod_pum() {
alert('การใส่วันที่ต้องทำการกดปุ่ม Date เท่านั้นครับ');
		event.returnValue = false;
} 
</script>

