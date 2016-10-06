
    <!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/core.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/components.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/colors.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/admin');?>/css/css.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->

<!-- Core JS files -->
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->
<?php
if(isset($modul)){
?>
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/inputs/typeahead/handlebars.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/inputs/alpaca/alpaca.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/libraries/jquery_ui/widgets.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/ui/prism.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/tags/tokenfield.min.js"></script>
<?php
//}else
//if(isset($modul) && ($modul == 'modul' || $modul == 'cate')){
//?>
<!-- Theme JS files copy -->
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/selects/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/app.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/pages/datatables_data_sources.js"></script>
<!-- /theme JS files -->
<?php }else{ ?>

    <!-- Theme JS files home -->
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/uploaders/fileinput.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/pages/dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/plugins/tables/datatables/datatables.min.js"></script>
    <!-- /theme JS files home -->
<?php } ?>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/pages/alpaca_controls.js"></script>
<script type="text/javascript" src="<?php echo base_url('');?>/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin');?>/js/themes.js"></script>
