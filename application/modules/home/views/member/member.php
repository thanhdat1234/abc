<!--CONTENT-LEFT-->
	<!--FILM-CATEGORY-->
	<div class="col-md-3">
		<div class="user-avatar"></div>
		<div class="panel panel-default user-menu">
			<div class="panel-heading ">
				User Menu
			</div>
			<div class="panel-body">
			  	<ul>
			  		<li><a href="<?php echo base_url('profile.html');?>" title="my profile"><i class="fa fa-user"></i> MY PROFILE</a></li>
			  		<li><a href="<?php echo base_url('change.html');?>" title="change password"><i class="fa fa-key"></i> CHANGE PASSWORD</a></li>
			  		<li><a href="<?php echo base_url('list-box.html');?>" title="list film"><i class="fa fa-list"></i> LIST FILM</a></li>
			  		<li><a href="<?php echo base_url('logout.html')?>" title="sign out"><i class="fa fa-sign-out"></i> SIGN OUT</a></li>
			  	</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 member">
		<div class="second-child"><h3><?php echo $title;?></h3></div>
		<?php $this->load->view($menu_template);?>
	</div>
<!--END CONTETN-LEFT-->