<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo SITE_URL;?>" title="Return to Home"><?php front_lang('home');?></a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page"><?php echo $breadcrumb;?></span>
            </div>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h1 class="page-heading">
                    <span class="page-heading-title2"><?php echo $result['title'];?></span>
                </h1>
                <article class="entry-detail">
                    <div class="entry-meta-data">
                        <span class="author">
                        <i class="fa fa-user"></i> 
                        by: <a href="#">Admin</a></span>
                        <span class="cat">
                            <i class="fa fa-folder-o"></i>
                            <a href="#">News, </a>
                            <a href="#">Promotions</a>
                        </span>
                        <span class="date"><i class="fa fa-calendar"></i> <?php echo $result['created'];?></span>
                    </div>
                    <div class="entry-photo" style="text-align: center;">
                       <?php if(!empty($result['images'])){?>
                            <img src="<?php echo SITE_URL.$result['images'];?>" alt="<?php echo $result['title'];?>">
                       <?php }else{ ?>
                            <img src="<?php echo SITE_URL.$result['avarta'];?>" alt="<?php echo $result['title'];?>">
                       <?php }?>
                    </div>
                    <div class="content-text clearfix">
                       <?php echo $result['info'];?>
                    </div>
                </article>
                <!-- Related Posts -->
                <div class="single-box">
                    <h2>Related Posts</h2>
                    <?php if(!empty($random_news)){ ?>
                    <?php foreach($random_news as $value):?>
                    <ul class="related-posts owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":3}}'>
                        <?php foreach($value as $v): ?>
                            <?php 
                                if($v['category'] == 0){
                                    $url = 'xu-huong-thoi-trang';  
                                }else{
                                    $url = 'khuyen-mai';  
                                }
                            ?>
                        <li class="post-item">
                            <article class="entry">
                                <div class="entry-thumb image-hover2">
                                    <a href="<?php echo base_url().$url.'/'.$v['rewrite_link'].'-n'.$v['id'].'.html';?>" title="<?php echo $v['title']?>">
                                        <img src="<?php echo SITE_URL.$v['images'] ?>" alt="Blog">
                                    </a>
                                </div>
                                <div class="entry-ci">
                                    <h3 class="entry-title"><a href="<?php echo base_url().$url.'/'.$v['rewrite_link'].'-n'.$v['id'].'.html';?>" title="<?php echo $v['title']?>"><?php echo $v['title']?></a></h3>
                                    <div class="entry-meta-data">
                                        <span class="date">
                                            <i class="fa fa-calendar"></i> <?php echo $v['created'];?>
                                        </span>
                                    </div>
                                    <div class="entry-more">
                                        <a href="<?php echo base_url().$url.'/'.$v['rewrite_link'].'-n'.$v['id'].'.html';?>" title="<?php echo $v['title']?>">Read more</a>
                                    </div>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    <?php endforeach; ?>
                    <?php } ?>
                </div>
                <!-- ./Related Posts -->
                <!-- Comment -->
            </div>
            <?php $this->load->view('slibar_left_new');?>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>