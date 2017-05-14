<!DOCTYPE html>
<html>
<head>
    <title>王羽佳20134178</title>
    <base href="<?php echo base_url(); ?>">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/index.css" type="text/css" rel="stylesheet" media="all">
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="王羽佳20134178,基于PHP的社会医疗保障系统的设计与实现"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //Custom Theme files -->
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling-->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
    </script>
    <!--//end-smoth-scrolling-->
</head>
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="header-logo">
            <a href="<?php echo base_url(); ?>"><img src="images/logo.png" alt="logo"/></a>
        </div>
        <div class="header-info">
            <?php
            $login_user = $this->session->userdata('userinfo');
            if ($login_user) { ?>
                <p><a style="color: #fff;" href="user/logo_out">退出登录</a></p>
                <h4><?php echo $login_user->username ?></h4>
            <?php } else { ?>
                <p>未登录</p>
                <h4><a style='color: #fff; font-size: ' href="<?php echo base_url(); ?>welcome/login">请先登录</a></h4>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//header-->
<!--header-bottom-->
<div class="header-bottom">
    <div class="container">
        <!--top-nav-->
        <div class="top-nav cl-effect-5">
            <span class="menu-icon"><img src="images/menu-icon.png" alt=""/></span>
            <ul class="nav1">
                <li><a href="welcome/index" class="active"><span data-hover="主页">主页</span></a></li>
                <?php
                if (!$login_user) { ?>
                    <li><a href="welcome/login"> <span data-hover="登录">登录</span></a></li>
                    <li><a href="welcome/register"> <span data-hover="注册">注册</span></a></li>
                <?php } ?>
                <li><a href="javascript:;" id="guahao"> <span data-hover="挂号预约">挂号预约</span></a></li>
                <li><a href="welcome/doctor"> <span data-hover="医师登录">医师登录</span></a></li>
            </ul>
            <!-- script-for-menu -->
            <script>
                $("span.menu-icon").click(function () {
                    $("ul.nav1").slideToggle(300, function () {
                    });
                });
            </script>
            <!-- /script-for-menu -->
        </div>
        <!--//top-nav-->
        <div class="clearfix"></div>
    </div>
</div>
<!--//header-bottom-->
<!--banner-->
<div class="banner">
    <div class="container ">
        <!-- banner-text Slider starts Here -->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            // You can also use "$(window).load(function() {"
            $(function () {
                // Slideshow 4
                $("#slider3").responsiveSlides({
                    auto: true,
                    pager: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                        $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                        $('.events').append("<li>after event fired.</li>");
                    }
                });
            });
        </script>
        <!--//End-slider-script -->
        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider3">
                <li>
                    <div class="banner-text">
                        <h1>设计目的</h1>
                        <p>
                            医疗产业的发展密切关系到国民的生活质量，随着中国经济的腾飞，国民的生活越来越丰富的同时，还希望得到医疗方面高质量的服务，而医疗产业也迫切的需要管理系统的升级包括方便性、快捷性、准确性</p>
                    </div>
                </li>
                <li>
                    <div class="banner-text">
                        <h1>本系统使用技术</h1>
                        <p>
                            本系统是运用php、javascript等技术对医院的多个部门进行全方位管理，该系统涉及到医院大部分业务过程，属于信息管理系统。本文主要工作是研究“基于PHP的社会医疗保障系统的设计与实现”，对基于PHP的社会医疗保障系统进行了需求分析和网站总体设计以及细节功能设计与实现</p>
                    </div>
                </li>
                <li>
                    <div class="banner-text">
                        <h1>实现功能</h1>
                        <p>基于PHP的社会医疗保障系统一共分了三部分：个人系统，医院系统，药店系统。</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--//banner-->
<!--banner-bottom-->
<div class="banner-bottom">
    <div class="container">
        <h2>社会医疗保障系统的优势</h2>
        <a href="#gallery" class="arrow scroll"> </a>
    </div>
</div>
<!--//banner-bottom-->
<!--gallery-->
<div class="gallery" id="gallery">
    <div class="col-md-6 gallery-left">
        <h4>系统要实现的主要功能</h4>
        <p>患者端：病人去医院看病，登录系统时的角度
            挂号：用户可以在线上就完成了挂号的所有手续
            医生端：医生在看病时，登录系统时的角度
        </p>
    </div>
    <div class="col-md-6 gallery-right">
        <div class="gallery-grid-a">
            <h4>研究意义</h4>
            <p>
                医院简而言之，就是要解决国民身体问题的问题，随着生活压力的增加，国家的身体也出现了各种各样的条件，患者不断扩大...
            </p>
        </div>
        <div class="gallery-grid-b">
            <h4>社会医疗保障系统的优势</h4>
            <p>
                当前社会是电子信息产业的蓬勃发展，以阿里巴巴，腾讯，UF，波浪为代表的一批电子信息公司的崛起意味着中国的信息时代已经到来...
            </p>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--//gallery-->
<!--work-->
<div class="work">
    <div class="container">
        <div class="work-title">
            <h3>关于我的毕业设计</h3>
            <p>基于PHP的社会医疗保障系统的设计与实现 - 王羽佳20134178</p>
        </div>
        <div class="col-md-4 work-grids">
            <ul>
                <li><img src="images/icon2.png" alt=""></li>
                <li>
                    <h4>医生端</h4>
                    <p>对就诊的患者填写医嘱，并且对非本科室的患者转子其他科室，填写对患者的治疗方案并传给治疗部门，查询患者的既往病史以更好的判断患者的症状，给出更好的治疗方案，并且查询自己的排班值班信息</p>
                </li>
            </ul>
        </div>
        <div class="col-md-4 work-grids">
            <ul>
                <li><img src="images/icon3.png" alt=""></li>
                <li>
                    <h4>登录注册</h4>
                    <p>登陆注册模块主要是完成系统普通用户登陆信息校验功能以及无账号用户的登录信息注册功能，用户登陆的时候，系统会对输入的信息进行核对，用户名密码正确的话能够成功登陆，用户名密码错误则无法登陆</p>
                </li>
            </ul>
        </div>
        <div class="col-md-4 work-grids">
            <ul>
                <li><img src="images/icon4.png" alt=""></li>
                <li>
                    <h4>挂号端</h4>
                    <p>护士管理员人工帮助患者查询肾虚门诊、挂号、退号、缴费并报销医保，并在医生同意的情况下，给患者加号。对需要住院的患者办理住院手续。</p>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//work-->

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-4 recent-posts">
                <h4>最近评价</h4>
                <div class="recent-posts-text">
                    <h5>MARCH 30, 2016</h5>
                    <p>医生态度非常好</p>
                </div>
                <div class="recent-posts-text">
                    <h5>MARCH 15, 2016</h5>
                    <p>很快就好了</p>
                </div>
                <div class="recent-posts-text">
                    <h5>MARCH 3, 2016</h5>
                    <p>他们就是天使</p>
                </div>
            </div>
            <div class="col-md-4 recent-posts">
                <h4>大众点评</h4>
                <div class="recent-posts-text">
                    <h5>about 2 days ago<span>@小李</span></h5>
                    <p>王羽佳20134178</p>
                </div>
                <div class="recent-posts-text">
                    <h5>about 2 days ago <span>@小红</span></h5>
                    <p>王羽佳20134178</p>
                </div>
                <div class="recent-posts-text">
                    <h5>about 2 days ago <span>@小李</span></h5>
                    <p>王羽佳20134178</p>
                </div>
            </div>
            <div class="col-md-4 recent-posts">
                <h4>我的地址</h4>
                <p class="adrs">王羽佳20134178 </p>
                <ul>
                    <li><span></span>王羽佳20134178</li>
                    <li><span class="ph-no"></span>王羽佳20134178</li>
                    <li><span class="mail"></span><a href="mailto:example@mail.com">王羽佳20134178</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//footer-->
<div class="footer-bottom">
    <div class="container">
        <p>
            基于PHP的社会医疗保障系统的设计与实现 - 王羽佳20134178
        </p>
    </div>
</div>

<!--错误弹层-->
<div class="modal fade" id="err" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modalLabel">挂号失败</h4>
            </div>
            <div class="modal-body" id="errReason">请先登录！</div>
            <div class="modal-footer">
                <button id="goLogin" type="button" class="btn btn-primary" data-dismiss="modal">去登录</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<!--smooth-scrolling-of-move-up-->
<script type="text/javascript">
    $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('#guahao').on('click', function () {
            var logined = <?php if ($login_user) {
                echo 1;
            } else echo 0;?>;
            if (logined) {
                window.location.href = '<?php echo base_url()?>welcome/guahao';
            } else {
                $('#err').modal();
            }
        });
        $('#goLogin').on('click', function () {
            window.location.href = '<?php echo base_url()?>welcome/login';
        });
    });
</script>

</body>
</html>