<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <base href="<?php echo site_url(); ?>">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">


    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <!-- Start Sign In Form -->
            <div class="fh5co-form animate-box" data-animate-effect="fadeIn">
                <h2>用户登录</h2>
                <div class="form-group">
                    <label for="username" class="sr-only">用户名</label>
                    <input type="text" class="form-control" id="username" placeholder="请输入用户名" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">密码</label>
                    <input type="password" class="form-control" id="password" placeholder="请输入密码" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="remember"><input type="checkbox" id="remember"> 记住我</label>
                </div>
                <div class="form-group">
                    <p>没有注册? <a href="welcome/register">注册</a>| <a href="welcome">返回首页</a>
                    </p>
                </div>
                <div class="form-group">
                    <input type="submit" id="login" value="登录" class="btn btn-primary">
                </div>
            </div>
            <!-- END Sign In Form -->

        </div>
    </div>
    <div class="row" style="padding-top: 60px; clear: both;">
        <div class="col-md-12 text-center">
            <p>
                <a href="<?php echo site_url(); ?>">
                    <small>基于PHP的社会医疗保障系统的设计与实现 - 王羽佳20134178</small>
                </a>
            </p>
        </div>
    </div>

    <!--错误弹层-->
    <div class="modal fade" id="err" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="modalLabel">登录失败</h4>
                </div>
                <div class="modal-body" id="errReason">失败原因未知...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Placeholder -->
<script src="js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="js/main.js"></script>

<script>
    $(function () {
        $('#login').on('click', function () {
            $username = $('#username').val();
            $password = $('#password').val();
            if ($username === '') {
                $('#errReason').html('用户名不能为空！');
                $('#err').modal();
            } else if ($password === '') {
                $('#errReason').html('密码不能为空！');
                $('#err').modal();
            } else {
                $.post('user/do_login', {
                    userName: $username,
                    password: $password
                }, function (res) {
                    if (res === 'success') {
                        window.location.href = '<?php echo base_url();?>'
                    } else {
                        $('#errReason').html('用户名或密码错误！');
                        $('#err').modal();
                    }
                });
            }

        });

    });
</script>

</body>
</html>

