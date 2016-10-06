<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url('assets/admin');?>/js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url('assets/admin');?>/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

        <?php $this->load->view('style');?>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php $this->load->view('header');?>
        <div style="min-height: 585px;" class="wrapper row-offcanvas row-offcanvas-left">
            <?php $this->load->view('sidebar');?>
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>    
                    </h1>
                    <div style="position:absolute; top:10px; right:15px;">
                        <div class="btn-group">
                            <a type="button" name="" class="btn btn-default btn-index" onclick="Search_modal()" style="display: inline-block;"><i class="fa fa-search"></i> Search</a>
                            <a type="button" name="" class="btn btn-default btn-index" onclick="cancel_Search()" style="display: inline-block;"><i class="fa fa-times"></i></a>
                        </div> 
                        <a type="button" name="" class="btn btn-primary btn-index" onclick="Add();" style="display: inline-block;"><i class="fa fa-plus"></i> New</a>                                                                            
                        <a type="button" name="" class="btn btn-primary btn-add" onclick="New();" style="display: none;"><i class="fa fa-check-circle"></i> Save</a>                                                                            
                        <a type="button" name="" class="btn btn-default btn-add" onclick="back_to_list();" style="display: none;"><i class="fa fa-times-circle"></i> Cancel</a>                                                                            
                        <a type="button" name="" class="btn btn-primary btn-edit" onclick="Edit();" style="display: none;"><i class="fa fa-check-circle"></i> Save</a>                                                                            
                        <a type="button" name="" class="btn btn-info btn-edit" onclick="Apply();" style="display: none;"><i class="fa fa-check-circle"></i> Apply</a>                                                                            
                        <a type="button" name="" class="btn btn-default btn-edit" onclick="back_to_list();" style="display: none;"><i class="fa fa-times-circle"></i> Cancel</a>                                                                            
                        <a type="button" name="" class="btn btn-primary btn-copy" onclick="Copy();" style="display: none;"><i class="fa fa-check-circle"></i> Save</a>                                                                            
                        <a type="button" name="" class="btn btn-default btn-copy" onclick="back_to_list();" style="display: none;"><i class="fa fa-times-circle"></i> Cancel</a>                                                                    
                    </div>
                </section>
                <section class="content">
                    <?php $this->load->view($template);?>
                </section>
            </aside>
        </div>
        <!-- add new calendar event modal --> 
        <?php $this->load->view('scripts');?>   
    </body>
</html>