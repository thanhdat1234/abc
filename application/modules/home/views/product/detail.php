
<div id="fb-root"></div>
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
           <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo SITE_URL;?>" title="Return to Home"><?php front_lang('home');?></a>
                <span class="navigation-pipe">&nbsp;</span>
                <span class="navigation_page"><?php echo $breadcrumb;?></span>
            </div>
            <!-- ./left colunm -->
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-6">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div class="product-full">
                                        <img id="product-zoom" src='<?php echo SITE_URL.'upload/product/'.$result['avarta'];?>' data-zoom-image="<?php echo SITE_URL.'upload/product/'.$result['avarta'];?>"/>
                                    </div>
                                    <div class="product-img-thumb" id="gallery_01">
                                        <?php if(!empty($images)){?>
                                        <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                            <?php foreach($images as $value):?>
                                                <li>
                                                    <a href="javascript:void(0)" data-image="<?php echo SITE_URL.'upload/product/'.$value;?>" title="<?php echo $value;?>" data-zoom-image="<?php echo SITE_URL.'upload/product/'.$value;?>">
                                                        <img id="product-zoom"  src="<?php echo SITE_URL.'upload/product/'.$value;?>" alt="<?php echo $value;?>"/> 
                                                    </a>
                                                </li>
                                            <?php endforeach;?> 
                                        </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-6">
                                <h1 class="product-name"><?php echo $result['product_name']; ?></h1>
                                <div class="product-price-group">
                                    <?php if($result['sale'] == 1){ ?>
                                        <label for="">Giá sản phẩm: </label> <span class="price"><?php echo number_format($result['sale_price'],0,'','.'); ?> VNĐ</span>
                                        <label for="">Giá cũ:</label> <span class="old-price"><?php echo number_format($result['price'],0,'','.'); ?> VNĐ</span>
                                        <span class="discount"><?php echo $result['pecent'];?> %</span>
                                    <?php }else{ ?>
                                        <label for="">Giá sản phẩm:</label> <span class="price"><?php echo number_format($result['price'],0,'','.'); ?> VNĐ</span>
                                    <?php }?>
                                </div>
                                <div class="product-desc">
                                    <p><?php echo $result['description']; ?></p>
                                </div>
                                <div class="form-option">
                                    <p class="form-option-title"><?php front_lang('available_options');?>:</p>
                                    <div class="attributes">
                                        <div class="product-img-thumb" id="gallery_01">
                                            <?php if(!empty($images_color)){?>
                                            <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false" data-margin="20" data-loop="true">
                                                <?php foreach($images_color as $value):?>
                                                    <li>
                                                        <a href="javascript:void(0)" data-image="<?php echo SITE_URL.'upload/product/'.$value;?>" title="<?php echo $value;?>" data-zoom-image="<?php echo SITE_URL.'upload/product/'.$value;?>">
                                                            <img id="product-zoom"  src="<?php echo SITE_URL.'upload/product/'.$value;?>" alt="<?php echo $value;?>"/> 
                                                        </a>
                                                    </li>
                                                <?php endforeach;?> 
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#product-detail"><?php front_lang('product_detail');?></a>
                                </li>
                               
                            </ul>
                            <div class="tab-container">
                                <div id="product-detail" class="tab-panel active">
                                    <?php echo $result['info']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="fb-comments" data-href="<?php echo $curent?>" data-width="100%" data-mobile="Auto-detected" data-numposts="10"></div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <div class="page-product-box">
                            <h3 class="heading"><?php front_lang('related_products');?></h3>
                            <?php foreach($related_product as $value) :?>
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":3}}' style="margin-top:40px;">
                                    <?php foreach($value as $k => $v):?>
                                    <li>
                                        <div class="product-container">
                                            <div class="left-block">
                                                <a href="<?php echo base_url().$v['rewrite_link'].'-p'.$v['id'].'.html';?>">
                                                    <img class="img-responsive" alt="<?php echo $v['product_name']?>" src="<?php echo SITE_URL.'upload/product/'.$v['avarta'];?>" />
                                                </a>
                                                <div class="add-to-cart">
                                                    <a title="Add to Cart" href="<?php echo base_url().$v['rewrite_link'].'-p'.$v['id'].'.html';?>s">Xem chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="right-block">
                                                <h5 class="product-name"><a href="<?php echo base_url().$v['rewrite_link'].'-p'.$v['id'].'.html';?>"><?php echo $v['product_name']?></a></h5>
                                                <div class="content_price">
                                                    <?php if($v['sale'] == 1){ ?>
                                                        <span class="price product-price"><?php echo number_format($v['sale_price'],0,'','.'); ?> VNĐ</span>
                                                        <span class="price old-price"><?php echo number_format($v['price'],0,'','.'); ?> VNĐ</span>
                                                    <?php }else{ ?>
                                                        <span class="price product-price"><?php echo number_format($v['price'],0,'','.'); ?> VNĐ</span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endforeach;?>
                        </div>
                        <!-- ./box product -->
                    </div>
                <!-- Product -->
            </div>
             <?php $this->load->view('slibar_left_pro');?>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
