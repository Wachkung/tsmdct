<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

<title> ระบบบริการสุขภาพ ON LINE โรงพยาบาลตาลสุม </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!--<link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
    <link href="../includes/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <!--MENU  HEAD-->
    <link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxgrid.columnsresize.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script> 
     <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script> 
    <script type="text/javascript" src="generatedata.js"></script>

    

</head>

<body>


  <!--MENU  HEAD-->
  

        <!-- Navigation -->
      
      <?php include_once ('menu.php'); ?>     
            <!-- /.navbar-header -->

       

   
        

        <!-- Page Content -->
       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">TODAY <?php 
                    
                    
                   $yearT   =  date('Y')+543;
                       $dm     =  date('d/m');
                   echo'   '. $dm.'/'.$yearT;  ?>  </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
              <div class="panel-body alert-info">
                          OPD  
                         </div>   
                <!-- /.col-lg-12 -->
               
                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอกวันนี้รวมทั้งสิ้น</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivopdt"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
			<div>
                <input type="button" value="Export to Excel" id='excelExportopduc' />
                 
            </div> 


             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอกวันนี้แยกตามสิทธิ์</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivopduc"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>



              <div>
                <input type="button" value="Export to Excel" id='excelExport9' />
                 
            </div>  





            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv9"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
           <div>
                <input type="button" value="Export to Excel" id='excelExport10' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก(ตามเวร)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv10"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>


 <div>
                <input type="button" value="Export to Excel" id='excelExportopdrefer' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงาน OPD + ER ส่งREFER</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivopdrefer"></div> 
                            
                            <h5 class ="text-warning">ปัญหา จุดที่ส่ง  Refer ไม่ตรง กับrefer จริง เช่น  refer ที่ ER แต่ลงจุด เวชปฏิบติ,คลีนิคประกันสังคม </h4> 
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>

 

<div>
                <input type="button" value="Export to Excel" id='excelExportipdre' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงาน IPD ส่งREFER</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivipdref"></div> 
                            
                            
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>



 <div>
                <input type="button" value="Export to Excel" id='excelExportipdre_refer' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานรับAdmitted_refer</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivipdre_refer"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>


<div>
                <input type="button" value="Export to Excel" id='excelExportallemer' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานสรุปอุบัติเหตุ</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivallemer"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>



<div>
                <input type="button" value="Export to Excel" id='excelExportcaseemer' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานcaseอุบัติเหตุ</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivcaseemer"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>














 <div>
                <input type="button" value="Export to Excel" id='excelExportipddead' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-danger">รายงานเสียชีวิตผู้ป่วยใน</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivipddead"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>





            <div>
                <input type="button" value="Export to Excel" id='excelExportopddead' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-danger">รายงานเสียชีวิตผู้ป่วยนอก</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivopddead"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>




           
    <div>
                <input type="button" value="Export to Excel" id='excelExport11' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยนอก(20 อันดับโรคเฉพาะเวชปฏิบติ)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv11"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
           
  <div class="panel-body alert-info">
                          ER 
                         </div>   
                <!-- /.col-lg-12 -->

<div>
                <input type="button" value="Export to Excel" id='excelExport12' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยห้องฉุกเฉิน(20 อันดับโรค)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv12"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
           


<div class="panel-body alert-info">
                          OR 
                         </div>   
                <!-- /.col-lg-12 -->
        <div>


             <!-- /.col-lg-12 -->

<div>
                <input type="button" value="Export to Excel" id='excelExportor' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการนัดผ่าตัดวันนี้</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivor"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>





<div>
                <input type="button" value="Export to Excel" id='excelExportortime' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผ่าตัดวันนี้</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivortime"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>




     <!-- /.col-lg-12 -->

<div>
                <input type="button" value="Export to Excel" id='excelExportoryes' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการนัดผ่าตัดพรุ่งนี้</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivoryes"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>





        <div class="panel-body alert-info">
                          IPD  
                         </div>   
                <!-- /.col-lg-12 -->
        <div>
                <input type="button" value="Export to Excel" id='excelExport2' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">ผู้มารับบริการงานผู้ป่วยใน ข้อมูลปัจจุบัน</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv2"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       



                <!-- /.col-lg-12 -->
        <div>
                <input type="button" value="Export to Excel" id='excelExportjobm' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">อัตรางานผู้ป่วยเวรเช้า (สรุปหลัง15.15 น.)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivjobm"></div> 
                             <div id="showdivref15"></div> 
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       









          

 <div>
                <input type="button" value="Export to Excel" id='excelExportjobe' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">อัตรางานผู้ป่วยเวรบ่าย (สรุปหลัง23.15 น.)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivjobe"></div> 
                            
                             <div id="showdivref152"></div> 
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       
          







           <div>
                <input type="button" value="Export to Excel" id='excelExportjobey' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">อัตรางานผู้ป่วยเวรบ่าย (สรุปหลัง23.15 น.) <?php   
       echo date('d-m-Y',strtotime("-1 day"));
          ?></h4> 
                            <h5>  

    </h5>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivjobey"></div> 
                             <div id="showdivref152e"></div> 
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       

<div>
                <input type="button" value="Export to Excel" id='excelExportjobn' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">อัตรางานผู้ป่วยเวรดึก (สรุปหลัง07.15 น.)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivjobn"></div> 
                             <div id="showdivref153"></div> 
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       
          




                  <!-- /.col-lg-12 -->
        <div>
                <input type="button" value="Export to Excel" id='excelExportmedm' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยใน(DX medชาย)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivmedm"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
       
                
                  <div>
                <input type="button" value="Export to Excel" id='excelExportmedf' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยใน(DX medหญิง)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivmedf"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
                
                
                
                <div>
                <input type="button" value="Export to Excel" id='excelExportped' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4>รายงานผู้มารับบริการงานผู้ป่วยใน(DX ped เด็ก)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivped"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
                
                  
 
                <div>
                <input type="button" value="Export to Excel" id='excelExportgen' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยใน(DX ศัลยกรรมทั่วไป)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivgen"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
                
 <div>
                <input type="button" value="Export to Excel" id='excelExportort' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยใน(DX ศัลยกรรมกระดูก)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivort"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>


          
 <div>
                <input type="button" value="Export to Excel" id='excelExporticu' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h4 class=" alert alert-success">รายงานผู้มารับบริการงานผู้ป่วยใน(DX  icu)</h4> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdivicu"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>




                
       </div>
            <!-- /.row -->
       
          </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
   

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>
  

  
  
   
 <script src="plugins/today_opd_total.js"></script>
 <script src="plugins/today_opd_uc.js"></script>
 <script src="plugins/today_opd.js"></script>
 <script src="plugins/time_today_opd.js"></script>
 <script src="plugins/today_refer_opd.js"></script>
 <script src="plugins/today_refer_ref.js"></script>
 <script src="plugins/today_resive_ipd.js"></script>
 <script src="plugins/today_total_emer.js"></script>
<script src="plugins/today_case_emer.js"></script>
 <script src="plugins/today_ipd_dead.js"></script>
 <script src="plugins/today_opd_dead.js"></script>
 <script src="plugins/today_opd_dx.js"></script>
 <script src="plugins/today_er.js"></script>
 <script src="plugins/today_or.js"></script>
 <script src="plugins/today_or_time.js"></script>
<script src="plugins/today_or_yes.js"></script>
 <script src="plugins/today_ipt.js"></script>
 <script src="plugins/job_m_today_ipt.js"></script>
 <script src="plugins/job_ref15_today_ipt.js"></script>
 <script src="plugins/job_ref152_today_ipt.js"></script>
 <script src="plugins/job_ref152e_today_ipt.js"></script>
 <script src="plugins/job_ref153_today_ipt.js"></script>
<script src="plugins/job_e_today_ipt.js"></script>
 <script src="plugins/job_ey_today_ipt.js"></script>
 <script src="plugins/job_n_today_ipt.js"></script>
 <script src="plugins/today_ipt_medm.js"></script>
 <script src="plugins/today_ipt_medf.js"></script>
 <script src="plugins/today_ipt_ped.js"></script>
<script src="plugins/today_ipt_gen.js"></script>
<script src="plugins/today_ipt_ort.js"></script>
<script src="plugins/today_ipt_icu.js"></script>
</body>


</html>


