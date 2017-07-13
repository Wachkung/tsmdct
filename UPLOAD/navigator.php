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
                 ระบบจัดการไฟล์อัพโหลด
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
                                <span>ระบบจัดการไฟล์อัพโหลด <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                    <p>
										<td><?=$objResult['title']?><?=$objResult['name']?>  <?=$objResult['lastname']?>
                                        <small>Member since Jan. 2017</small>
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
                                <i class="fa fa-hospital-o" aria-hidden="true"></i><span>ระบบจัดการไฟล์อัพโหลด</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
								<li><a href="file_add.php"><i class="fa fa-edit"></i> <span>บันทึกไฟล์อัพโหลด</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>