<div class="columns-container">
    <div class="container" id="columns">
            <?php $this->load->view('slibar_left_new');?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h2 class="page-heading">
                    <span class="page-heading-title2"><?php front_lang('blog_post');?></span>
                </h2>
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <?php echo $this->pagination->create_links();?>
                          </ul>
                        </nav>
                    </div>
                </div>
                <ul class="blog-posts">
                    <?php if(!empty($list_post)){ ?>
                        <?php foreach($list_post as $value):?>
                        <li class="post-item">
                            <article class="entry">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="entry-thumb image-hover2">
                                            <a href="<?php echo $seo_url.'/'.$value['rewrite_link'].'-n'.$value['id'].'.html';?>" title="<?php echo $value['title']?>">
                                               <?php if(!empty($value['images'])){ ?>
                                                    <img src="<?php echo SITE_URL.$value['images'];?>" alt="<?php echo $value['title']?>">
                                               <?php }else{ ?>
                                                    <img src="<?php echo SITE_URL.$value['avarta'];?>" alt="<?php echo $value['title']?>">
                                               <?php }?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="entry-ci">
                                            <h3 class="entry-title"><a href="<?php echo $seo_url.'/'.$value['rewrite_link'].'-n'.$value['id'].'.html';?>" title="<?php echo $value['title']?>"><?php echo $value['title']?></a></h3>
                                            <div class="entry-meta-data">
                                                <span class="author">
                                                <i class="fa fa-user"></i> 
                                                by: <a href="#">Admin</a></span>
                                                <span class="date"><i class="fa fa-calendar"></i> <?php echo $value['created'];?></span>
                                            </div>
                                            <div class="entry-excerpt">
                                               <p><?php echo $value['description'];?></p>
                                            </div>
                                            <div class="entry-more">
                                                <a href="<?php echo $seo_url.'/'.$value['rewrite_link'].'-n'.$value['id'].'.html';?>" title="<?php echo $value['title']?>">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </li>
                        <?php endforeach;?>
                    <?php } ?>
                </ul>
                <div class="sortPagiBar clearfix">
                    <div class="bottom-pagination">
                        <nav>
                          <ul class="pagination">
                            <?php echo $this->pagination->create_links();?>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>