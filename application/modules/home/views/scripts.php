

<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/modernizr.2.8.3.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/echo.min.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-utility.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-cms.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-product.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-news.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-order.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/script-ajax.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/List.js"></script>
<script type="text/javascript" src="<?php echo base_url("assets/home/")?>/js/Other.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        Script.Process_Init();
    });
</script>
<style>
    /*---------Control:Home-Slide---------*/
    /*#Control-Home-Slide { margin-left: 20%; width: 80%; padding-left: 3px; margin-top: -1px }*/
    #Control-Home-Slide {padding:0; margin-top:0}
    #Home-Slide {overflow: hidden;padding-left: 1px;}
    .Home-Slide { display: none }
    .Home-Slide.owl-loaded { display: block }
    /*Home Slider*/
    #Home-Slide-Wrapper { padding-left: 0; }
    .Home-Slide { margin-bottom: 0; padding: 0; padding-left: 2px; }
    .Home-Slide .owl-wrapper, .Home-Slide .owl-carousel .owl-item, .Home-Slide { padding: 0; }
    .Home-Slide li { list-style: none; padding: 0; }
    .Home-Slide .owl-item { }
    .Home-Slide .owl-item img {width: 100% !important; max-width: 100%; display: block; margin: 0 auto;/*max-height:301px;*/}
    /*Control*/
    .Home-Slide .tab-pane { position: relative }
    .Home-Slide .owl-prev, .Home-Slide .owl-next {-moz-transition: all 0.45s ease;-webkit-transition: all 0.45s ease;-o-transition: all 0.45s ease;-ms-transition: all 0.45s ease;transition: all 0.45s ease;opacity: 0;visibility: hidden; font-family: FontAwesome; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; position: absolute; top: 50%; transform: translateY(-50%);-moz-transform: translateY(-50%);-webkit-transform: translateY(-50%); width: 50px; height: 80px; background:rgba(255, 255, 255, 0.8); color: transparent}
    .Home-Slide .owl-prev { left: -50px; }
    .Home-Slide .owl-next { right: -50px; }
    .Home-Slide .owl-prev:before, .Home-Slide .owl-next:before { font-size:36px; left: 45%; position: absolute; top: 50%; transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%);-webkit-transform: translate(-50%, -50%); color: #333 }
    .Home-Slide .owl-prev:before { content: "\f053"; }
    .Home-Slide .owl-next:before { content: "\f054"; }
    .Home-Slide:hover .owl-prev{left: 0;opacity: 1;visibility: inherit;}
    .Home-Slide:hover .owl-next{right: 0;opacity: 1;visibility: inherit;}
    /*End Home Slider*/
    /*---------Control:Home-Product-Safe-Of---------*/
    .Home-Product-Safe-Of > ul{display:none;margin:0;padding:0;}
    /*---------Control:Home-News-Video---------*/
    .block-news-video { padding-right: 15px }
    /*Title*/
    .Home-News-Video header { padding-bottom: 5px }
    .Home-News-Video header h3 { color: #333333; font-size: 18px; margin-bottom: 5px; margin-top: 0; padding-left: 33px; position: relative; }
    .Home-News-Video header h3 i { background: rgba(0, 0, 0, 0) url(/Image/style-image/icon_hot_news.png) no-repeat; display: block; height: 21px; left: 0; position: absolute; top: 1px; width: 22px; }
    /*End Title*/
    .Home-News-Video h3 { color: #474747; font-size: 13px; font-weight: normal; line-height: 17px; }
    .Home-News-Video .News-Sidebar { border-bottom: 1px solid #eee; padding: 10px 0; }
    .Home-News-Video .Visit, .Home-News-Video .CreateDate, .Home-News-Video time { color: #929292; font-size: 11px; }
    /*icon viddeo*/
    .Home-News-Video .News-Video:after { position: absolute; left: 50%; top: 45%; transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); -o-transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); background: url("/Image/style-image/video_play_icon.png") no-repeat; background-size: 50px auto; height: 40px; width: 50px; text-indent: -119988px; content: "" }
    /*---------Control:Home-News-Promotion---------*/
    .main-content-bottom { margin: 20px 0 -20px; background: #f4f5f6 }
    .main-content-bottom >div.container { padding: 20px 0 }

    .block-news-latest { padding-right: 15px }
    /*Title*/
    .Home-News-Latest header { padding-bottom: 5px }
    .Home-News-Latest header h3 { color: #333333; font-size: 18px; margin-bottom: 5px; margin-top: 0; padding-left: 33px; position: relative; }
    .Home-News-Latest header h3 i { background: rgba(0, 0, 0, 0) url(/Image/style-image/icon_tech_news.png) no-repeat; display: block; height: 21px; left: 0; position: absolute; top: 1px; width: 22px; }
    /*End Title*/
    .Home-News-Latest h3 { color: #474747; font-size: 13px; font-weight: normal; line-height: 17px; }
    .Home-News-Latest .News-Sidebar { border-bottom: 1px solid #eee; padding: 10px 0; }
    .Home-News-Latest .Visit,.Home-News-Latest .CreateDate, .Home-News-Latest .CreateDate * { color: #929292; font-size: 11px; }

</style>

<script type="text/javascript">
    $(document).ready(function () {
        /*---------Control:Menu-Mobile---------*/
// MENU MOBILE
//=================
        windowsize = $(window).width();
        if (windowsize >= 0 && windowsize < 992) {
            $.getScript( "/Script/utility/mmenu/js/jquery.mmenu.min.all.js", function( data, textStatus ) {
                $('#Menu-Mobile > li').each(function (index, element) {
                    if ($(this).find('img').length > 0) $(this).find('>a').append('<span >' + $(this).find('img').attr('alt') + '</span>');
                });

                $('#mobile-menu').mmenu({
                    extensions: [
                        'pagedim-black'
                    ],
                    offCanvas	: {
                        position 	: "left",
                        zposition	: "front"
                    },
                    counters: true,
                    navbar: {
                        title: 'Danh mục'
                    },
                    clone: true,
                });
                // Seach
                var $menu = $('#wraper-tool'),
                    $html = $('html, body');

                $menu.mmenu({
                    extensions 	: [ "pageshadow" ],
                    offCanvas	: {
                        position 	: "bottom",
                        zposition	: "front"
                    },
                    navbar 		: {
                        title 		: "Thông tin"
                    },
                    slidingSubmenus: false
                }).removeClass('hidden-xs hidden-sm');

                var API = $menu.data( "mmenu" );
                API.setSelected( $menu.find( "li" ).first() );

                var closer = null;

                $menu.find( 'a' ).on( 'click', function() {
                    closer = $(this).attr( "href" );
                });

                API.bind( "closed", function() {
                    if ( closer ) {
                        setTimeout( function() {
                            $html.animate({
                                scrollTop: $(closer).offset().top
                            });
                            closer = null;
                        }, 25 );
                    }
                });
                // End Seach
            });
        }

    });
</script>

<!--[if lt IE 9]> <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/json2/20110223/json2.min.js"></script>    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>    <script type="text/javascript" src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>   <![endif]-->