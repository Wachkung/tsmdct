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
            <a href="main.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                 ระบบ Data Center 
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
                            <a href="main.php">
								<span>Home </span>
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
                                <span><?=$objResultNAV['title']?><?=$objResultNAV['name']?>  <?=$objResultNAV['lastname']?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                <?php if($objResultNAV['sex'] <> "ชาย"){  ?>
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                <?php }else{ ?>
                                    <img src="img/avatar.png" class="img-circle" alt="User Image" />
                                <?php } ?>
                                    <p>
										<td><?=$objResultNAV['title']?><?=$objResultNAV['name']?>  <?=$objResultNAV['lastname']?>
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
      
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="./password.php" class="btn btn-default btn-flat">เปลี่ยนรหัสผ่าน</a>
                                    </div>
                                    <div class="pull-right">
                                        <a  href="./logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
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
                            <a href="password.php">
                                <i class="fa fa-edit"></i> <span>เปลี่ยนรหัสผ่าน</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                        </li>
                       <li class="active">
                            <a href="./IT/">
                                <i class="fa fa-desktop"></i><span>ระบบงานผู้ดูแลระบบ</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
						</li>
                       <li class="active">
                            <a href="./PERSON/">
                                <i class="fa fa-user-plus"></i><span>ระบบงานบุคคลากร</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
						</li>
                       <li class="active">
                            <a href="./LA/">
                                <i class="fa fa-file"></i><span>ระบบงานลา&ความเสี่ยง</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
						</li>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-h-square" aria-hidden="true"></i><span>ระบบงานโรงพยาบาล</span><i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
								<li><a href="http://203.113.117.68/hionline/" target="_blank"><span>ระบบประวัติผู้ป่วยย้อนหลัง</span></a></li>
								<li><a href="http://203.113.117.68/ncdonline/#ajax/page_login.php" target="_blank"><span>ระบบทะเบียนผู้ป่วย NCD</span></a></li>
								<li><a href="http://192.168.11.9/checkpop/" target="_blank"><span>ระบบตรวจสอบเลขบัตร</span></a></li>
								<li><a href="https://login.mail.go.th/Li/?_task=mail&_redirecthost=tshpt.mail.go.th" target="_blank"><span>ระบบ E - Mail โรงพยาบาล</span></a></li>
								<li><a href="http://www.sunpasit.go.th:8081/ssj_Attachment/index_main.jsp" target="_blank"><span>แบบประเมินความผูกพันฯ</span></a></li>
								<li><a href="http://e-registration.dopa.go.th/Nbirth_cer/" target="_blank"><span>ระบบหนังสือรับรองการเกิด</span></a></li>
								<li><a href="http://healthdata.moph.go.th/Deathreport2005/GUI2007/loginform.php" target="_blank"><span>ระบบรายงานข้อมูลการตาย</span></a></li>
								<li><a href="http://ucsearch.nhso.go.th/ucsearch/" target="_blank"><span>ตรวจสอบสิทธิ์การรักษา</span></a></li>
								<li><a href="https://epit.rd.go.th/EFILING/LoginController?PRGID=L90T" target="_blank"><span>ยื่นแบบภาษี ภ.ง.ด.90/91</span></a></li>	
							</ul>
						</li>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-hospital-o" aria-hidden="true"></i> <span>ระบบบริหารความเสี่ยง</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="active">
								<li><a href="./RISK/"><span>ทีมบริหารจัดการความเสี่ยง</span></a></li>
								<li><a href="./PCT/"><span>ทีมดูแลผู้ป่วย</span></a></li>
								<li><a href="./PTC/"><span>ทีมระบบยาและสารน้ำ</span></a></li>
								<li><a href="./IC/"><span>ทีมเฝ้าระวังการติดเชื้อใน</span></a></li>
								<li><a href="./IM/"><span>ทีมข้อมูลข่าวสารสารสนเทศ</span></a></li>
								<li><a href="./ENV/"><span>ทีมโครงสร้างกายภาพสิ่งแวดล้อม</span></a></li>
								<li><a href="./HRD/"><span>ทีมพัฒนาทรัพยากรบุคคล</span></a></li>
							</ul>
						</li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>