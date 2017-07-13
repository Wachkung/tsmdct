<?php
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
                 IT Hospital 
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
                                <span>ผู้ดูแลระบบ <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
										<td><?=$objResultNAV['title']?><?=$objResultNAV['name']?>  <?=$objResultNAV['lastname']?>
                                        <small>Member since Nov. 2014</small>
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

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-heart"></i> <span>1.การให้บริการ</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="service_add.php"><i class="fa fa-angle-double-right"></i>1.1.บริการงาน IT ทั่วไป</a></li> 
                                <li><a href="report_car.php"><i class="fa fa-angle-double-right"></i>1.2.รายงานข้อมูลรถ จนท.</a></li> 
                                <li><a href="report_detail.php"><i class="fa fa-angle-double-right"></i>1.3.รายงานการลา จนท.</a></li> 
                                <li><a href="report_total.php"><i class="fa fa-angle-double-right"></i>1.4.รายงานความเสี่ยง รพ.</a></li> 
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>2.แผนบำรุงรักษา</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="plan_add.php"><i class="fa fa-angle-double-right"></i>2.1.สร้างแผนบำรุงรักษา </a></li>
                                <li><a href="mainten_add.php"><i class="fa fa-angle-double-right"></i>2.2.บำรุงรักษาทั้งหมด </a></li>

                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>3.ข้อมูลอื่นๆ งาน IT</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<li><a href="charges_add.php"><i class="fa fa-angle-double-right"></i>3.1.บันทึกค่าใช้จ่ายอื่นๆ </a></li>
                            	<li><a href="device_it.php"><i class="fa fa-angle-double-right"></i>3.2.รายงานครุภัณฑ์ IT </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file-text-o"></i> <span>4.จัดการไฟล์เอกสาร</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="file_add.php"><i class="fa fa-angle-double-right"></i>4.1.เพิ่มไฟล์เอกสาร </a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-globe"></i> <span>5.จัดการข้อมูลข่าวสาร</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="news_add.php"><i class="fa fa-angle-double-right"></i>5.1.เพิ่มข่าวสาร </a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>5.2.ข้อความแจ้งข่าว </a></li>


                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-group"></i> <span>6.จัดการข้อมูลเจ้าหน้าที่</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="report_user.php"><i class="fa fa-angle-double-right"></i>6.1.สิทธ์ผู้ใช้ระบบ </a></li>
                                <li><a href="person_report.php"><i class="fa fa-angle-double-right"></i>6.2.จัดการข้อมูลเจ้าหน้าที่ </a></li>
                                <li><a href="position_add.php"><i class="fa fa-angle-double-right"></i>6.3.จัดการ ตำแหน่ง </a></li>
                                <li><a href="depart_add.php"><i class="fa fa-angle-double-right"></i>6.4.จัดการ ฝ่าย/กลุ่มงาน </a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>