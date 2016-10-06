<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
            <?php $this->load->view('slibar_left_new');?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2"><?php echo $breadcrumb;?></span>
                </h2>
                <!-- Content page -->
                <div class="content-text clearfix">
                    <?php
                        echo $info;
                    ?>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->