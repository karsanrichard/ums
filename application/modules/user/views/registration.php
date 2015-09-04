<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<title>UMS | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/animate.min.css';?>" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/style.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/style-responsive.min.css';?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url().'assets/auth/css/theme/default.css';?>" rel="stylesheet">
    <!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>

<div class="col-md-6 registration">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Registration to the UMS</h4>
                        </div>
                        <div class="panel-body">
                            <!-- <form class="form-horizontal"> -->
                            <?php $attributes = array('class'=> 'form-group form-horizontal'); echo form_open('user/complete_registration',$attributes); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required = "required" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Last Name(s)</label>
                                    <div class="col-md-9">
                                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required = "required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Other Name(s)</label>
                                    <div class="col-md-9">
                                        <input type="text" name="onames" class="form-control" placeholder="Enter Other Names"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required = "required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required = "required"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Course</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="course_selection" required = "required">
                                        	<option value="0">Select Course</option>
                                            <?php foreach ($courses as $course) {
                                            	echo "<option value=".$course['id'].">".$course['course_name']."</option>";
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <label class="col-md-3 control-label">Submit</label> -->
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-sm btn-success">Complete Registration</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo base_url().'assets/plugins/jquery/jquery-1.9.1.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery/jquery-migrate-1.1.0.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/slimscroll/jquery.slimscroll.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugins/jquery-cookie/jquery.cookie.js';?>"></script>

	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
       <![endif]-->

       <!-- ================== BEGIN PAGE LEVEL JS ================== -->
       <script src="<?php echo base_url().'assets/auth/js/login.js';?>"></script>
       <script src="<?php echo base_url().'assets/auth/js/apps.min.js';?>"></script>
       <!-- ================== END PAGE LEVEL JS ================== -->

       <script>
          $(document).ready(function() {
             App.init();
             LoginV2.init();
         });
      </script>
  </body>

  <!-- Mirrored from seantheme.com/color-admin-v1.6/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Feb 2015 20:06:28 GMT -->
  </html>



