<div class="row" style="margin-bottom: 20px; margin-top: -15px;">
    <div class="col-sm-12">
        <h3>
        	<i class="fa fa-edit" style="color:<?php echo $color?>"></i> <?php echo $title?>
        </h3>
    </div>
</div>
<div class="row" style="margin-bottom: 20px;">
    <div class="col-md-6">
        <div class="btn-group" id="bulk-action-container" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Bulk Actions  <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#" onclick="bulk_action('delete'); return false;">Delete</a></li>
                <li><a href="#" onclick="bulk_action('publish'); return false;">Publish</a></li>
                <li><a href="#" onclick="bulk_action('unpublish'); return false;">Unpublish</a></li>    
            </ul>
        </div>
    </div>
    <div class="col-md-4" style="height: 34px;">&nbsp;</div>
</div>
<div class="row" style="padding: 10px 0px;">
    <div class="col-md-6">
        <div class="btn-group">
            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                <span id="view-title">All</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo base_url('admin/users/index');?>"> All</a></li>
                <li><a href="javascript:view_allstatus(1,'published');"> Published</a></li>
                <li><a href="javascript:view_allstatus(2,'unpublished');"> Unpublished</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="pull-right">
            <div class="pull-right">
             	<div class="form-inline" id="pagingControl">
	            <div class="form-group">
                    <label for="Page">Page: </label>
                    <select class="page form-control" >
                        <option selected="selected" value="1">1</option> 
                        <option  value="2">2</option>         
                        <option  value="3">3</option>         
                    </select>
                    <input type="hidden" value="1" class="page-hidden">
                </div>
             </div>
          	</div>        
        </div>
    </div>
</div>
<div class="row">
    <?php
//        pre($result);
    ?>
    <div class="col-sm-12">
    	<form action="<?php echo base_url('admin/category/bulk_action')?>" method="post" id="frm-bulk-action">
    		<div class="table-responsive">
                <table  class="table table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th style="width: 10px; background: #3c8dbc; color: white;">#</th>
                            <th style="width: 10px; background: #3c8dbc; color: white;"><input type="checkbox" id="check-all"></th>
                            <th style="width: 10px; background: #3c8dbc; color: white;">ảnh</th>
                            <th style="width: 100px;background: #3c8dbc; color: white;">Name</th>
                            <th style="width: 100px; background: #3c8dbc; color: white;">Descrition</th>
                            <th style="width: 220px; background: #3c8dbc; color: white;">Seo keyword</th>
                            <th style="width: 10px; background: #3c8dbc; color: white;">Status</th>
                            <th style="width: 70px; background: #3c8dbc; color: white;">Action</th>
                        </tr>   
                    </thead>
                    <tbody id="result">
                        <?php if($cate_cha != NULL){?>
                            <?php $stt = 1?>
                            <?php foreach($cate_cha as $value): ?>
                                <tr>
                                    <td><?php echo $stt++ ;?></td>
                                    <td><input type="checkbox" name="id[]" value="<?php echo (int)$value['id'];?>"></td>
                                    <td><?php if($value['icon'] == 1) { echo $value['avarta'];} else{ ?><img src="../../<?php echo $value['images']?>" alt="" width="100"><?php }?></td>
                                    <td><?php echo $value['title']?></td>
                                    <td><?php echo $value['description']?></td>
                                    <td><?php echo $value['rewrite_link']?></td>
                                    <td>
                                        <?php if($value['status'] == 1){ ?>
                                            <span id='change-<?php echo $value['id'] ;?>'><a class="label label-success" href="javascript:change_status(<?php echo  $value['id'];?>,'unpublish');">Published</a></span>
                                        <?php }else{ ?>
                                            <span id='change-<?php echo $value['id'] ;?>'><a class="label label-danger" href="javascript:change_status(<?php echo  $value['id'];?>,'publish')">Unpublished</a></span>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <button class="btn btn-info btn-xs" onclick="Category_Edit('<?php echo (int)$value["id"] ?>');" type="button">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs" onclick="Category_Delete('<?php echo (int)$value["id"] ?>');" type="button">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php if(isset($cate_con[$value['id']]) && $cate_con[$value['id']] != NULL){?>
                                    <?php foreach($cate_con[$value['id']] as $va): ?>
                                        <tr>
                                            <td></td>
                                            <td><input type="checkbox" name="id[]" value="<?php echo (int)$va['id'];?>"></td>
                                            <td><?php if($va['icon'] == 1) { echo $va['avarta'];} else{ ?><img src="../../<?php echo $va['images']?>" alt="" width="100"><?php }?></td>
                                            <td><i class="fa fa-child" aria-hidden="true"></i> <?php echo $va['title']?></td>
                                            <td><?php echo $va['description']?></td>
                                            <td><?php echo $va['rewrite_link']?></td>
                                            <td>
                                                <?php if($value['status'] == 1){ ?>
                                                    <span id='change-<?php echo $va['id'] ;?>'><a class="label label-success" href="javascript:change_status(<?php echo  $va['id'];?>,'unpublish');">Published</a></span>
                                                <?php }else{ ?>
                                                    <span id='change-<?php echo $va['id'] ;?>'><a class="label label-danger" href="javascript:change_status(<?php echo  $va['id'];?>,'publish')">Unpublished</a></span>
                                                <?php }?>
                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-xs" onclick="Category_Edit('<?php echo (int)$va["id"] ?>');" type="button">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger btn-xs" onclick="Category_Delete('<?php echo (int)$va["id"] ?>');" type="button">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php }?>
                            <?php endforeach; ?>
                        <?php }else{ ?>
                            <tr>
                                <td  id="data_empty"><?php echo 'Không có dữ liệu!'?></td>
                            </tr>
                            <script>
                                $(document).ready(function(){
                                    $('#data_empty').attr('colspan',$('#frm-list  th').length).css({'text-align':'center'});
                                });
                            </script>
                        <?php } ?>
                    </tbody>
                </table>
                <ul class="pagination pull-right">
                    <?php echo $this->pagination->create_links();?>
                </ul>
            </div>
    	</form>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        $('.btn-index').css({display:'inline-block'});
        $('.btn-edit').css({display:'none'});
        $('.btn-copy').css({display:'none'});
        $('.btn-add').css({display:'none'});
        
        $('#check-all').on('ifChecked', function(event){
            $('input[name="id\[\]"]').iCheck('check');
            $('#bulk-action-container').show();
        });

        $('#check-all').on('ifUnchecked', function(event){
            $('input[name="id\[\]"]').iCheck('uncheck');
            $('#bulk-action-container').hide();
        });

        $('input[name="id\[\]"]').on('ifToggled', function(event){
            if ($('.content input[name="id\[\]"]:checked').length > 0){
                $('#bulk-action-container').show();
            }else{
                $('#bulk-action-container').hide();
                $('#check-all').iCheck('uncheck');
            }
        });
    });
    
    function Add(){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        $('.content').load("<?php echo base_url('admin/cate/add');?>",function(){
            $(".contentt").unmask();
        });
    }

    function Category_Edit(id){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var page        = $('.pagination .active').text();
        var curent_page = '';
        if(page > 1){
            curent_page = page - 1;
        }else{
            curent_page = page;
        }
        var url = '<?php echo base_url("admin/cate/edit");?>'+'/'+id+'/'+curent_page;
       $.get(url,function(result){
            console.log(result);
            $(".contentt").unmask();
            if(result.error == 0){
                $('.content').html(result.content);
            }else if(result.error == 1){
                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i> <?php echo 'There is an error, please check again!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                $('.content').load(obj.url);
            }
            $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
            $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'}); 
        },'json');
    }

    function change_status(id,status){
        $(".content").mask("<?php echo 'Loading...'; ?>");
        var base_url = '<?php echo base_url("admin/cate/change_status");?>';
        $.post(base_url,{action:true,id:id,status:status}, function(results) {
            $(".content").unmask();
            var html = '';
            if(status == 'publish'){
                html += "<a href=\"javascript:change_status("+id+",'unpublish');\" class=\"label label-success\">Published</a>";
            }else{
                html += "<a href=\"javascript:change_status("+id+",'publish');\" class=\"label label-danger\">Unpublished</a>"; 
            }
            $("#change-"+id).html(html);
        });
    }

    function Category_Delete(id){
        $.sModal({
            image:'<?php echo base_url("assets/admin");?>/img/confirm.png',
            content:'<?php echo "Do you want to delete this news ?"; ?>',
            animate:'fadeDown',
            buttons:[
                {
                    text:'<i class="fa fa-times-circle"></i> Delete',
                    addClass:'btn-danger',
                    click:function(m_id,data){
                        $(".content").mask("<?php echo 'Loading...'; ?>");
                        var url = '<?php echo base_url("admin/cate/delete");?>'+'/'+id;
                        $.get(url,function(result) {
                            if(result.error == 0){
                                $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'User is deleted successfully'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                            }else{
                                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i> <?php echo 'There is an error, please check again!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                            }
                            $('.content').load(result.url,function(){
                                $(".content").unmask();
                                $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                                $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                            });
                            $.sModal('close',m_id);
                        },'json');
                    }
                },
                {
                    text:'Cancel',
                    click:function(id,data){
                        $.sModal('close',id);
                    }
                },
            ]
        });
    }
    
    function bulk_action(type){
        if (type != undefined){
            $.sModal({
                image:'<?php echo base_url("assets/admin");?>/img/confirm.png',
                content:'<?php echo "Do you want to delete this member ?"; ?>',
                animate:'fadeDown',
                buttons:[
                         {
                             text:'<i class="fa fa-times-circle"></i> OK',
                             addClass:'btn-danger',
                             click:function(m_id,data){
                                    $(".content").mask("<?php echo 'Loading...'; ?>");
                                    $.post($('#frm-bulk-action').attr('action')+'/'+type,$('#frm-bulk-action').serialize(),function(obj){
                                        $('.content').load(obj.url,function(){
                                           $('.content input[type="checkbox"]').iCheck({checkboxClass: 'icheckbox_minimal'});
                                           $('.content input[type="radio"]').iCheck({radioClass: 'iradio_minimal'});
                                           $(".content").unmask();
                                           if (obj.error == 0){
                                                switch(obj.action){
                                                   case 'delete':
                                                     $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'Category is deleted successfully'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                                                     break;
                                                   case 'publish':
                                                     $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'Category is activated successfully'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                                                   break;
                                                   case 'unpublish':
                                                     $.notification({type:"success",img:"",width:"400",content:"<i class='fa fa-check fa-2x'></i> <?php echo 'Category is deactivated successfully'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                                                   break;
                                                }
                                           }else{
                                                $.notification({type:"error",img:"",width:"400",content:"<i class='fa fa-times-circle fa-2x'></i> <?php echo 'There is an error, please check again!'; ?>",html:true,autoClose:true,timeOut:"1500",delay:"0",position:"topRight",effect:"fade",animate:"fadeUp",easing:"jswing",onStart:function(id){ console.log(' onStart : notification id = '+id); },onShow:function(id){ console.log(' onShow : notification id = '+id); },onClose:function(id){ console.log(' onClose : notification id = '+id); },duration:"300"});
                                           }
                                        });
                                      $.sModal('close',m_id);
                                    },'json');
                             }
                         },
                         {
                             text:'Cancel',
                             click:function(id,data){
                                 $.sModal('close',id);
                             }
                         },
                     ]
            });
        }
    }
</script>