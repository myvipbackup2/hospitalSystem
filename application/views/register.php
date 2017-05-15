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
    <title>注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FreeHTML5.co"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>

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
            <div class="fh5co-form animate-box" data-animate-effect="fadeIn">
                <h2>用户注册</h2>
                <div class="form-group">
                    <label for="name" class="sr-only">用户名</label>
                    <input type="text" class="form-control" id="name" placeholder="请输入用户名" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password" class="sr-only">密码</label>
                    <input type="password" class="form-control" id="password" placeholder="请输入密码" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="re-password" class="sr-only">再次输入密码</label>
                    <input type="password" class="form-control" id="re-password" placeholder="请再次输入密码"
                           autocomplete="off">
                </div>
                <div class="form-group">
                    <p>已有帐号?
                        <a href="welcome/login">登录</a> | <a href="welcome">返回首页</a></p>
                    </p>
                </div>
                <div class="form-group">
                    <input type="submit" id="register" value="注册" class="btn btn-primary">
                </div>
            </div>
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
                    <h4 class="modal-title" id="modalLabel">注册失败</h4>
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
        $('#register').on('click', function () {
            $name = $('#name').val();
            $password = $('#password').val();
            $repw = $('#re-password').val();
            if ($name === '') {
                $('#errReason').html('用户名不能为空！');
                $('#err').modal();
            } else if ($password === '') {
                $('#errReason').html('密码不能为空！');
                $('#err').modal();
            } else if ($password === $repw) {
                $.get('user/check_username', {userName: $name}, function (res) {
                    if (res === 'check_username success') {
                        doRegister();
                    } else {
                        $('#errReason').html('该用户名已存在！');
                        $('#err').modal();
                    }
                });
            } else if ($password !== $repw) {
                $('#errReason').html('两次密码输入不一致！');
                $('#err').modal();
            }

        });
        function doRegister() {  //ajax注册
            $.post('user/do_register', {
                userName: $name,
                password: $password
            }, function (res) {
                if (res === 'success') {
                    $('#modalLabel').html('恭喜您');
                    $('#errReason').html('注册成功！');
                    $('#err').modal();
                    window.location.href = '<?php echo base_url();?>welcome/login'
                } else {
                    $('#errReason').html('未知错误！');
                    $('#err').modal();
                }
            });
        }
    });
</script>

</body>
</html>

