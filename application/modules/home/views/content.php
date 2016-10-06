<section id="content">
	<!--CONTENT-->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php $this->load->view($template); ?>
				<?php if(!empty($sidebar)){$this->load->view($sidebar);}?>
			</div>
		</div>
	</div>
</section>