<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-edit" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/config/edit/1') ?>" id="frm_Server_New" class="form-horizontal"   method="post">
            <div class="form-group <?php if(form_error('cf_title') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Title site<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="Title" name="cf_title" value = "<?php if($result['title'] != NULL){ echo $result['title'];}else{echo set_value('cf_title');}?>">
                    <?php echo form_error('cf_title','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('cf_description') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Description <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="cf_description" id="editor1" cols="130" rows="5"><?php if($result['description'] != NULL){ echo $result['description'];}else{echo set_value('cf_description');}?></textarea>
                    <?php echo form_error('cf_description','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('cf_address') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Address<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_address" value = "<?php if($result['address'] != NULL){ echo $result['address'];}else{echo set_value('cf_address');}?>">
                    <?php echo form_error('cf_address','<p class="help-block">','</p>');?>
                </div>
            </div>

             <div class="form-group <?php if(form_error('cf_numrecord') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Numrecord display<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="Number record" name="cf_numrecord" value = "<?php if($result['per_page_product'] != NULL){ echo $result['per_page_product'];}else{echo set_value('cf_numrecord');}?>">
                    <?php echo form_error('cf_numrecord','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('cf_seo') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Seo keyword<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_seo" value = "<?php if($result['keyword'] != NULL){ echo $result['keyword'];}else{echo set_value('cf_seo');}?>">
                    <?php echo form_error('cf_seo','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('cf_email') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Email contact<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_email" value = "<?php if($result['email'] != NULL){ echo $result['email'];}else{echo set_value('cf_email');}?>">
                    <?php echo form_error('cf_email','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('cf_phone') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Phone contact<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_phone" value = "<?php if($result['phone'] != NULL){ echo $result['phone'];}else{echo set_value('cf_phone');}?>">
                    <?php echo form_error('cf_phone','<p class="help-block">','</p>');?>
                </div>
            </div>
            
            <div class="form-group <?php if(form_error('cf_hotline') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Hotline<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_hotline" value = "<?php if($result['hotline'] != NULL){ echo $result['hotline'];}else{echo set_value('cf_hotline');}?>">
                    <?php echo form_error('cf_hotline','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('cf_fanpage') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Link Fanpage<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <input type="text" class="form-control" placeholder="meta" name="cf_fanpage" value = "<?php if($result['fan_page'] != NULL){ echo $result['fan_page'];}else{echo set_value('cf_fanpage');}?>">
                    <?php echo form_error('cf_fanpage','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('map') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                  Map <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <textarea name="map" id="editor1" cols="130" rows="5"><?php if($result['map'] != NULL){ echo $result['map'];}else{echo set_value('map');}?></textarea>
                    <?php echo form_error('map','<p class="help-block">','</p>');?>
                </div>
            </div>

        </form>

        <form action="<?php echo base_url('admin/config/delete_cache');?>" method="post">
            <div class="form-group">
                <label for="subject" class="col-sm-2 control-label">
                  Remove Cache<span style="color: red;">*</span>
                </label>
                <div class="col-sm-10" style="padding:0px;">
                    <button type="submit" class="btn btn-primary" name="remove">Delete Cache</button>
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