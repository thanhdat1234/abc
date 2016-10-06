<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
        	<i class="fa fa-user" style="color:<?php echo $color?>"></i> <?php echo $title?> 
        </h3>
    </div>
</div>
<div class="row">
	<div class="col-sm-12">
		<form action="<?php echo base_url('admin/users/edit/'.$result['iduser'].'/'.$page.'');?>" id="frm_User_New" class="form-horizontal"   method="post" onsubmit="return false;">
			<div class="form-group <?php if(form_error('user_name') != NULL){echo 'has-error';}else if(!empty($error_user)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Users name <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" readonly="" name="user_name" value = "<?php if(!empty($result)){echo $result['username'];}else{echo set_value('user_name');}?>">
                	<?php echo form_error('user_name','<p class="help-block">','</p>');?>
                    <?php if(!empty($error_user)){echo '<p class="help-block">'.$error_user.'</p>';}?>
                </div>
            </div>

			<div class="form-group <?php if(form_error('user_email') != NULL){echo 'has-error';}else if(!empty($error_mail)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Email <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input name="user_email" class="form-control" placeholder="Enter Email" value="<?php if(!empty($result)){echo $result['user_email'];}else{echo set_value('user_email');}?>" id="user_email" type="text">
                	<?php echo form_error('user_email','<p class="help-block">','</p>');?>
                    <?php if(!empty($error_mail)){echo '<p class="help-block">'.$error_mail.'</p>';}?>
                </div>
            </div>

			<div class="form-group <?php if(form_error('user_fullname') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Fullname 
                </label>
                <div class="col-sm-10">
                    <input name="user_fullname" class="form-control" placeholder="Enter Fullname" value="<?php if(!empty($result)){echo $result['user_fullname'];}else{echo set_value('user_fullname');}?>" id="user_fullname" type="text">
                	<?php echo form_error('user_fullname','<p class="help-block">','</p>');?>
                </div>
            </div>

			<div class="form-group <?php if(form_error('user_password') != NULL){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Password <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input name="user_password" class="form-control" placeholder="Enter Password" value="<?php echo set_value('user_password');?>" id="user_password" type="password">
                	<?php echo form_error('user_password','<p class="help-block">','</p>');?>
                </div>
            </div>

			<div class="form-group <?php if(form_error('user_repass') != NULL){echo 'has-error';}else if(!empty($error_re)){echo 'has-error';}?>">
                <label for="subject" class="col-sm-2 control-label">
                   Re-enter password <span style="color: red;">*</span>
                </label>
                <div class="col-sm-10">
                    <input name="user_repass" class="form-control" placeholder="Enter Re-enter password" value="<?php echo set_value('user_repass');?>" id="user_repass" type="password">
                	<?php echo form_error('user_repass','<p class="help-block">','</p>');?>
                    <?php if(!empty($error_re)){echo '<p class="help-block">'.$error_re.'</p>';}?>
                </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-2 control-label" for="subject">Role</label>
                <div class="col-sm-10">
	                <select name="role" class="form-control">
                        <?php if(!empty($role))?>
                            <?php foreach($role as $value):?>
                                <option value="<?php echo $value['role_id']?>" <?php if($value['role_id'] == $result['usergroup']){ echo 'selected';} ?> ><?php echo $value['role_name'] ?></option>
                            <?php endforeach;?>
                    </select>
	            </div>
            </div>
		
			<div class="form-group ">
                <label class="col-sm-2 control-label" for="subject">Active</label>
                <div class="col-sm-10">
	                <input type="checkbox" name="active" value="1" <?php if($result['user_activation'] == 1){echo 'checked = ""';}?>>
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
		$.post($('#frm_User_New').attr('action'),$('#frm_User_New').serialize(),function(result){
			$(".contentt").unmask();
			if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i> <?php echo 'There is an error, please check again!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content').html(result.content);
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
            }else{
                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'updated successfully!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});                
                $('.content').load(result.url,function(){
                    $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                    $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                });
            }
		},'json');
	}

    function Apply(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        $.post($('#frm_User_New').attr('action'),$('#frm_User_New').serialize(),function(result){
            $(".contentt").unmask();
            $('.content').html(result.content);
            if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i> <?php echo 'There is an error, please check again!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
            }else{
                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'updated successfully!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
            }
        },'json');
    }

    function back_to_list(){
    	$(".content").mask("<?php echo 'Loading...'; ?>");
    	$(".content").load('<?php echo base_url("admin/users/list_all");?>',function(){
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
        });
    }
</script>