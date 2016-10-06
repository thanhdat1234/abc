<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-edit" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/support/edit/1') ?>" id="frm_Server_New" class="form-horizontal"   method="post">
            <div class="form-group <?php if(form_error('facebook') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php front_lang('facebook');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" name = 'facebook' class="form-control" value="<?php if($result['facebook'] != NULL){ echo $result['facebook'];}else{echo set_value('facebook');}?>">
                    <?php echo form_error('facebook','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('zalo') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('zalo');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="zalo" id="editor2" cols="30" rows="10"><?php if($result['zalo'] != NULL){ echo $result['zalo'];}else{echo set_value('zalo');}?></textarea>
                    <?php echo form_error('zalo','<p class="help-block">','</p>');?>
                </div>
            </div>

           <div class="form-group <?php if(form_error('viber') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                  <?php front_lang('viber');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="viber" id="editor3" cols="30" rows="10"><?php if($result['viber'] != NULL){ echo $result['viber'];}else{echo set_value('viber');}?></textarea>
                    <?php echo form_error('viber','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('yahoo') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('yahoo');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="yahoo" id="editor4" cols="30" rows="10"><?php if($result['yahoo'] != NULL){ echo $result['yahoo'];}else{echo set_value('yahoo');}?></textarea>
                    <?php echo form_error('yahoo','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('skyper') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php front_lang('skyper');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" name = 'skyper' class="form-control" value="<?php if($result['skyper'] != NULL){ echo $result['skyper'];}else{echo set_value('skyper');}?>">
                    <?php echo form_error('skyper','<p class="help-block">','</p>');?>
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
              
                CKEDITOR.replace('editor2');
                CKEDITOR.replace('editor3');
                CKEDITOR.replace('editor4');

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