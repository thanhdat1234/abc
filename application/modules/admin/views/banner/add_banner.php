<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
        	<i class="fa fa-bannerpaper-o" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="<?php echo base_url('admin/banner/add/').'/'.$type;?>" id="frm_banner_New" class="form-horizontal"   method="post"  enctype="multipart/form-data">
			<div class="form-group col-sm-9 <?php if(form_error('color') != NULL){echo 'has-error';}else if(!empty($error_banner)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-3 control-label">
                   <?php echo front_lang('link');?> <span style="color: red;">*</span>
                </label>
                <div class="input-group col-sm-9">
                    <input type="text" name="link" class="form-control" value="<?php echo set_value('link');?>">
                </div>
                <?php echo form_error('color','<p class="help-block">','</p>');?>
            </div>
            <?php if($type == 3){ ?>
                <div class="form-group col-sm-9">
                    <label class="col-sm-3 control-label" for="subject">Chọn cột</label>
                    <div class="col-sm-9" style="padding-left:0px">
                        <select name="colum" class="form-control">
                            <option value="1">Trái</option>
                            <option value="2">Phải</option>
                        </select>
                    </div>
                </div>
            <?php } ?>
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
        var data = $('#frm_banner_New').serialize();
		$.post($('#frm_banner_New').attr('action'),data,function(result){
			if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i><?php echo 'There is an error, please check again!'; ?> ",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content').html(result.content);
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
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
    	$(".content").load('<?php echo base_url("admin/banner/list_all")."/".$type;?>',function(){
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
            var id  = response.split('.');
            $("#_files").append("<input  type=\"hidden\" class=\"form-control images-name\" name=\"images\" id=\""+response+"\" value=\""+response+"\" />");
        }
    });
</script>