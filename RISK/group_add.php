<?php
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
                        ระบบจัดการความเสี่ยง 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">บันทึกโปรแกรมความเสี่ยง</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">             
                     <div class="row">   
                       <section class="col-lg-6 connectedSortable">    
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">บันทึกโปรแกรมความเสี่ยง</h3>
                                </div>
                                <div class="box-body">
                                	<!-- Date and time range -->
                                    <form action="group_save.php" method="post" enctype="multipart/form-data" name="frmMain" onSubmit="JavaScript:return validate();">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"> รหัสโปรแกรม</i>
                                            </div>
                                           	<input name="codegroup" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                  
									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> ด้านโปรแกรมความเสี่ยง</i>
                                            </div>
                                           	<input name="namegroup" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> ทีมคุณภาพที่รับผิดชอบ</i>
                                            </div>
                                           	<input name="grouptype" type="text" class="form-control" >
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->

									  <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar-o"> สถานะด้านความเสี่ยง</i>
                                            </div>
                                           	<select class="form-control" id="grouplevel" name="grouplevel">
											  <option value=" ">-เลือกด้านความเสี่ยง-</option>  
											  <option value="1">ความเสี่ยงด้านคลินิก</option>  
											  <option value="2">ความเสี่ยงด้านทั่วไป</option>  
											</select> 
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->									
									<div class="form-group">
										<button name="btnSubmit" type="submit" class="btn btn-primary">บันทึกโปรแกรมความเสี่ยง</button> 
                                    	<button type="button" class="btn btn-success" onclick="window.location.href='index.php'" >กลับหน้าหลัก</button>
                                    </div><!-- /.form group -->
                                </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </section><!-- /.Left col -->
                        
                        <section class="col-lg-6 connectedSortable">  
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">รายงานโปรแกรมความเสี่ยง</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>โปรแกรมความเสี่ยง</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
											$sql=" SELECT * FROM risk2_group  order by codegroup DESC "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
										?>
                                            <tr>
                                                <td><?=$data['codegroup']?> </td>
                                                <td><?=$data['namegroup']?></td>
                                                <td><a href="group_edit.php?id=<?=$data['id']?>&codegroup=<?=$data['codegroup']?>&namegroup=<?=$data['namegroup']?>"  onclick="return confirm('แก้ไขหรือไม่');"><span class="label label-primary"><i class="fa fa-edit"></i></span></a></td>
                                                <th><a href="group_delete.php?id=<?=$data['id']?>&codegroup=<?=$data['codegroup']?>&namegroup=<?=$data['namegroup']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" ><i class="fa fa-trash-o"></i></a></th>
                                            
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
