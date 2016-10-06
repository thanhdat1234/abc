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
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Info Product</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">List tabs</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">List intro</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Post</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <br><br><br> 
            <form class="form-horizontal" action="<?php echo base_url('admin/productalone/info/');?>" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" value="<?php if(set_value('name') != ''){ echo set_value('name');}else{ echo $result['name'];}?>" placeholder="Tên sản phảm" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input_img" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="input_img" name="images" placeholder="" onchange="change_img_load('input_img','img_show');">
                        <p id="img_show">
                            <image src="../../<?php echo $result['images']?>" width="200" class="img-responsive">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <br><br>
            <div class="col-md-5">
                <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#addModal" type="button">
                    <i class="glyphicon glyphicon-plus"></i> Thêm menu tabs
                </button>
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
                                if(is_array($pro_tabs) && $pro_tabs != NULL):
                                    foreach($pro_tabs as $tabs):
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
                                                <button class="btn btn-info btn-xs" onclick="EditData('<?php echo $tabs['id']?>');" data-toggle="modal" data-target="#myModal" type="button">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
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
        <div role="tabpanel" class="tab-pane" id="messages">3</div>
        <div role="tabpanel" class="tab-pane" id="settings">4</div>
    </div>
</div>
<script>
var data = new Array();
function change_status(id,status){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var base_url = '<?php echo base_url("admin/productalone/change_status");?>'; 
        $.post(base_url,{action:true,id:id,status:status}, function(results) {
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
function EditData(id){
    url ="<?php SITE_URL?>/admin/productalone/edit";
    tab = 'product_category';
    id = id;
    act = 'edit';
    $.ajax({url : url,type: "POST",data : {tab : tab,id  : id,act : act},success:function(res){
        data = $.parseJSON(res);
        $("#datatile").val(data.title);
        $("#id_pro").val(data.id);
        $("#files img").attr("src","../../"+data.images);
        $("#hidden-img").removeClass();
        $("#files img").addClass("imgshow-"+data.id);
        if(data.status == 1){
            $("#status").parent().addClass("checked");
        }
        else
        {
            $("#status").parent().removeClass("checked");
        }
    },error: function(){}});
}
function Category_Delete(id){
    if(confirm("Bạn có muốn xóa")) {
        url = "<?php SITE_URL?>/admin/productalone/del";
        tab = 'product_category';
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="alert-show"></div>
      <br><br><br>
      <div class="col-md-12">
            <form class="form-horizontal" action="javascript:void(0)" method="post"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="datatile" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="datatile" placeholder="Tên tabs" name="cate_title" value="">
                    </div>
                </div>
                <input type="text" id="id_pro" class="hidden" value="">
                <div class="form-group">
                    <label for="input_img" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-10">
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files" multiple>
                        </span>
                            <br>
                            <!-- The global progress bar -->
                            <div id="progress" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <!-- The container for the uploaded files -->
                            <div id="files" class="files"><img id="hidden-img" src="" alt="" width="100"></div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-success" id="save_data">Save</button>
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<script>
    var url_img = "";
$("#save_data").click(function(){
    url ="<?php SITE_URL?>/admin/productalone/update";
    var status = 1;
    if($("#status").parent().hasClass("checked") ==  true){
        status = 1;
    }else{
        status = 0;
    }
    url_img = $("#files a").attr("href");
    var datatile = $("#datatile").val();
    var id = $("#id_pro").val();
    tab = "product_category";
    act = 'update';
    $.ajax({url : url,type: "POST",data : {tab : tab,id  : id, act : act, status : status,url_img : url_img,title : datatile},success:function(res){
        if(res == true){
            $(".alert-show").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cập nhật thành công</div>');
            $("#files div").remove();
            $(".imgshow-"+id).attr("src",url_img);
            $("#hidden-img").show();
            $("#img-"+id).attr("src",url_img);
            $("#text-"+id).html(datatile);

        }else{
            $(".alert-show").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Có lỗi!</div>');
            $("#files div").remove();
        }
    },error: function(){}});
});

$(function () {
    'use strict';
    var acc = [];
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
            '//jquery-file-upload.appspot.com/' : '/assets/admin/jQuery-File-Upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn btn-primary')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                $("#hidden-img").hide();
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 999000,
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true,
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>


<!--    add product-->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="alert-show"></div>
            <br><br><br>
            <div class="col-md-12">
                <form class="form-horizontal" action="javascript:void(0)" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="datatile" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="datatile_add" placeholder="Tên tabs" name="cate_title" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input_img" class="col-sm-2 control-label">Images</label>
                        <div class="col-sm-10">
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload_add" type="file" name="files" multiple>
                        </span>
                            <br>
                            <!-- The global progress bar -->
                            <div id="progress_add" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <!-- The container for the uploaded files -->
                            <div id="files_add" class="files"></div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-success" id="add_data">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>
<script>
//    add cate
    var url_img = "";
    $("#add_data").click(function(){
        url ="<?php SITE_URL?>/admin/productalone/add";
        var status = 1;
        url_img = $("#files a").attr("href");
        var datatile = $("#datatile_add").val();
        tab = "product_category";
        act = 'add';
        $.ajax({url : url,type: "POST",data : {tab : tab, act : act, status : status,url_img : url_img,title : datatile},success:function(res){
            if(res == '1'){
                $(".alert-show").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Cập nhật thành công</div>');
                $("#files div").remove();
            }else{
                $(".alert-show").html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Có lỗi!</div>');
                $("#files div").remove();
            }
        },error: function(){}});
    });

    $(function () {
        'use strict';
        var acc = [];
        // Change this to the location of your server-side upload handler:
        var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '/assets/admin/jQuery-File-Upload/server/php/',
            uploadButton = $('<button/>')
                .addClass('btn btn-primary')
                .prop('disabled', true)
                .text('Processing...')
                .on('click', function () {
                    $("#hidden-img").hide();
                    var $this = $(this),
                        data = $this.data();
                    $this
                        .off('click')
                        .text('Abort')
                        .on('click', function () {
                            $this.remove();
                            data.abort();
                        });
                    data.submit().always(function () {
                        $this.remove();
                    });
                });
        $('#fileupload_add').fileupload({
            url: url,
            dataType: 'json',
            autoUpload: false,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            maxFileSize: 999000,
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            previewMaxWidth: 100,
            previewMaxHeight: 100,
            previewCrop: true,
        }).on('fileuploadadd', function (e, data) {
            data.context = $('<div/>').appendTo('#files_add');
            $.each(data.files, function (index, file) {
                var node = $('<p/>')
                    .append($('<span/>').text(file.name));
                if (!index) {
                    node
                        .append('<br>')
                        .append(uploadButton.clone(true).data(data));
                }
                node.appendTo(data.context);
            });
        }).on('fileuploadprocessalways', function (e, data) {
            var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
            if (file.preview) {
                node
                    .prepend('<br>')
                    .prepend(file.preview);
            }
            if (file.error) {
                node
                    .append('<br>')
                    .append($('<span class="text-danger"/>').text(file.error));
            }
            if (index + 1 === data.files.length) {
                data.context.find('button')
                    .text('Upload')
                    .prop('disabled', !!data.files.error);
            }
        }).on('fileuploadprogressall', function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress_add .progress-bar').css(
                'width',
                progress + '%'
            );
        }).on('fileuploaddone', function (e, data) {
            $.each(data.result.files, function (index, file) {
                if (file.url) {
                    var link = $('<a>')
                        .attr('target', '_blank')
                        .prop('href', file.url);
                    $(data.context.children()[index])
                        .wrap(link);
                } else if (file.error) {
                    var error = $('<span class="text-danger"/>').text(file.error);
                    $(data.context.children()[index])
                        .append('<br>')
                        .append(error);
                }
            });
        }).on('fileuploadfail', function (e, data) {
            $.each(data.files, function (index) {
                var error = $('<span class="text-danger"/>').text('File upload failed.');
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            });
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>