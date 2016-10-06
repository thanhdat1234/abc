<form  action="<?php echo base_url('change.html');?>" id="frm-change-pass" role="form" method="post">
    <?php if(!empty($error)){ echo $error;}?>
    <div class="form-group <?php if(form_error('old_password') != NULL){echo 'has-error';}?>">
        <label for="old_password"><span class="text-muted">Current password</span></label>
        <input class="form-control" id="old_password" name="old_password" placeholder="Old password" type="password">
        <?php echo form_error('old_password','<p class="help-block">','</p>');?>
    </div>
    <div class="form-group <?php if(form_error('new_password') != NULL){echo 'has-error';}?>">
        <label for="new_password"><span class="text-muted">New Password</span></label>
        <input class="form-control" id="new_password" name="new_password" placeholder="New password" type="password">
        <?php echo form_error('new_password','<p class="help-block">','</p>');?>
    </div>
    <div class="form-group <?php if(form_error('repeat_new_password') != NULL){echo 'has-error';}?>">
        <label for="repeat_new_password"><span class="text-muted">Repeat Password</span></label>
        <input class="form-control" id="repeat_new_password" name="repeat_new_password" placeholder="Repeat new password" type="password">
        <?php echo form_error('repeat_new_password','<p class="help-block">','</p>');?>
    </div>
    <button type="submit" class="btn btn-primary" name="change" onclick="change_pass()"><i class="fa fa-check"></i> Apply</button>
</form>