<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-sliderpaper-o" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/slider/edit/'.$result['id'].'');?>" id="frm_slider_New" class="form-horizontal"   method="post"  enctype="multipart/form-data">
            <div class="form-group col-sm-9 <?php if(form_error('color') != NULL){echo 'has-error';}else if(!empty($error_slider)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-3 control-label">
                   <?php echo front_lang('color');?> <span style="color: red;">*</span>
                </label>
                <div class="input-group col-sm-9 my-colorpicker1 colorpicker-element">
                    <input type="text" name="color" class="form-control" value="<?php if($result['color'] != NULL){ echo $result['color'];}else{echo set_value('color');}?>">
                    <div class="input-group-addon">
                        <i style="background-color: rgb(0, 0, 0);"></i>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12 " >
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('images');?></label>
                <div class="col-sm-10" style="padding-left:0px;">
                    <div id="fileuploader"></div>
                </div>
            </div>
            
            <div class="form-group col-sm-12 action" style="display:none;">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                   <div id="_files"></div>
                    <input type="hidden" name="images" value="<?php if($result['images'] != NULL){ echo $result['images'];}else{echo set_value('images');}?>"/>
                    <input type="hidden" class="new_images" name="new_images" value="">
                </div>
            </div>         
            
            <div class="form-group col-sm-12 action">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                   <div >
                       <img id="defin_files" src="<?php echo SITE_URL.'upload/slider/'.$result['images'].'';?>" width="100" height="100" alt="">
                   </div>
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
    jQuery(document).ready(function($) {
        $('.btn-index').css({display:'none'});
        $('.btn-edit').css({display:'none'});
        $('.btn-copy').css({display:'none'});
        $('.btn-add').css({display:'inline-block'});
        $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
        $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
    });

    
    function New(){
        for (info in CKEDITOR.instances) {
            CKEDITOR.instances[info].updateElement();
        }
        var data = $('#frm_slider_New').serialize();
        $.post($('#frm_slider_New').attr('action'),data,function(result){
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
        $(".content").load('<?php echo base_url("admin/slider/list_all");?>',function(){
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
        });
    }

    $("#fileuploader").uploadFile({
        url:"<?php SITE_URL?>/admin/slider/upload",
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
                        url : '<?php SITE_URL?>/admin/slider/deleteImage',
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
            $("#_files .new_images").attr('value',response);
            var img = '<?php echo SITE_URL."upload/slider/";?>'+response
            $("#defin_files").attr('src',img);
            $(".new_images").attr('value',response);
        }
    });
    $(".my-colorpicker1").colorpicker();
</script>