
<div class="columns-container">
    <div class="container" id="columns">
            <?php $this->load->view('slibar_left_pro');?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- view-product-list-->
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><?php echo $breadcrumb; ?></span>
                    </h2>
                    <ul class="display-product-option">
                        <li class="view-as-grid selected">
                            <span>grid</span>
                        </li>
                        <li class="view-as-list">
                            <span>list</span>
                        </li>
                    </ul>
                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                        <?php if(!empty($result)){ ?>
                            <?php foreach($result as $value):?>
                                <li class="col-sx-12 col-sm-4">
                                    <div class="product-container">
                                        <div class="left-block">
                                            <a href="<?php echo base_url().$value['rewrite_link'].'-p'.$value['id'].'.html';?>">
                                                <img class="img-responsive" alt="<?php echo $value['product_name'];?>" src="<?php echo SITE_URL.'upload/product/'.$value['avarta'];?>" />
                                            </a>
                                            <div class="add-to-cart">
                                                <a title="Add to Cart" href="<?php echo base_url().$value['rewrite_link'].'-p'.$value['id'].'.html';?>">Xem chi tiết</a>
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <h5 class="product-name"><a href="<?php echo base_url().$value['rewrite_link'].'-p'.$value['id'].'.html';?>"><?php echo $value['product_name'];?></a></h5>
                                            <div class="content_price">
                                                <?php if($value['sale'] == 1){ ?>
                                                    <span class="price product-price"><?php echo number_format($value['sale_price'],0,'','.'); ?> VNĐ</span>
                                                    <span class="price old-price"><?php echo number_format($value['price'],0,'','.'); ?> VNĐ</span>
                                                <?php }else{ ?>
                                                    <span class="price product-price"><?php echo number_format($value['price'],0,'','.'); ?> VNĐ</span>
                                                <?php } ?>
                                            </div>
                                            <div class="info-orther">
                                                <p>Item Code: #453217907</p>
                                                <p class="availability">Availability: <span>In stock</span></p>
                                                <div class="product-desc">
                                                    <?php echo $value['description'];?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        <?php } ?>
                    </ul>
                    <!-- ./PRODUCT LIST -->
                </div>
                <!-- ./view-product-list-->
                <div class="sortPagiBar">
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