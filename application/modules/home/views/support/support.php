<!-- page wapper-->
<div class="columns-container">
    <div class="container" id="columns">
        <!-- breadcrumb -->
            <?php $this->load->view('slibar_left_new');?>
            <!-- Center colunm-->
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <!-- page heading-->
                <h2 class="page-heading">
                    <span class="page-heading-title2"><?php echo $breadcrumb;?></span>
                </h2>
                <!-- Content page -->
                <div class="content-text clearfix">
                    <h4>Hệ thống hỗ trợ trực tuyến</h4>
                    <p>
                        Bạn muốn liên lạc với chúng tôi bằng cách nào? <br>

                        Hãy lựa chọn 1 trong các công cụ bên dưới mà bạn thấy phù hợp nhất
                    </p>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a target="_blank" style="background: #0085ff;position:relative;" href=" <?php echo $result['facebook'];?> " >
                                   <img src="<?php echo SITE_URL.'assets/home/'?>/images/face.png" style="max-width:20px;max-height:20px;position:absolute;left:10px;bottom:5px;" alt=""> FACEBOOK MESSENGER
                                </a>
                              </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" style="background: #228ebd;position:relative;" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapseTwo">
                                  <img src="<?php echo SITE_URL.'assets/home/'?>/images/zalo.png" style="max-width:20px;max-height:20px;position:absolute;left:10px;bottom:5px;" alt="">ZALO CHAT <i class="fa fa-angle-down"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                    <?php echo $result['zalo'];?>
                              </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" style="background: #875eaa;" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapseThree">
                                  <i class="fa fa-whatsapp" style="float:left; font-size:20px;line-height:13px"></i>VIBER CHAT <i class="fa fa-angle-down"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                   <?php echo $result['viber'];?>
                              </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" style="background: #400190;" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapseThree">
                                  <i class="fa fa-yahoo" style="float:left; font-size:20px;line-height:13px"></i> YAHOO CHAT <i class="fa fa-angle-down"></i>
                                </a>
                              </h4>
                            </div>
                            <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                 <?php echo $result['yahoo'];?>
                              </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" style="background: #00a8ef;"  href=" <?php echo $result['skyper'];?>">
                                  <i class="fa fa-skype" style="float:left; font-size:20px;line-height:13px"></i> SKYPER CHAT
                                </a>
                              </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" style="background: #dd4d35;" data-toggle="collapse" data-parent="#accordion" href="#collapse-6" aria-expanded="false" aria-controls="collapseThree">
                                  <i class="fa fa-phone" style="float:left; font-size:20px;line-height:13px"></i> GỌI NGAY : 0944418192
                                </a>
                              </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./Content page -->
            </div>
            <!-- ./ Center colunm -->
        </div>
        <!-- ./row-->
    </div>
</div>
<!-- ./page wapper-->
<script type="text/javascript">
 $('.collapse').collapse("toggle");
</script>