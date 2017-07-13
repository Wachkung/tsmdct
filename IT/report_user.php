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
    </head>
    <?php include "navigator.php";?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        รายงานสิทธิการเข้าถึงข้อมูล
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">สิทธิการเข้าถึงข้อมูล</h3>
                                </div><!-- /.box-header -->
								 <div class="box-body">
                                    <div class="form-group">
                                    <button type="button" class="btn btn-success" 
                                    onclick="window.location.href='user_add.php'">
                                    <i class="fa fa-plus"></i> เพิ่มสิทธิการเข้าถึงข้อมูล ใหม่</button>	
                                    </div><!-- /.form group -->
                                </div>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%"align="center">No.</th>
                                                <th width="20%"align="center">ชื่อ - สกุล</th>  
												<th width="20%"align="center">ฝ่าย/หน่วยงาน</th>
                                                <th width="5%"align="center">RISK</th>
                                                <th width="5%"align="center">REP</th>
                                                <th width="5%"align="center">LA</th>
                                                <th width="5%"align="center">ROOM</th>
                                                <th width="5%"align="center">IT</th>
                                                <th width="5%"align="center">PERSON</th>
                                                <th width="5%"align="center">NUT</th>
                                                <th width="5%"align="center">STATUS</th>
                                                <th width="5%"><i class="fa fa-edit"></i></th>
                                                <th width="5%"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
											$total=0; $no=1;
											$sql="SELECT * FROM user_datacenter "; 
                        					$result = mysql_query($sql); while($data = mysql_fetch_array($result)) {
											$IDCARD=$data['IDCARD'];
											$DEPART1=$data["DEPART"];

											$strSQL1 = "SELECT * FROM person  WHERE idcard = '$IDCARD' ";
											$objQuery1 = mysql_query($strSQL1);
											$objResult1 = mysql_fetch_array($objQuery1);

											$strSQLDEPART1 = "SELECT * FROM rm_depart  WHERE CODE = '$DEPART1' ";
											$objQueryDEPART1 = mysql_query($strSQLDEPART1);
											$objResultDEPART1 = mysql_fetch_array($objQueryDEPART1);
										?>
                                            <tr>
                                            	<td align="center"><?=$no?></td>
                                                <td><?=$objResult1['title']?><?=$objResult1['name']?>  <?=$objResult1['lastname']?> </td>
                                                <td><?=$objResultDEPART1['CODE']?> | <?=$objResultDEPART1['depart']?></td>
                                                <td align="center"><?=$data['RISK']?></td>
                                                <td align="center"><?=$data['REPORT']?></td>
                                                <td align="center"><?=$data['LA']?></td>
                                                <td align="center"><?=$data['ROOM']?></td>
                                                <td align="center"><?=$data['IT']?></td>
                                                <td align="center"><?=$data['PERSON']?></td>
                                                <td align="center"><?=$data['NUTRITION']?></td>
                                                <td align="center"><?=$data['STATUS']?></td>
                                                <th><a href="user_edit.php?id=<?=$data['id']?>" onclick="return confirm('แก้ไขหรือไม่');" >
                                                <i class="fa fa-edit"></i></a></th>
                                                <th><a href="user_delete.php?id=<?=$data['id']?>" onclick="return confirm('ลบข้อมูลหรือไม่');" >
                                                <i class="fa fa-trash-o"></i></a></th>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
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
