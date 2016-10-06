<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.interface.club/limitless/layout_1/LTR/default/login_simple.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 11 Jun 2016 02:33:48 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/admin'); ?>/css/css.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="<?=base_url("assets/admin/logo/logo.png")?>" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->
                <form action="<?php echo site_url("admin/login")?>" method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-slate-300 text-slate-300"><a class="navbar-brand" href="index.html"><img src="<?=base_url("assets/admin/logo/logo.png")?>" alt=""></a></div>
                            <h5 class="content-group">Login to Administrator
                            </h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="user_name">

                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="user_pass">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login <i
                                    class="icon-circle-right2 position-right"></i></button>
                        </div>

<!--                        <div class="text-center">-->
<!--                            <a href="login_password_recover.html">Forgot password?</a>-->
<!--                        </div>-->
                    </div>
                </form>
                <!-- /simple login form -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2016. <a href="#">Ariweb.net</a> by <a href="https:fb.com//nguyenthanhdat1294"
                                                                             target="_blank">Mr.lis</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>

<!-- Mirrored from demo.interface.club/limitless/layout_1/LTR/default/login_simple.html by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 11 Jun 2016 02:33:48 GMT -->
</html>


