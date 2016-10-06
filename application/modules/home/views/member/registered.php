 <form action="<?php echo base_url('home/registered')?>" method="post" id="frm-registered">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <img src="<?php echo base_url('assets/home/images/logo.png');?>" class="img-reponsive" alt="logo">
  </div>
  <div class="modal-body">
  	  <div class="form-group has-error text-center">
  	  	<?php if(isset($error)){echo $error;}?>
  	  </div>
   	  <div class="form-group <?php if(form_error('user_name') != NULL){echo 'has-error';}?> text-center">
	    <label class="col-sm-3" for="exampleInputEmail1"><span style="color: red;">*</span> User name</label>
	    <div class="input-group col-sm-9">
	    	<span class="input-group-addon"><i class="fa fa-user"></i></span>
		    <input type="text" name="user_name" class="form-control" id="exampleInputUsername" placeholder="Enter username" value="<?php echo set_value('user_name');?>">
	    </div>
	    <?php echo form_error('user_name','<p class="help-block">','</p>');?>
	  </div>
	  <div class="form-group <?php if(form_error('user_password') != NULL){echo 'has-error';}?> text-center">
	    <label class="col-sm-3" for="exampleInputEmail1"><span style="color: red;">*</span> Password</label>
	     <div class="input-group col-sm-9">
	    	<span class="input-group-addon"><i class="fa fa-key"></i></span>
	    	<input type="password" name="user_password" value="<?php echo set_value('user_password');?>" class="form-control" id="exampleInputPass" placeholder="Enter password">
		</div>
		<?php echo form_error('user_password','<p class="help-block">','</p>');?>
	  </div>
	  <div class="form-group <?php if(form_error('user_repass') != NULL){echo 'has-error';}?> text-center">
	    <label class="col-sm-3" for="exampleInputEmail1"><span style="color: red;">*</span> Re-password</label>
	     <div class="input-group col-sm-9">
	    	<span class="input-group-addon"><i class="fa fa-key"></i></span>
	    	<input type="password" name="user_repass" value="<?php echo set_value('user_repass');?>" class="form-control" id="exampleInputRePass" placeholder="Retype password">
		</div>
		<?php echo form_error('user_repass','<p class="help-block">','</p>');?>
	  </div>
	  <div class="form-group <?php if(form_error('user_email') != NULL){echo 'has-error';}?> text-center">
	    <label class="col-sm-3" for="exampleInputEmail1"><span style="color: red;">*</span> Email</label>
	    <div class="input-group col-sm-9">
	    	<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
	    	<input type="user_email" name="user_email" value="<?php echo set_value('user_email');?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		</div>
		<?php echo form_error('user_email','<p class="help-block">','</p>');?>
	  </div>
  </div>
  <div class="modal-footer text-center">
  	<div class="row text-center">
  		<button type="button" name="registered" class="btn btn-primary btn-regis">New Member</button>
  		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  	</div>
  </div>
</form>
<script src="<?php echo base_url('assets/home')?>/js/scripts.js" type="text/javascript"></script>