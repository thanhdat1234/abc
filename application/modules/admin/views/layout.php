<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title?></title>
<!--        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>-->
        <?php $this->load->view('scripts');?>
    </head>
    <body>
        <?php $this->load->view("header");?>
        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">
                <? $this->load->view("sidebar");?>
                <? $this->load->view($content);?>
            </div>
            <!-- /page content -->
        </div>
        <!-- /page container -->
        <!-- Footer -->
        <div class="navbar navbar-inverse">
            <div class="text-center text-footer">
                &copy; 2016. <a href="http://ariweb.net">ariweb.net</a> by <a href="https://fb.com/nguyenthanhdat1294" target="_blank">Nguyễn Thành Đạt</a>
            </div>
        </div>
        <!-- /footer -->
    </body>
</html>