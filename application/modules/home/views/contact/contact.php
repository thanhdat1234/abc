<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
        <div class="breadcrumb clearfix">
            <a class="home" href="#" title="Return to Home"><?php front_lang('home');?></a>
            <span class="navigation-pipe">&nbsp;</span>
            <span class="navigation_page"><?php front_lang('contact');?></span>
        </div>
        <!-- ./breadcrumb -->
        <!-- page heading-->
        <h2 class="page-heading">
            <span class="page-heading-title2"><?php front_lang('contact');?></span>
        </h2>
        <!-- ../page heading-->
        <div id="contact" class="page-content page-contact">
            <div id="message-box-conact"></div>
            <div class="row">
                <div class="col-xs-12 col-sm-12" id="contact_form_map">
                    <h3 class="page-subheading"><?php front_lang('infomation');?></h3>
                    <?php echo $result['contact_us'];?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./page wapper-->