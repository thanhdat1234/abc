<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-newspaper-o" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/cate/add');?>" id="frm_news_New" class="form-horizontal"   method="post"  enctype="multipart/form-data">
            <div class="form-group <?php if(form_error('title') != NULL){echo 'has-error';}else if(!empty($error_news)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('title');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="title" value = "<?php echo set_value('title');?>">
                    <?php echo form_error('title','<p class="help-block">','</p>');?>
                    <?php if(!empty($error_news)){echo '<p class="help-block">'.$error_news.'</p>';}?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('keyword') != NULL){echo 'has-error';}else if(!empty($error_mail)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('keywork');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input name="keyword" class="form-control" placeholder="Nhập keywork sản phẩm" value="<?php echo set_value('keyword');?>" id="keyword" type="text">
                    <?php echo form_error('keyword','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('description') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('description');?>
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Mô tả sản phẩm"><?php echo set_value('description');?></textarea>
                    <?php echo form_error('description','<p class="help-block">','</p>');?>
                </div>
            </div>


            <div class="form-group">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('category');?>
                </label>
                <div class="col-sm-10">
                    <select name="category" id="" class="form-control">
                        <option value="0">--Chọn menu--</option>
                        <?php
                        if(is_array($cate_parent) && $cate_parent != NULL):
                            foreach($cate_parent as $value):
                        ?>
                            <option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
                        <?php endforeach; endif;?>
                    </select>
                </div>
            </div>


            <div class="form-group col-sm-12 <?php if(form_error('info') != NULL){echo 'has-error';}?> " >
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('info');?></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="info" name="info"  cols="30" rows="5" ></textarea>
                    <?php echo form_error('info','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group col-sm-12 " >
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('images');?></label>
                <div class="col-sm-10" style="padding-left:0px;">
                    <div id="fileuploader"></div>
                </div>
            </div>

            <div class="form-group <?php if(form_error('avarta') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('avarta');?>
                </label>
                <div class="col-sm-10">
                    <input name="avarta" class="form-control" placeholder="icon fontawesome hoặc icon bootstraps" value="<?php echo set_value('avarta');?>" id="keyword" type="text">
                    <?php echo form_error('avarta','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('Order') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    Order
                </label>
                <div class="col-sm-10">
                    <input name="Order" class="form-control" placeholder="bé trước lớn sau" value="<?php echo set_value('Order');?>" id="" type="number">
                    <?php echo form_error('Order','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group col-sm-12 action" style="display:none;">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                    <div id="_files"></div>
                </div>
            </div>

            <div class="form-group col-sm-12 ">
                <label class="col-sm-2 control-label" for="subject">Active</label>
                <div class="col-sm-10">
                    <input type="checkbox" checked="" name="status" value="1">
                </div>
            </div>
        </form>
    </div>
</div>
<link href="<?php echo base_url('assets/admin');?>/css/uploadify/uploadfile.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/admin');?>/js/plugins/uploadify/jquery.uploadfile.min.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {
        $('.btn-index').css({display:'none'});
        $('.btn-edit').css({display:'none'});
        $('.btn-copy').css({display:'none'});
        $('.btn-add').css({display:'inline-block'});
        $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
        $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
    });


    CKEDITOR.replace('info');

    function New(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        for (info in CKEDITOR.instances) {
            CKEDITOR.instances[info].updateElement();
        }
        var data = $('#frm_news_New').serialize();
        $.post($('#frm_news_New').attr('action'),data,function(result){
            $(".content").unmask("<?php echo 'Loading...'; ?>");
            if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content').html(result.content);
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                $('#sale').on('ifChecked', function(event){
                    $('.sale_price').show();
                });
                $('#sale').on('ifUnchecked', function(event){
                    $('.sale_price').hide();
                });
            }else{
                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content').load(result.url,function(){
                    $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                    $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                });
            }
        },'json');
    }

    function back_to_list(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        $(".content").load('<?php echo base_url("admin/cate/list_all");?>',function(){
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
        });
    }

    $("#fileuploader").uploadFile({
        url:"<?php SITE_URL?>/admin/cate/upload",
        fileName:"file",
        multiple:false,
        showAbort: false,
        showDone: false,
        showDelete: true,
        showProgress: true,
        acceptFiles: "jpeg,png,gif",
        statusBarWidth:500,
        dragdropWidth:500,
        showPreview:true,
        previewHeight: "100px",
        previewWidth: "100px",
        deleteCallback: function (data) {
            var name  = data.split('.');
            $("#img-"+name[0]).hide();
            setTimeout(function () {
                $.ajax({
                    url : '<?php SITE_URL?>/admin/cate/deleteImage',
                    type: "POST",
                    data : {url:data},
                    cache: true,
                    success:function(responseData)
                    {
                        if(responseData != 0){
                            var element = document.getElementById(responseData);
                            element.outerHTML = "";
                            delete element;
                            $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        } else {
                            $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        }
                    },
                    error: function()
                    {

                    }
                });
            }, 1000);

        },
        onSuccess: function (files, response, xhr, pd) {
            $('.action').show();
            var id  = response.split('.');
            $("#_files").append("<input  type=\"hidden\" class=\"form-control images-name\" name=\"images\" id=\""+response+"\" value=\""+response+"\" />");
        }
    });
</script>