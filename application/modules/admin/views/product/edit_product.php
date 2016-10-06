<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-ship" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/product/edit/'.$result['id'].'');?>" id="frm_product_New" class="form-horizontal"   method="post"  enctype="multipart/form-data">
            <div class="form-group <?php if(form_error('product_name') != NULL){echo 'has-error';}else if(!empty($error_product)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php echo front_lang('product_name');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="product_name" value = "<?php if($result['product_name'] != NULL){ echo $result['product_name'];}else{echo set_value('product_name');}?>">
                    <?php echo form_error('product_name','<p class="help-block">','</p>');?>
                    <?php if(!empty($error_product)){echo '<p class="help-block">'.$error_product.'</p>';}?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('keyword') != NULL){echo 'has-error';}else if(!empty($error_mail)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                    <?php echo front_lang('keywork');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input name="keyword" class="form-control" placeholder="Nhập keywork sản phẩm" value="<?php if($result['keyword'] != NULL){ echo $result['keyword'];}else{echo set_value('keyword');}?>" id="keyword" type="text">
                    <?php echo form_error('keyword','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group <?php if(form_error('description') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   <?php echo front_lang('description');?>  
                </label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Mô tả sản phẩm"><?php if($result['description'] != NULL){ echo $result['description'];}else{echo set_value('description');}?></textarea>
                    <?php echo form_error('description','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group col-sm-6 <?php if(form_error('price') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-4 control-label">
                    <?php echo front_lang('price');?> <span style="color: red;">*</span>
                </label>
                <div class="col-sm-8">
                    <input name="price" class="form-control" placeholder="Giá sản phẩm" value="<?php if($result['price'] != NULL){ echo $result['price'];}else{echo set_value('price');}?>" id="price" type="text">
                    <?php echo form_error('price','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="col-sm-6 form-group pull-right" style="padding-right:0px;">
                <label class="col-sm-4 control-label" for="subject"><?php echo front_lang('type');?></label>
                <div class="col-sm-8">
                    <select name="type" class="form-control">
                        <option value="1" <?php if($result['type'] == 1){echo 'selected';}?>>Da</option>
                        <option value="2" <?php if($result['type'] == 2){echo 'selected';}?>>Vải</option>
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-12 <?php if(form_error('info') != NULL){echo 'has-error';}?> " >
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('info');?><span style="color: red;">*</span> </label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="info" name="info"  cols="30" rows="5" ><?php if($result['info'] != NULL){ echo $result['info'];}else{echo set_value('info');}?></textarea>
                    <?php echo form_error('info','<p class="help-block">','</p>');?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('sale');?></label>
                <div class="col-sm-10" style="padding-left:0px;">
                    <label class="checkbox-inline" style="padding-left:15px;"><input type="checkbox" <?php if($result['hot'] == 1){echo 'checked = ""';}?>  name="hot" value="1"> hot</label>
                    <label class="checkbox-inline"><input type="checkbox" name="sale" <?php if($result['sale'] == 1){echo 'checked = ""';}?>  value="1" id="sale" onclick="check_sale()"> Sale</label>
                    <label class="checkbox-inline sale_price" style="padding-top:0px;display:none;"><input type="input" class="form-control " name="sale_price" placeholder="<?php echo front_lang('sale_price');?>" value="<?php if($result['sale_price'] != NULL){ echo $result['sale_price'];}else{echo set_value('sale_price');}?>" id="sale"></label>
                </div>
            </div>
            
            <div class="form-group col-sm-12 " >
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('images');?></label>
                <div class="col-sm-10" style="padding-left:0px;">
                    <div id="fileuploader"></div>
                </div>
            </div>
            
            <div class="form-group col-sm-12 action" style="<?php if(!empty($images)){echo 'display:block'; }else{echo 'display:none'; }?>">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                   <div id="_files">
                       <?php if(!empty($images)):?>
                           <?php foreach($images as $key => $value):?>
                                <?php $avarta = $key.'.'.$value;?>
                                <div id="img-<?php echo $key;?>" class="row action-value">
                                    <div class="form-group gr-<?php echo $key;?> col-sm-6">
                                        <input type="text" value="<?php echo $key;?>" id="<?php echo $key.'.'.$value;?>" name="images[<?php echo $key.'.'.$value;?>]" class="form-control images-name" />
                                    </div>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SITE_URL.'upload/product/'.$key.'.'.$value;?>" class="action-image"/>
                                    </div>
                                    <div class="col-sm-4">
                                        <label style="padding-left:15px;" class="checkbox-inline">
                                            <input type="checkbox" value="<?php echo $value;?>" <?php  if(!empty($images_color[$avarta])){echo $images_color[$avarta];}?> name="images_color[<?php echo $key.'.'.$value;?>]" class="<?php echo $key;?>">
                                            Ảnh màu
                                        </label>
                                        <label style="padding-left:15px;" class="checkbox-inline">
                                            <input type="radio" value="<?php echo $key;?>" <?php if($avarta == $result['avarta']){ echo 'checked = ""';}?> name="avarta" class="<?php echo $key;?>">Ảnh đại diện
                                        </label>
                                        <label style="padding-left:15px;" class="checkbox-inline">
                                            <button class="btn btn-danger btn-xs" onclick="Delete_images('<?php echo $key.'.'.$value;?>',<?php echo $result['id'];?>);" type="button">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </label>
                                    </div> 
                                </div>
                           <?php endforeach;?>
                       <?php endif?>
                   </div>
                </div>
            </div>         

            <div class="form-group col-sm-12 ">
                <label class="col-sm-2 control-label" for="subject">Active</label>
                <div class="col-sm-10">
                    <input type="checkbox" <?php if($result['status'] == 1){echo 'checked = ""';}?> name="status" value="1">
                </div>
            </div>
        </form>
    </div>
</div>
<link href="<?php echo base_url('assets/admin');?>/css/uploadify/uploadfile.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url('assets/admin');?>/js/plugins/uploadify/jquery.uploadfile.min.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function($) {
        $('.btn-index').css({display:'none'});
        $('.btn-edit').css({display:'none'});
        $('.btn-copy').css({display:'none'});
        $('.btn-add').css({display:'inline-block'});
        $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
        $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});

        $('#sale').on('ifChecked', function(event){
            $('.sale_price').show();
        });

        $('#sale').on('ifUnchecked', function(event){
            $('.sale_price').hide();
        });
        <?php if(!empty($result['sale_price'])){
            echo '$(".sale_price").show();';
        }else{
            echo '$(".sale_price").hide();';
        }?>
    });

    
    CKEDITOR.replace('info');
    
    function New(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        for (info in CKEDITOR.instances) {
            CKEDITOR.instances[info].updateElement();
        }
        var data = $('#frm_product_New').serialize();
        $.post($('#frm_product_New').attr('action'),data,function(result){
            $(".contentt").unmask();
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
                window.location.href = result.url;
            }
        },'json');
    }

    function back_to_list(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        $(".content").load('<?php echo base_url("admin/product/list_all");?>',function(){
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
        });
    }

    /*$("#fileuploader").uploadFile({
        url:"<?php SITE_URL?>/admin/product/upload",
        fileName:"file",
        multiple:true,
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
                        url : '<?php SITE_URL?>/admin/product/deleteImage',
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
            $("#_files").append("<div class=\"row action-value\" id=\"img-"+id[0]+"\"><div class=\"form-group gr-"+id[0]+" col-sm-6\"><input  type=\"text\" class=\"form-control images-name\" name=\"images["+response+"]\" id=\""+response+"\" value=\""+id[0]+"\" /></div><div class=\"col-sm-2\"><img class=\"action-image\"  src=\"<?php echo SITE_URL;?>upload/product/"+response+"\"></div><div class=\"col-sm-4\"><label class=\"checkbox-inline\" style=\"padding-left:15px;\"><input class=\"img-"+id[0]+"\" type=\"checkbox\" name=\"images_color["+response+"]\" value=\""+response+"\"> <?php front_lang('images_color');?> </label><label class=\"checkbox-inline\" style=\"padding-left:15px;\"><input class=\"img-"+id[0]+"\"   type=\"radio\" name=\"avarta\" value=\""+id[0]+"\"> <?php front_lang('avatar');?> </label></div> </div>"); 
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
            $('.images-name').change(function(event) {
                var id          = <?php echo $result['id'];?>;
                var value       = $(this).val();
                var old         = $(this).attr('id');
                var id_check    = $(this).parents().parents().attr('id');
                $("."+id_check).attr('value',value);
                $.post('<?php echo base_url("admin/product/check_file"); ?>', {namefile:value,old_file:old,id_pro:id} , function(result) {
                    if(result.error == 1){
                        $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        $('.gr-'+result.id).removeClass('has-success');
                        $('.gr-'+result.id).addClass('has-error');
                        $('.gr-'+result.id).append('<p>'+result.warning+'</p>');
                    }else if(result.error == 0){
                        $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        $('.gr-'+result.id).removeClass('has-error');
                        $('.gr-'+result.id).addClass('has-success');
                        $('.gr-'+result.id).append('<p style="">'+result.warning+'</p>');
                    }
                },'json');
            });
        },
    });*/

    $("#fileuploader").uploadFile({
        url:"<?php SITE_URL?>/admin/product/upload",
        fileName:"file",
        multiple:true,
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
            var change_name  = $(".dl-"+name[0]).val();
            var info = change_name+'.'+name[1];
            $("#img-"+name[0]).remove();
            setTimeout(function () {
                $.ajax({
                        url : '<?php SITE_URL?>/admin/product/deleteImage',
                        type: "POST",
                        data : {url:info},
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
            $("#_files").append("<div class=\"row action-value\" id=\"img-"+id[0]+"\"><div class=\"form-group gr-"+id[0]+" col-sm-6\"><input  type=\"text\" class=\"form-control images-name dl-"+id[0]+"\" name=\"images["+response+"]\" id=\""+response+"\" value=\""+id[0]+"\" /></div><div class=\"col-sm-2\"><img class=\"action-image\"  src=\"<?php echo SITE_URL;?>upload/product/"+response+"\"></div><div class=\"col-sm-4\"><label class=\"checkbox-inline\" style=\"padding-left:15px;\"><input class=\"img-"+id[0]+"\" type=\"checkbox\" name=\"images_color["+response+"]\" value=\""+id[0]+"\"> <?php front_lang('images_color');?> </label><label class=\"checkbox-inline\" style=\"padding-left:15px;\"><input class=\"img-"+id[0]+"\"   type=\"radio\" name=\"avarta\" value=\""+id[0]+"\"> <?php front_lang('avatar');?> </label></div> </div>");
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
            $('.images-name').change(function(event) {
                var value       = $(this).val();
                var old         = $(this).attr('id');
                var id_check    = $(this).parents().parents().attr('id');
                $("."+id_check).attr('value',value);
                $.post('<?php echo base_url("admin/product/check_file"); ?>', {namefile:value,old_file:old} , function(result) {
                    if(result.error == 1){
                        $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        $('.gr-'+result.id).removeClass('has-success');
                        $('.gr-'+result.id).addClass('has-error');
                        $('.gr-'+result.id).append('<p>'+result.warning+'</p>');
                    }else if(result.error == 0){
                        $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                        $('.gr-'+result.id).removeClass('has-error');
                        $('.gr-'+result.id).addClass('has-success');
                        $('.gr-'+result.id).append('<p style="">'+result.warning+'</p>');
                    }
                },'json');
            });
        },
    });

    function Delete_images(data,mid){
        $.post('<?php echo base_url("admin/product/deleteImage"); ?>', {url:data,id:mid} , function(result) {
            if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
            }else{
                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                var name  = data.split('.');
                $("#img-"+name[0]).hide();
                $("#img-"+name[0]).remove() = true;
            }
        },'json');
    }
   $('.images-name').change(function(event) {
        var id          = <?php echo $result['id'];?>;
        var value       = $(this).val();
        var old         = $(this).attr('id');
        var id_check    = $(this).parents().parents().attr('id');
        $("."+id_check).attr('value',value);
        $.post('<?php echo base_url("admin/product/check_file"); ?>', {namefile:value,old_file:old,id_pro:id} , function(result) {
            if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.gr-'+result.id).removeClass('has-success');
                $('.gr-'+result.id).addClass('has-error');
                $('.gr-'+result.id).append('<p>'+result.warning+'</p>');
            }else if(result.error == 0){
                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'successful account registration!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.gr-'+result.id).removeClass('has-error');
                $('.gr-'+result.id).addClass('has-success');
                $('.gr-'+result.id).append('<p style="">'+result.warning+'</p>');
            }
        },'json');
    });
</script>