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