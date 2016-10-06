<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
            <i class="fa fa-bannerpaper-o" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <form action="<?php echo base_url('admin/banner/edit/'.$result['id'].'/'.$page.'');?>" id="frm_banner_New" class="form-horizontal"   method="post"  enctype="multipart/form-data">
            <div class="form-group col-sm-9 <?php if(form_error('color') != NULL){echo 'has-error';}else if(!empty($error_banner)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-3 control-label">
                   <?php echo front_lang('link');?> <span style="color: red;">*</span>
                </label>
                <div class="input-group col-sm-9">
                    <input type="text" name="link" class="form-control" value="<?php if($result['link'] != NULL){ echo $result['link'];}else{echo set_value('link');}?>">
                </div>
                <?php echo form_error('color','<p class="help-block">','</p>');?>
            </div>
            <?php if($result['type'] == 3){ ?>
                <div class="form-group col-sm-9">
                    <label class="col-sm-3 control-label" for="subject">Chọn cột</label>
                    <div class="col-sm-9" style="padding-left:0pxs">
                        <select name="colum" class="form-control">
                            <option value="1"  <?php if($result['colum'] == 1){ echo 'selected';}?>>Trái</option>
                            <option value="2" <?php if($result['colum'] == 2){ echo 'selected';}?>>Phải</option>
                        </select>
                    </div>
                </div>
            <?php } ?>

            <div class="form-group col-sm-12 " >
                <label class="col-sm-2 control-label" for="subject"></label>
                <div class="col-sm-10" style="padding-left:0px;">
                    <div id="fileuploader"></div>
                </div>
            </div>
            
            <div class="form-group col-sm-12 action" style="display:none;">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                   <div id="_files">
                       <input type="hidden" name="images" value="<?php if($result['images'] != NULL){ echo $result['images'];}else{echo set_value('images');}?>"/>
                       <input type="hidden" class="new_images" name="new_images" value="">
                   </div>
                </div>
            </div> 
            <input type="hidden" name="type" value="<?php echo $result['type'];?>">
            <div class="form-group col-sm-12 action">
                <label class="col-sm-2 control-label" for="subject"><?php echo front_lang('action');?></label>
                <div class="col-sm-10">
                   <div >
                        <?php if($result['type'] == 3){ ?>
                            <img id="defin_files" src="<?php echo SITE_URL.'upload/banner/'.$result['images'];?>" >
                        <?php }else{ ?>
                            <img id="defin_files" src="<?php echo SITE_URL.'upload/banner/'.$result['images'];?>" width="100" height="100" alt="">
                        <?php }?>
                   </div>
                </div>
            </div> 
                
            <div class="form-group col-sm-12 ">
                <label class="col-sm-2 control-label" for="subject">Active</label>
                <div class="col-sm-10">
                    <input type="checkbox" <?php if($result['status'] == 1){echo "checked";}?> name="status" value="1">
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
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var data = $('#frm_banner_New').serialize();
        $.post($('#frm_banner_New').attr('action'),data,function(result){
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
        $(".content").load('<?php echo base_url("admin/banner/list_all")."/".$result["type"];?>',function(){
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
        });
    }

    $("#fileuploader").uploadFile({
        url:"<?php SITE_URL?>/admin/banner/upload",
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
                        url : '<?php SITE_URL?>/admin/banner/deleteImage',
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
            var img = '<?php echo SITE_URL."upload/banner/";?>'+response
            $("#defin_files").attr('src',img);
            $(".new_images").attr('value',response);
        }
    });
</script>