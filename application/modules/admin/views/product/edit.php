<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit Product</span></h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="<?=base_url("/admin/product/add")?>" class="btn btn-link btn-float has-text"><i class="icon-add text-primary"></i><span>Add</span></a>
                    <a href="<?=base_url("/admin/product")?>" class="btn btn-link btn-float has-text"><i class="icon-list2 text-primary"></i> <span>List</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?=base_url("/admin")?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="<?=base_url("/admin/product")?>">Product</a></li>
                <li class="active">edit</li>
            </ul>

            <ul class="breadcrumb-elements">

            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit product</h5>
                <div class="heading-elements">
                    <ul class="icons-list
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form class="form-horizontal" action="#" enctype="multipart/form-data" method="post">
                    <fieldset class="content-group">

                        <div class="form-group">
                            <label class="control-label col-lg-2">Name :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="pro_name" value="<?=$item['pro_name']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Code :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="pro_code" value="<?=$item['pro_code']?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Menu</label>
                            <div class="col-lg-10">
                                <select name="cate_id_parent" class="form-control">
                                    <option value="0">Select menu</option>
                                    <?php
                                    function showCategories($categories, $parent_id = 0, $char = '',$id_cate)
                                    {
                                        $select ="";
                                        foreach ($categories as $key => $items) {
                                            if ($items['cate_id_parent'] == $parent_id) {
                                                if($id_cate == $items['cate_id']){ $select = "selected";}
                                                echo '<option '.$select.' value="'.$items['cate_id'].'">'.$char.$items['cate_name'].'</option>';
                                                $select="";
                                                showCategories($categories, $items['cate_id'], $char . '--',$id_cate);
                                            }
                                        }
                                    }
                                    showCategories($cate,0,"",$item['cate_id_parent']);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Quantity :</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" name="pro_qty" value="<?=$item['pro_qty']?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Price :</label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" name="pro_price" value="<?=$item['pro_price']?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Images Avatar:</label>
                            <div class="col-lg-10">
                                <input type="file" name="pro_avarta" class="" src="<?=$item['pro_avarta']?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Images:</label>
                            <div class="col-lg-10">
                                <input type="file" class="file-input-ajax-a" name="pro_img[]" multiple="multiple">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Info :</label>
                            <div class="col-lg-10">
                                <?=ckeditor("pro_info",$item['pro_info'])?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Full :</label>
                            <div class="col-lg-10">
                                <?=ckeditor("pro_full",$item['pro_full'])?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">LangID :</label>
                            <div class="col-lg-3">
                                <select name="LangID" class="form-control">
                                    <option value="1">VN</option>
                                    <option value="2">ENG</option>
                                </select>
                            </div>
                        </div>

                    </fieldset>


                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->

</div>
<!-- /main content -->