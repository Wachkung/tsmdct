<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['IT'] <> "1")
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
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
		<script>
			function validate() {
			if(document.frmMain.codegroup.value == "")
			{	alert('ใส่ รหัสด้านโปรแกรมความเสี่ยง');	
						document.frmMain.la_date.focus();
						return false;
			} 
			if(document.frmMain.namegroup.value == "")
			{	alert(' ใส่ ชื่อด้านโปแกรมความเสี่ยง ');	
						document.frmMain.latype.focus();
						return false;
			} 
			}
			</script>
			<script language="javascript">
			function CheckNum(){
					if (event.keyCode < 46 || event.keyCode > 57){
						  event.returnValue = false;
						}
				}
		</script>
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
				    <h1>
                        ระบบจัดการฝ่าย/กลุ่มงาน/ทีมคุณภาพ 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกฝ่าย/กลุ่มงาน/ทีมคุณภาพ</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกฝ่าย/กลุ่มงาน/ทีมคุณภาพ</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="depart_save.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> รหัสหลัก</i>
                                            </div>
                                           	<input name="DeptId" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> ชื่อฝ่าย/กลุ่มงาน</i>
                                            </div>
                                           	<input name="DeptName" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> รหัสฝ่าย/กลุ่มงาน</i>
                                            </div>
                                           	<input name="CODE" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									<div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> สถานะ</i>
                                            </div>
                                          <select name="STATUS" class="form-control">
											  <option value="0"></option>
                                              <option value="0">ฝ่าย/กลุ่มงาน</option>
                                              <option value="1">ทีมคุณภาพ</option>
                                            </select>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
									<div class="form-group">
										<button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกฝ่าย/กลุ่มงาน/ทีมคุณภาพ</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานฝ่าย/กลุ่มงาน/ทีมคุณภาพ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%" align="center">No.</th>
                                                <th width="15%">รหัส</th>
                                                <th width="75%">ฝ่าย/กลุ่มงาน/ทีมคุณภาพ</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$total=0; $no=1;
											$sql=" SELECT * FROM risk2_departreport  order by STATUS,DeptName DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$data['CODE']?> </td>
                                                <td><?=$data['DeptName']?></td>
                                                <td><a href="depart_edit.php?DeptId=<?=$data['DeptId']?>&CODE=<?=$data['CODE']?>&DeptName=<?=$data['DeptName']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                                <th><a href="depart_delete.php?DeptId=<?=$data['DeptId']?>&CODE=<?=$data['CODE']?>&DeptName=<?=$data['DeptName']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
                                            
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
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
