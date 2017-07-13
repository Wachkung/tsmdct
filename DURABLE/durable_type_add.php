<?php
	session_start();
	include("../includes/conndb.php"); 
	include("../includes/config.inc.php"); 
	
	$IDCARD1=$_SESSION["IDCARD"];
	$DEPART1=$_SESSION["DEPART"];
	if($_SESSION['DURABLE'] <> "1")
	{   
		echo "<meta charset='UTF-8'>";
		echo "ต้องเข้าสู่ระบบก่อนครับ!";
		echo"<meta http-equiv='refresh' content='2;URL=../index.php'>";
		exit();
	}

	$strSQL = "SELECT * FROM durable_type order by durable_type_code DESC limit 1 ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	// สร้างรหัสใหม่
	$new_code=(int)substr($objResult["durable_type_code"],2,3)+1;
	$key="DT";
	$x_string =  substr("00".$new_code,-3,3);
	$new_device_code="$key$x_string";


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $titleweb; ?></title>
		<?php include "../includes/linkcss.php";?>
		<script>
            function validate() {
            if(document.frmMain.durable_type_code.value == "")
            {	alert('ใส่ รหัสประเภทครุณฑ์');	
                        document.frmMain.durable_type_code.focus();
                        return false;
            } 
            if(document.frmMain.durable_type_name.value == "")
            {	alert(' ใส่ ชื่อประเภทครุณฑ์');	
                        document.frmMain.durable_type_name.focus();
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
                        ระบบครุภัณฑ์ 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกครุภัณฑ์ </a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึครุภัณฑ์ </h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="durable_type_save.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> รหัสประเภทครุภัณฑ์ </i>
                                            </div>
                                           	<input name="durable_type_code"placeholder="DT100" type="text" class="form-control"value="<?=$new_device_code;?>"readonly>
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> ชื่อประเภทครุภัณฑ์</i>
                                            </div>
                                           	<input name="durable_type_name" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
									<div class="form-group">
										<button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกครุภัณฑ์</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานประเภทครุภัณฑ์</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ประเภทครุณฑ์</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$sql=" SELECT * FROM durable_type  order by durable_type_code DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                                <td><?=$data['durable_type_code']?> </td>
                                                <td><?=$data['durable_type_name']?></td>
                                                <td><a href="durable_type_edit.php?id=<?=$data['durable_type_id']?>&durable_type_code=<?=$data['durable_type_code']?>&durable_type_name=<?=$data['durable_type_name']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                                <th><a href="durable_type_delete.php?id=<?=$data['durable_type_id']?>&durable_type_code=<?=$data['durable_type_code']?>&durable_type_name=<?=$data['durable_type_name']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
                                            
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>
