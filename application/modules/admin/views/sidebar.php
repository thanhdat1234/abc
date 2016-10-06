<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="<?=base_url("assets/admin")?>/images/demo/users/face11.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold"><?php echo $this->session->userdata("session_fullname");?></span>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    <li class="active"><a href="<?=base_url("admin")?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#"><i class="fa fa-book" aria-hidden="true"></i> <span>Quản lý modul</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/modul")?>"><i class="fa fa-list" aria-hidden="true"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/modul/add")?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add new</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user-secret"></i> <span>Administrator</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/admin")?>"><i class="fa fa-users"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/admin/add")?>"><i class="fa fa-user-plus"></i> Add new</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-menu7"></i> <span>Menu Product</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/cate")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/cate/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-laptop"></i> <span>Product</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/product")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/product/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-magazine"></i> <span>News</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/news")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/news/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-menu7"></i> <span>Menu news</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/cate_news")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/cate_news/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-picture"></i> <span>Slider</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/slider")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/slider/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Cart</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/cart")?>"><i class="icon-list2"></i> list</a></li>
                            <li><a href="<?php echo site_url("admin/cart/add")?>"><i class=" icon-add"></i> Add new</a></li>
                        </ul>
                    </li>
                    <li>
                    <a href="#"><i class="fa fa-pie-chart"></i> <span>Statistical</span></a>
                    <ul>
                        <li><a href="<?php echo site_url("admin/Stati/pro")?>"><i class="icon-list2"></i> Product</a></li>
                        <li><a href="<?php echo site_url("admin/Stati/info")?>"><i class=" icon-add"></i> Info page</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-gear position-left"></i> <span>Setup site</span></a>
                        <ul>
                            <li><a href="<?php echo site_url("admin/setup/seo")?>"><i class="fa fa-search"></i> SEO</a></li>
                            <li><a href="<?php echo site_url("admin/setup/info")?>"><i class="fa fa-info-circle"></i> Info</a></li>
                            <li><a href="<?php echo site_url("admin/setup/banner")?>"><i class=" icon-add"></i> Banner</a></li>
                        </ul>
                    </li>
                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->