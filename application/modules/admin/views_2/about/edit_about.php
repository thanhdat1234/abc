<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-edit" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/about/edit/1') ?>" id="frm_Server_New" class="form-horizontal"   method="post">
            <div class="form-group <?php if(form_error('sales_about') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php front_lang('about');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="about_us" id="editor1" cols="30" rows="10"><?php if($result['about_us'] != NULL){ echo $result['about_us'];}else{echo set_value('about');}?></textarea>
                    <?php echo form_error('about_us','<p class="help-block">','</p>');?>
                </div>
            </div>
            <div class="form-group <?php if(form_error('sales_about') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php front_lang('contact');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="contact_us" id="editor2" cols="30" rows="10"><?php if($result['contact_us'] != NULL){ echo $result['contact_us'];}else{echo set_value('contact_us');}?></textarea>
                    <?php echo form_error('contact_us','<p class="help-block">','</p>');?>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('.btn-index').css({display:'none'});
        $('.btn-edit').css({display:'inline-block'});
        $('.btn-copy').css({display:'none'});
        $('.btn-add').css({display:'none'});
        $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
        $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
    });

    $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });

    function Edit(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        $("#frm_Server_New").submit();
    }

    /*function back_to_list(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var url = '<?php echo base_url("admin/pages");?>';
        window.location.href = url;
    }*/
</script>