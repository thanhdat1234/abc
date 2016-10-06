<!-- Home slideder-->
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 slider-left"></div>
            <div class="col-sm-9 header-top-right">
                <div class="header-top-right-wapper">
                    <div class="homeslider">
                        <div class="content-slide">
                            <ul id="slide-background">
                            <?php foreach($data_slider as $value):?>
                              <li data-background="<?php echo  $value['color']; ?>"><img alt="Funky roots" src="<?php echo SITE_URL.'upload/slider/'.$value["images"].''; ?>" title="Funky roots" /></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="header-banner">
                        <div class="trending">
                            <h2 class="trending-title"><?php front_lang('selling_sample_bags_one');?></h2>
                            <div class="trending-product owl-carousel nav-center" data-items="1" data-dots="false" data-nav="true" data-loop="true">
                                <?php foreach($sample_bags_one as $value): ?>
                                    <ul>
                                        <?php foreach($value as $v): ?>
                                        <li>
                                            <div class="product-container">
                                                <div class="product-image">
                                                    <a href="<?php echo base_url().$v['rewrite_link'].'-p'.$v['id'].'.html';?>" title="<?php echo $v['product_name'];?>"><img src="<?php echo SITE_URL.'upload/product/'.$v['avarta'];?>" alt="<?php echo $v['product_name'];?>"></a>
                                                </div>
                                                <div class="product-meta">
                                                    <h5 class="product-name">
                                                        <a href="<?php echo base_url().$v['rewrite_link'].'-p'.$v['id'].'.html';?>" title="<?php echo $v['product_name'];?>"><?php echo $v['product_name'];?></a>
                                                    </h5>
                                                    <div class="product-price">
                                                        <?php if($v['sale'] == 1){ ?>
                                                            <span class="price"><?php echo number_format($v['sale_price'],0,'','.'); ?> VNĐ</span>
                                                        <?php }else{ ?>
                                                            <span class="price"><?php echo number_format($v['price'],0,'','.'); ?> VNĐ</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Home slideder-->
<!-- servives -->
<div class="services-wapper">
    <div class="container">
        <div class="service ">
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="<?php echo base_url('assets/home')?>/data/s1.png" />
                </div>
                <div class="info">
                    <a href="<?php echo SITE_URL.'van-chuyen.html'?>"><h3><?php front_lang('free_ship');?></h3></a>
                    <span>Thảnh thơi mua sắm tại nhà</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="<?php echo base_url('assets/home')?>/data/s2.png" />
                </div>
                <div class="info">
                    <a href="<?php echo SITE_URL.'doi-tra.html'?>"><h3><?php front_lang('barter');?></h3></a>
                    <span>Hoàn tiền nếu bạn không ưng ý</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="<?php echo base_url('assets/home')?>/data/s3.png" />
                </div>
                
                <div class="info" >
                    <a href="<?php echo SITE_URL.'ho-tro.html'?>"><h3><?php front_lang('support_online');?></h3></a>
                    <span>Sẵn sàng hỗ trợ 24/24h</span>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 service-item">
                <div class="icon">
                    <img alt="services" src="<?php echo base_url('assets/home')?>/data/s4.png" />
                </div>
                <div class="info">
                    <a href="<?php echo SITE_URL.'thanh-toan.html'?>"><h3><?php front_lang('trade');?></h3></a>
                    <span>thanh toán linh hoạt</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end services -->