<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url()?>/"><img src="<?php echo base_url()?>/assets/home/img/logo.png" class="ts-navbar-brand" alt="Vietesoft" /></a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="nav-item active" href="<?php echo base_url()?>" title="Trang chủ"><i class="glyphicon glyphicon-home"></i> Trang chủ</a></li>
                <?php 
                   if(isset($cate_cha) && $cate_cha != NULl):
                       foreach ($cate_cha as $value):
                       ?>
                        <li <?php if(isset($cate_con[$value['id']]) && $cate_con[$value['id']] != NULL){ echo 'class="sub-item"';}?>>
                           <a class="nav-item" href="<?php echo base_url()?><?php echo 'cate-'.$value['id'].'/'.$value['rewrite_link']?>.html" title="<?php echo $value['title']?>"> <?php echo $value['avarta']?> <?php echo $value['title']?>
                               <?php if(isset($cate_con[$value['id']]) && $cate_con[$value['id']] != NULL){ echo '<i class="fa fa-angle-down"></i>';}?>
                           </a>
                           <?php 
                            if(isset($cate_con[$value['id']]) && $cate_con[$value['id']] != NULL):
                                ?>
                                <ul class="sub-nav">
                                <?php
                                foreach ($cate_con[$value['id']] as $va): ?>
                                    <li><a class="nav-item" href="<?php echo base_url()?>cate-<?php echo $va['id']?>/sub-<?php echo $va['id'];?>/<?php echo $va['rewrite_link'];?>.html" title="<?php echo $va['title'];?>"><?php echo $va['avarta'];?> <?php echo $va['title'];?></a></li>
                                    <?php
                                endforeach;
                                ?>
                                </ul>
                                <?php
                            endif;
                           ?>
                       </li>
                       <?php
                       endforeach;
                   endif;
                ?>
            </ul>
        </div>
    </div>
</div>