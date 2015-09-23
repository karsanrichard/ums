<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>UMS | Student Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
        <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/css/animate.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/css/style.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/css/style-responsive.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/css/theme/default.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/bootstrap-calendar/css/bootstrap_calendar.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/gritter/css/jquery.gritter.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/student/plugins/morris/morris.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.css';?>" rel="stylesheet">
    <script src="<?php echo base_url().'assets/student/plugins/jquery/jquery-1.9.1.min.js';?>"></script>
    <!-- ================== END BASE CSS STYLE ================== -->

    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url().'assets/student/plugins/pace/pace.min.js';?>"></script>
    <link href="<?php echo base_url().'assets/student/plugins/isotope/isotope.css';?>" rel="stylesheet" />
    <link href="<?php echo base_url().'assets/student/plugins/lightbox/css/lightbox.css';?>" rel="stylesheet" />
    <script src="<?php echo base_url().'assets/student/js/apps.min.js';?>"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="<?php echo base_url().'student'; ?>" class="navbar-brand"><span class="navbar-logo"></span> UMS</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->
                
                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <img src="<?php echo base_url().'assets/images/developers/richard.jpg'; ?>" alt="" />  -->
                            <i class="fa fa-user" style="font-size: 15px;color:#00acac;"></i>
                            <span class="hidden-xs"><?php echo ucfirst($student_data[0]['first_name']).' '.ucfirst($student_data[0]['last_name']); ?></span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="<?php echo base_url().'auth/logout'; ?>">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- end header navigation right -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- end #header -->
        
        <!-- begin #sidebar -->
        <?php $this->load->view('student/student_sidebar');?>
        
        <!-- end #sidebar -->
        
        <!-- begin #content -->
        <?php 
        $content = isset($content)? $content:'student_home';
        $this->load->view($content); ?>
        <!-- end #content -->
        
        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo base_url().'assets/student/plugins/jquery/jquery-migrate-1.1.0.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/jquery-ui/ui/minified/jquery-ui.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/bootstrap/js/bootstrap.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/slimscroll/jquery.slimscroll.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/jquery-cookie/jquery.cookie.js';?>"></script>

    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo base_url().'assets/student/plugins/morris/raphael.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/morris/morris.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/gritter/js/jquery.gritter.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/js/dashboard-v2.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/isotope/jquery.isotope.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/plugins/lightbox/js/lightbox-2.6.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/student/js/gallery.demo.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/plugins/select2/select2.min.js';?>"></script>
    

    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
        $(document).ready(function() {
            App.init();
            // DashboardV2.init();
            Gallery.init();
            $("select").select2();
        });
    </script>
</body>


