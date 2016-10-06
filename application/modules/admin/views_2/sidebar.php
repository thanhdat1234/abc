<aside style="min-height: 2015px;" class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <div class="sidebar-form" style='border:none;'>
              <h3 style=" color:#FFF; margin:0px; text-align:center;">Admin Menu </h3>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo base_url('admin/home');?>">
                    <i class="fa fa-dashboard"></i> <span>Dasdboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/users');?>">
                    <i class="fa fa-user"></i> <span><?php front_lang('manage');?></span>                 
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-ship" ></i> 
                    <span><?php front_lang('product');?></span>
                    <i class="fa pull-right fa-angle-left"></i>                 
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo base_url('admin/product');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('list_product');?></a></li>
                </ul>
            </li>
            <li >
               <a href="<?php echo base_url('admin/news');?>">
                    <i class="fa fa-newspaper-o"></i> <span><?php front_lang('news');?></span>                 
                </a>
            </li>
            <li>
                <a href="javascript:void(0)">
                    <i class="fa fa-file-text-o" ></i> <span><?php front_lang('checkout');?></span>                 
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo base_url('admin/config/edit/1');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('config_site');?></a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo base_url('admin/support/edit/1');?>">
                    <i class="fa fa-support"></i> <span><?php front_lang('support');?></span>                 
                </a>
            </li>
            <li >
                <a href="<?php echo base_url('admin/slider');?>">
                    <i class="fa fa-photo" ></i> <span><?php front_lang('slider');?></span>                 
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-photo" ></i> 
                    <span><?php front_lang('banner');?></span>
                    <i class="fa pull-right fa-angle-left"></i>                 
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo base_url('admin/banner/index/1');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('banner_news');?></a></li>
                    <li><a href="<?php echo base_url('admin/banner/index/2');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('banner_salling');?></a></li>
                    <li><a href="<?php echo base_url('admin/banner/index/3');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('banner_colum');?></a></li>
                    <li><a href="<?php echo base_url('admin/banner/index/4');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i><?php front_lang('banner_detail');?></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-photo" ></i>
                    <span>Category</span>
                    <i class="fa pull-right fa-angle-left"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo base_url('admin/cate/index/');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>danh sách category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0)">
                    <i class="fa fa-photo" ></i>
                    <span>Quản lý Product</span>
                    <i class="fa pull-right fa-angle-left"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo base_url('admin/productalone/');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Quản lý product</a></li>
                    <li><a href="<?php echo base_url('admin/productalone/intro/');?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Quản lý intro product</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>