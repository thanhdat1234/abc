<div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">List film like</a>
        </li>
        <li role="presentation">
            <a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">List film box</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
			<div class="row">
				<?php if(!empty($result_filmlike)){ foreach($result_filmlike as $value):?>
				<div class="col-md-3 col-sm-6">
					<div class="poster">
						<a href="<?php echo base_url('info').'/'.$value['rewrite'].'-f'.$value['idphim'].'.html'?>" title="">
							<span class="<?php if($value['hot'] == 1){echo 'hot';}else{echo 'hot-full';}?>"></span>
							<span class="over_play"><i class="fa fa-play"></i></span>
							<img class="img-responsive" src="<?php echo $value['thumb']; ?>" alt="<?php echo $value['name']; ?>">
						</a>
						<div class="caption">
							<h4><a href="<?php echo base_url('info').'/'.$value['rewrite'].'-f'.$value['idphim'].'.html'?>" title="<?php echo $value['name'];?>"> <?php echo $value['name']; ?></a></h4>
						</div>
					</div>
				</div>
				<?php endforeach; }?>
			</div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab">
			<div class="row">
				<?php if(!empty($result_boxfilm)){ foreach($result_boxfilm as $value):?>
				<div class="col-md-3 col-sm-6">
					<div class="poster">
						<a href="<?php echo base_url('info').'/'.$value['rewrite'].'-f'.$value['idphim'].'.html'?>" title="">
							<span class="<?php if($value['hot'] == 1){echo 'hot';}else{echo 'hot-full';}?>"></span>
							<span class="over_play"><i class="fa fa-play"></i></span>
							<img class="img-responsive" src="<?php echo $value['thumb']; ?>" alt="<?php echo $value['name']; ?>">
						</a>
						<div class="caption">
							<h4><a href="<?php echo base_url('info').'/'.$value['rewrite'].'-f'.$value['idphim'].'.html'?>" title="<?php echo $value['name'];?>"> <?php echo $value['name']; ?></a></h4>
						</div>
					</div>
				</div>
				<?php endforeach; }?>
			</div>
        </div>
    </div>
</div>
