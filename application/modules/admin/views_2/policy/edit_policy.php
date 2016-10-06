<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-edit" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/policy/edit/1') ?>" id="frm_Server_New" class="form-horizontal"   method="post">
            <div class="form-group <?php if(form_error('sales_policy') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php front_lang('pay');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="sales_policy" id="editor1" cols="30" rows="10"><?php if($result['sales_policy'] != NULL){ echo $result['sales_policy'];}else{echo set_value('sales_policy');}?></textarea>
                    <?php echo form_error('sales_policy','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('warranty_policy') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('lie');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="warranty_policy" id="editor2" cols="30" rows="10"><?php if($result['warranty_policy'] != NULL){ echo $result['warranty_policy'];}else{echo set_value('warranty_policy');}?></textarea>
                    <?php echo form_error('warranty_policy','<p class="help-block">','</p>');?>
                </div>
            </div>


            <div class="form-group <?php if(form_error('freeship') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('transport');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="freeship" id="editor4" cols="30" rows="10"><?php if($result['freeship'] != NULL){ echo $result['freeship'];}else{echo set_value('freeship');}?></textarea>
                    <?php echo form_error('freeship','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('secure_transactions') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('trade');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="secure_transactions" id="editor5" cols="30" rows="10"><?php if($result['secure_transactions'] != NULL){ echo $result['secure_transactions'];}else{echo set_value('secure_transactions');}?></textarea>
                    <?php echo form_error('secure_transactions','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('purchase') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('purchase');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="purchase" id="editor6" cols="30" rows="10"><?php if($result['purchase'] != NULL){ echo $result['purchase'];}else{echo set_value('purchase');}?></textarea>
                    <?php echo form_error('purchase','<p class="help-block">','</p>');?>
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
                CKEDITOR.replace('editor4');
                CKEDITOR.replace('editor5');
                CKEDITOR.replace('editor6');

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