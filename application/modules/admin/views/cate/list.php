<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Datatables</span> - Data
                    Sources</h4>
            </div>

            <div class="heading-elements">
                <div class="heading-btn-group">
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i>
                        <span>Invoices</span></a>
                    <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i>
                        <span>Schedule</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_data_sources.html">Datatables</a></li>
                <li class="active">Data sources</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear position-left"></i>
                        Settings
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                        <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- HTML sourced data -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">HTML (DOM) sourced data</h5>

                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                Basic example of a datatable with <code>HTML (DOM)</code> sourced data. The foundation for DataTables is
                progressive enhancement, so it is very adept at reading table information directly from the
                <code>DOM</code>. This example shows how easy it is to add searching, ordering and paging to your HTML
                table by simply running DataTables with basic configuration on it.
            </div>

            <table class="table datatable-html">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Img</th>
                    <th>Top</th>
                    <th>Home</th>
                    <th>Footer</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                function showCategories($categories, $parent_id = 0, $char = '')
                {
                    $i=0;
                    foreach ($categories as $key => $item) {
                        // Nếu là chuyên mục con thì hiển thị
                        if ($item['cate_id_parent'] == $parent_id) {
                            echo '
                                <tr>
                                    <td>' . $item['cate_id'] . '</td>
                                    <td>' . $char . $item['cate_name'] . '</td>
                                    <td><img src="" /></td>
                                    <td><div data-top="' . $item['cate_top'] . '" onclick="check_data('."'".'alpaca-switchery-'.$item['cate_id'].''."'".')" id="alpaca-switchery-'.$item['cate_id'].'" ></div></td>
                                    <td>' . $item['cate_home'] . '</td>
                                    <td><span class="label label-info">' . $item['cate_footer'] . '</span></td>
                                    <td><span class="label label-info">' . $item['cate_status'] . '</span></td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-file-pdf"></i> Export to .pdf</a></li>
                                                    <li><a href="#"><i class="icon-file-excel"></i> Export to .csv</a></li>
                                                    <li><a href="#"><i class="icon-file-word"></i> Export to .doc</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>';
                            echo '
                                <script>
                                var top_t = $("#alpaca-switchery-'.$item['cate_id'].'").attr("data-top");
                                data = false;
                                if(top_t == 1){data = true;}
                                $("#alpaca-switchery-'.$item['cate_id'].'").alpaca({
                                    "data": data,
                                    "options": {
                                        "fieldClass": "switchery-demo"
                                    },
                                    "postRender": function(control) {

                                        // Init Switchery
                                        var elems = Array.prototype.slice.call(document.querySelectorAll(".switchery-demo input[type=checkbox]"));
                                        elems.forEach(function(html) {
                                            var switchery = new Switchery(html);
                                        });

                                        // Add proper spacing
                                        $(".switchery-demo").find(".checkbox").addClass("checkbox-switchery");
                                    }
                                });
                            </script>
                            ';
                            // Xóa chuyên mục đã lặp
                            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                            showCategories($categories, $item['cate_id'], $char . '--');
                        }
                    }
                }
                showCategories($cate,0);
                ?>
                </tbody>
            </table>
        </div>
        <!-- /HTML sourced data -->
    </div>
    <!-- /content area -->

</div>

<!-- /main content -->
<script>
    function check_data(id){
        var top_t = $("#"+id).attr("data-top");
        if(top_t == 0){
            $("#"+id).attr("data-top",1);
        }

    }
</script>

