<div class="row">
	<div class="col-sm-6">
	    <ul class="user-info">
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Username</div>
	                <div class="col-sm-8"><span class="text-muted"><?php echo $this->session->userdata('session_user');?></span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Full Name</div>
	                <div class="col-sm-8"><span class="text-muted"><?php echo $this->session->userdata('session_fullname');?></span></span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Last Name</div>
	                <div class="col-sm-8"><span class="text-muted"></span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Role</div>
	                <div class="col-sm-8"><span class="text-muted"><?php if($this->session->userdata('session_level') == 1){echo 'Administrator';}else if($this->session->userdata('session_level') == 2){echo 'Uploader';}else{echo 'Member';}?></span></div>
	            </div>
	        </li>
	    </ul>
	</div>
	<div class="col-sm-6">
	    <ul class="user-info">
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Email</div>
	                <div class="col-sm-8"><span class="text-muted"><?php echo $this->session->userdata('session_email');?></span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Public Profile</div>
	                <div class="col-sm-8"><span class="text-muted"> Yes </span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Joined</div>
	                <div class="col-sm-8"><span class="text-muted">04-03-2015</span></div>
	            </div>
	        </li>
	        <li>
	            <div class="row">
	                <div class="col-sm-4">Last login</div>
	                <div class="col-sm-8"><span class="text-muted">Friday 12 June 2015 00:52</span></div>
	            </div>
	        </li>
	    </ul>
	</div>
</div>