<?php
	//include("./includes/conndb.php"); 
	//include("./includes/config.inc.php"); 

	$DEPART1=$_SESSION["DEPART"];
	$IDCARD1=$_SESSION["IDCARD"];
	
	$strSQLNAV = "SELECT * FROM person WHERE idcard = '$IDCARD1' ";
	$objQueryNAV = mysql_query($strSQLNAV);
	$objResultNAV = mysql_fetch_array($objQueryNAV);

?>

    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 ระบบจัดการความเสี่ยง
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="active">
                            <a href="../main.php">
								<span>Home</span>
                            </a>
                        </li>
                    </ul>
                </div>                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>ระบบจัดการความเสี่ยง <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
										<td><?=$objResultNAV['title']?><?=$objResultNAV['name']?>  <?=$objResultNAV['lastname']?>
                                        <small>Member since Nov. 2015</small>
                                    </p>
                                </li>
      
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="../password.php" class="btn btn-default btn-flat">เปลี่ยนรหัสผ่าน</a>
                                    </div>
                                    <div class="pull-right">
                                        <a  href="../logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
						<li class="active">
                            <a href="index.php">
                                <i class="glyphicon glyphicon-home"></i> <span>หน้าแรก</span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="risk_add.php">
                                <i class="fa fa-edit"></i> <span>บันทึกความเสี่ยง</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-hospital-o" aria-hidden="true"></i><span>ระบบจัดการความเสี่ยง</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
								<li class="active"><a href="group_add.php"><i class="fa fa-edit"></i> <span>เพิ่มด้านโปรแกรมความเสี่ยง</span></a></li>
								<li class="active"><a href="levelclinic_add.php"><i class="fa fa-edit"></i> <span>เพิ่มความรุ่นแรงด้านคลินิก</span></a></li>
								<li class="active"><a href="levelnormal_add.php"><i class="fa fa-edit"></i> <span>เพิ่มความรุ่นแรงด้านทั่วไป</span></a></li>
								<li class="active"><a href="grouprisk_add.php"><i class="fa fa-edit"></i> <span>เพิ่มความเสี่ยงหลัก</span></a></li>
								<li class="active"><a href="report_user.php"><i class="fa fa-edit"></i> <span>เพิ่มสิทธิ์การเข้าใช้งาน</span></a></li>
							</ul>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-warning"></i> <span>รายงานจัดการความเสี่ยง</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
                                <li><a href="report_total.php">ความเสี่ยงงานทั้งหมด </a></li>
                                <li><a href="risk_report.php">ความเสี่ยงรอการแก้ไข  </a></li>
                                <li><a href="report_errorpro.php">ไม่ได้ลงโปรแกรม  </a></li>
                                <li><a href="report_level.php">ไม่ได้ลงความรุนแรง  </a></li>
                                <li><a href="report_errorlevel.php">ลงความรุนแรงสองด้าน  </a></li>
                                <li><a href="frm_report.php">ส่งออกรายงานความเสี่ยง  </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-warning"></i> <span>รายงานจำนวนความเสี่ยง</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
                               <!-- <li><a href="page_report2.php">แยกตามหน่วยงานบันทึก </a></li>-->
                                <li><a href="report_usertotal.php">จำนวนความเสี่ยงแยกบุคคล</a></li>
                                <li><a href="report_departrespontotal.php">ความเสี่ยงแยกกลุ่มงาน </a></li>
                                <li><a href="report_grouptotal.php">ความเสี่ยงแยกตามโปรแกรม </a></li>
                                <li><a href="report_risktotal.php">ความเสี่ยงที่เกิดขี้นบ่อย </a></li>
                                <li><a href="report_notanalyze.php">รายงานจำนวนรอการวิเคราะห์  </a></li>
                            </ul>
                        </li>                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-warning"></i> <span>รายงานแยก ์Non&Clinical</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
                                <li><a href="report_abcd.php">ความเสี่ยง Clinicalระดับ A - D </a></li>
                                <li><a href="report_ef.php">ความเสี่ยง Clinicalระดับ E - F </a></li>
                                <li><a href="report_ghi.php">ความเสี่ยง Clinicalระดับ G - I </a></li>
                                <li><a href="report_nonone.php">ความเสี่ยง Non Clinicalระดับ 1 </a></li>
                                <li><a href="report_nontwo.php">ความเสี่ยง Non Clinicalระดับ 2 </a></li>
                                <li><a href="report_nonthree.php">ความเสี่ยง Non Clinicalระดับ 3 </a></li>
                                <li><a href="report_nonfour.php">ความเสี่ยง Non Clinicalระดับ 4 </a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>