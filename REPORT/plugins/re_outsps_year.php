<?php
header('Content-Type: text/html; charset=utf8');     ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moniter </title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <h1 class="page-header">รายงาน  Refer สปส</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             
               <div class="row">
              <div class="col-lg-12">
            <div class="form-group">
           
       
             <label class="control-label col-sm-1">  </label>
             <label class="control-label col-sm-2 ">เลือกปีงบประมาณ</label>
                    <label class="control-label col-sm-2"> 
                    <div id='jqxWidget'></div>
           <select name="year_by" id="year_by" class="form-control input-sm">
         <option value="0">เลือกปี</option>
         <option value="<?php echo date('Y'); ?>"><?php echo date('Y')+543; ?></option>
        <option value="<?php echo date('Y')-1; ?>"><?php echo (date('Y')-1)+543; ?></option>
         <option value="<?php echo date('Y')-2; ?>"><?php echo (date('Y')-2)+543; ?></option>
        <option value="<?php echo date('Y')-3; ?>"><?php echo (date('Y')-3)+543; ?></option>
        <option value="<?php echo date('Y')-4; ?>"><?php echo (date('Y')-4)+543; ?></option>
       <option value="<?php echo date('Y')-5; ?>"><?php echo (date('Y')-5)+543; ?></option>
   <option value="<?php echo date('Y')-6; ?>"><?php echo (date('Y')-6)+543; ?></option>
         </select>
         
                    </label>
            <label class="control-label col-sm-1"> 
          
            <input id="YearButton" type="button" value="ค้นหาข้อมูล" class="btn btn-primary"/>
        	</label>
          
         
           </div>
      </div>
                     </div>
                </div>
                        </div>
                    </div>
                </div>
               
                <!-- /.col-lg-12 -->
               
                    <div>
                <input type="button" value="Export to Excel" id='excelExport2' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h3>รายงาน  IPD Refer สปส</h3> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv2"></div> 
                            
                           
                            
                              </div>









              <div>
                <input type="button" value="Export to Excel" id='excelExport' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h3>รายงาน  IPD Refer สปส</h3> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv-"></div> 
                            
                           
                            
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.row -->



              <div>
                <input type="button" value="Export to Excel" id='excelExport3' />
                 
            </div>  
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                             <h3>รายงาน  IPD Referไม่ใช่ สปส</h3> 
                            <h3> </h3>
                            <p> </p>
                              <div class="row show-grid">
                          <div id="showdiv3"></div> 
                            
                           
                            
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
  

                  <script src="plugins/re_outsps_year2.js"></script>

  	 <script src="plugins/re_outsps_year.js"></script>


</body>


</html>


