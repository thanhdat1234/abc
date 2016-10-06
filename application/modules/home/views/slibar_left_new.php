 
<!-- ./breadcrumb -->
<!-- row -->
<div class="row">
<!-- Left colunm -->
<div class="column col-xs-12 col-sm-3" id="left_column">
    <!-- Blog category -->
    <div class="block left-module">
        <p class="title_block"><?php front_lang('infomation');?></p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered layered-category">
                <div class="layered-content">
                    <ul class="tree-menu">
                        <li class="active"><span></span><a href="<?php echo SITE_URL.'gioi-thieu.html'?>"><?php front_lang('about');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'van-chuyen.html'?>"><?php front_lang('transport');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'thanh-toan.html'?>"><?php front_lang('pay');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'doi-tra.html'?>"><?php front_lang('lie');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'ho-tro.html'?>"><?php front_lang('support');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'lien-he.html'?>"><?php front_lang('contact');?></a></li>
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <!-- ./blog category  -->
    <!-- Popular Posts -->
    <div class="block left-module">
        <p class="title_block"><?php front_lang('popular_posts');?></p>
        <div class="block_content">
            <!-- layered -->
            <div class="layered">
                <div class="layered-content">
                    <ul class="blog-list-sidebar clearfix">
                        <?php foreach($top_view as $value):?>
                            <?php 
                                if($value['category'] == 0){
                                    $url = 'xu-huong-thoi-trang';  
                                }else{
                                    $url = 'khuyen-mai';  
                                }
                            ?>
                        <li>
                            <div class="post-thumb">
                                <a href="<?php echo base_url().$url.'/'.$value['rewrite_link'].'-n'.$value['id'].'.html';?>" title="<?php echo $value['title'];?>">
                                    <?php if(!empty($value['images'])){?>
                                        <img src="<?php echo SITE_URL.$value['images']?>" alt="<?php echo $value['title'];?>">
                                    <?php }else{ ?>
                                        <img src="<?php echo SITE_URL.$value['avarta']?>" alt="<?php echo $value['title'];?>">
                                    <?php }?>
                                </a>
                            </div>
                            <div class="post-info">
                                <h5 class="entry_title"><a href="<?php echo base_url().$url.'/'.$value['rewrite_link'].'-n'.$value['id'].'.html';?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></h5>
                                <div class="post-meta">
                                    <span class="date"><i class="fa fa-calendar"></i> <?php echo $value['created'];?></span>
                                </div>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <!-- ./Popular Posts -->
    <!-- ./Banner -->
</div>
<!-- ./left colunm -->