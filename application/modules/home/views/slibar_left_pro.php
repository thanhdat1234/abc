<!-- ./breadcrumb -->
<!-- row -->
<div class="row">
<!-- Left colunm -->
<div class="column col-xs-12 col-sm-3" id="left_column">
    <!-- block category -->
      <div class="block left-module">
        <p class="title_block"><?php front_lang('new_product');?></p>
        <div class="block_content">
            <ul class="products-block best-sell">
            <?php if(!empty($new_product)){ ?>
                <?php foreach($new_product as $value):?>
                <li>
                    <div class="products-block-left">
                        <a href="<?php echo SITE_URL.$value['rewrite_link'].'-p'.$value['id'].'.html';?>">
                            <img src="<?php echo SITE_URL.'upload/product/'.$value['avarta'];?>" alt="SPECIAL PRODUCTS">
                        </a>
                    </div>
                    <div class="products-block-right">
                        <p class="product-name">
                            <a href="<?php echo SITE_URL.$value['rewrite_link'].'-p'.$value['id'].'.html';?>"  title="<?php echo $value['product_name']?>"><?php echo $value['product_name']?> </a>
                        </p>
                        <label for="">Giá sản phẩm:</label> <p class="product-price"><?php echo number_format($value['price'],0,'','.'); ?> VNĐ</p>
                    </div>
                </li>
                <?php endforeach;?>
            <?php }?>
            </ul>
        </div>
    </div>
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
                        <li><span></span><a href="<?php echo SITE_URL.'lien-he.html'?>"><?php front_lang('contact');?></a></li>
                        <li><span></span><a href="<?php echo SITE_URL.'ho-tro.html'?>"><?php front_lang('support');?></a></li>
                    </ul>
                </div>
            </div>
            <!-- ./layered -->
        </div>
    </div>
    <!-- ./block category  -->
    <!-- left silide -->
    <div class="col-left-slide left-module">
        <ul class="owl-carousel owl-style2" data-loop="true" data-nav = "false" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1" data-autoplay="true">
            <?php if(!empty($banner_detail)){ ?>
                <?php foreach($banner_detail as $value):?>
                <li><a href="<?php echo $value['link'];?>"><img src="<?php echo SITE_URL.'upload/banner/'.$value['images']?>" alt="slide-left"></a></li>
                <?php endforeach?>
            <?php } ?>
        </ul>
    </div>
    <!--./left silde-->
    <!-- SPECIAL -->
    <div class="block left-module">
        <p class="title_block"><?php front_lang('special_product');?></p>
        <div class="block_content">
            <ul class="products-block">
                <?php foreach($selling_product as $value):?>
                <li>
                    <div class="products-block-left">
                        <a href="#">
                            <img src="<?php echo SITE_URL.'upload/product/'.$value['avarta'];?>" alt="<?php echo $value['product_name'];?>">
                        </a>
                    </div>
                    <div class="products-block-right">
                        <p class="product-name">
                            <a href="#"><?php echo $value['product_name'];?></a>
                        </p>
                         <label for="">Giá sản phẩm:</label> <p class="product-price"><?php echo number_format($value['price'],0,'','.'); ?> VNĐ</p>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
            <div class="products-block">
                <div class="products-block-bottom">
                    <a class="link-all" href="#">All Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ./SPECIAL -->
    <!-- Testimonials -->
</div>
<!-- ./left colunm -->