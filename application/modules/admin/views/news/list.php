
<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">News</span> - List News</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-add"></i><span>Add</span></a>
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-database-export"></i><span>Export</span></a>
                </div>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?=site_url("/admin")?>"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="<?=site_url("/admin/news")?>">News</a></li>
                <li class="active">List News</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content">

        <!-- HTML sourced data -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">News data</h5>

                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
            </div>

            <table class="table datatable-html">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Img</th>
                    <th>Menu</th>
                    <th>Status</th>
                    <th>Hot</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if(isset($news) && is_array($news)):?>
                    <?php foreach($news as $item):
                    ?>
                    <tr>
                        <td><?=$item['news_id']?></td>
                        <td><?=$item['news_title']?></td>
                        <td><img src="<?=base_url("uploads/news/thumb/")?>/<?=$item['news_images']?>" width="100" /></td>
                        <td><?=$item['cago_id']?></td>
                        <td>
                            <input type="checkbox" id="news_status_<?=$item['news_id']?>" value="1" <?php if($item['news_status'] == 1): echo"checked"; endif;?> onclick="return update_info('news_status_<?=$item['news_id']?>',<?=$item['news_id']?>,'news_status')" > Status
                        </td>
                        <td>
                            <input type="checkbox" id="news_hot_<?=$item['news_id']?>" value="1" <?php if($item['news_hot'] == 1): echo"checked"; endif;?> onclick="return update_info('news_hot_<?=$item['news_id']?>',<?=$item['news_id']?>,'news_hot')" > Hot
                        </td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a onclick="return check_del()" href="<?=site_url()?>/admin/news/del/<?=$item['news_id']?>.html"><i class="icon-bin"></i> del</a></li>
                                        <li><a href="<?=base_url()?>admin/news/edit/<?=$item['news_id']?>"><i class="icon-pencil7"></i> edit</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; endif;?>
                </tbody>
            </table>
        </div>
        <!-- /HTML sourced data -->
    </div>
    <!-- /content area -->
</div>
<script type="text/javascript">
    function update_info(id,id_pro,type){
        var value = 0;
        if($("#"+id).is(":checked") == true){
            value =1;
        };
        $.ajax({
            method:"POST",
            url:"/admin/news/update_info",
            data:{id:id_pro,val:value,types:type},
        });
    }
//    function update_qty(id,id_pro){
//        value = $("#"+id).val();
//
//        $.ajax({
//            method:"POST",
//            url:"/admin/product/update_qty",
//            data:{id:id_pro,val:value},
//        });
//    }
</script>
