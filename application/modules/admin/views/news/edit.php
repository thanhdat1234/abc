<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Edit News</span></h4>
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
                <li><a href="<?=base_url("/admin/product")?>">News</a></li>
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
                <h5 class="panel-title">Edit news</h5>
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
                            <label class="control-label col-lg-2">Title :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="news_title" value="<?=$item['news_title']?>">
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
                                            if ($items['cago_parent'] == $parent_id) {
                                                if($id_cate == $items['cago_id']){ $select = "selected";}
                                                echo '<option '.$select.' value="'.$items['cago_id'].'">'.$char.$items['cago_name'].'</option>';
                                                $select="";
                                                showCategories($categories, $items['cago_id'], $char . '--',$id_cate);
                                            }
                                        }
                                    }
                                    showCategories($cate,0,"",$item['cago_id']);
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Images:</label>
                            <div class="col-lg-10">
                                <input type="file" class="file-input-ajax-a" name="news_images">
                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                                <br>
                                <p style="width: 150px"><img src="<?=base_url("uploads/news/thumb/")?>/<?=$item['news_images']?>" width="100%" alt=""></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Info :</label>
                            <div class="col-lg-10">
                                <?=ckeditor("news_info",$item['news_info'])?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Full :</label>
                            <div class="col-lg-10">
                                <?=ckeditor("news_full",$item['news_full'])?>
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

                        <div class="alert bg-success alert-styled-left">
                            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                            <span class="text-semibold">Well done!</span> Support Seo
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Key :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="news_key" value="<?=$item['news_key']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Des :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="news_des" value="<?=$item['news_des']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tag :</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="news_des" value="<?=$item['news_tags']?>">
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