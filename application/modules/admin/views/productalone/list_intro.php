<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    .content-header{display: none}
</style>
<div class="col-sm-12">
    <h3><i class="fa fa-edit" style="color:#5cb85c"></i> <?php echo $title ?></h3>
</div>

<div class="col-sm-12">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">List intro</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="profile">
            <br><br>
            <div class="col-md-5">
                <a class="btn btn-info btn-xs" data-toggle="modal" data-target="#addModal" type="button" href="<?php echo base_url('admin/productalone/add-intro/');?>">
                    <i class="glyphicon glyphicon-plus"></i> Thêm menu tabs
                </a>
            </div>
            <br>
            <br>
            <div class="col-sm-12">
                <form action="" method="post" id="frm-bulk-action">
                    <div class="table-responsive">
                        <table  class="table table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th style="width: 10px; background: #3c8dbc; color: white;">#</th>
                                <th style="width: 10px; background: #3c8dbc; color: white;">ảnh</th>
                                <th style="width: 100px;background: #3c8dbc; color: white;">Name</th>
                                <th style="width: 10px; background: #3c8dbc; color: white;">Status</th>
                                <th style="width: 70px; background: #3c8dbc; color: white;">Action</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            <?php
                            $stt=1;
                            if(is_array($pro_intro) && $pro_intro != NULL):
                                foreach($pro_intro as $tabs):
                                    ?>
                                    <tr id="itemtr-<?php echo $tabs['id'] ;?>">
                                        <td><?php echo $stt++ ;?></td>
                                        <td><img src="../../<?php echo $tabs['images']?>" alt="" width="100" id="img-<?php echo $tabs['id']?>"></td>
                                        <td id="text-<?php echo $tabs['id']?>"><?php echo $tabs['title']?></td>
                                        <td>
                                            <?php if($tabs['status'] == 1){ ?>
                                                <span id='change-<?php echo $tabs['id'] ;?>'><a class="label label-success" href="javascript:change_status(<?php echo  $tabs['id'];?>,'unpublish');">Published</a></span>
                                            <?php }else{ ?>
                                                <span id='change-<?php echo $tabs['id'] ;?>'><a class="label label-danger" href="javascript:change_status(<?php echo  $tabs['id'];?>,'publish')">Unpublished</a></span>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-xs" href="<?php echo base_url('admin/productalone/edit_intro/');?>/<?php echo $tabs['id']?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs" onclick="return Category_Delete('<?php echo (int)$tabs["id"] ?>');" type="button">
                                                <i class="fa fa-minus-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var data = new Array();
    function change_status(id,status){
        var table= 'product_intro';
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var base_url = '<?php echo base_url("admin/productalone/change_status");?>';
        $.post(base_url,{action:true,id:id,status:status,table:table}, function(results) {
            $(".content").unmask();
            var html = '';
            if(status == 'publish'){
                html += "<a href=\"javascript:change_status("+id+",'unpublish');\" class=\"label label-success\">Activation</a>";
            }else{
                html += "<a href=\"javascript:change_status("+id+",'publish')\" class=\"label label-danger\">Not Activation</a>";
            }
            $("#change-"+id).html(html);
        });
    }
    function Category_Delete(id){
        if(confirm("Bạn có muốn xóa")) {
            url = "<?php SITE_URL?>/admin/productalone/del";
            tab = 'product_intro';
            id = id;
            act = 'del';
            $.ajax({
                url: url, type: "POST", data: {tab: tab, id: id, act: act}, success: function (res) {
                    if(res == true){$("#itemtr-"+id).fadeOut(300, function(){ $(this).remove();});}else{alert("Fail");}
                }, error: function () {
                }
            });
        }
    }
</script>