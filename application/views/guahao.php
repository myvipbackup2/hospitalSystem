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
    <title>挂号</title>
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

            <form class="fh5co-form animate-box" data-animate-effect="fadeIn">
                <h2>预约挂号</h2>
                <div class="form-group">
                    <label for="username" class="sr-only">姓名</label>
                    <input type="text" class="form-control" id="username" placeholder="请输入患者姓名" autocomplete="off">
                </div>
                <div class="form-group">
                    <label id="telLabel" for="tel" class="sr-only">手机号</label>
                    <input type="tel" class="form-control" maxlength="11" id="tel" placeholder="请输入手机号"
                           autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="date">预约日期</label>
                    <input type="date" class="form-control" id="date" placeholder="请选择预约日期" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="doctor">选择专家</label>
                    <select id="doctor" class="form-control">
                        <option>专家1</option>
                        <option>专家2</option>
                        <option>专家3</option>
                        <option>专家4</option>
                        <option>专家5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reason" class="sr-only">请输入主诉</label>
                    <textarea style="height: 100px;" class="form-control" id="reason" placeholder="请输入主诉"
                              autocomplete="off"></textarea>
                </div>
                <div class="form-group text-center">
                    <input type="reset" value="重新填写" class="btn btn-warning">
                    <input type="button" id="submit" value="立即挂号" class="btn btn-primary">
                </div>
                <div class="form-group">
                    <p><a href="welcome"><i class="	glyphicon glyphicon-arrow-left"></i>返回首页</a></p>
                </div>
            </form>

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
                    <h4 class="modal-title" id="modalLabel">挂号失败</h4>
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

        //正则验证手机号
        function checkTel(tel) {
            if (!(/^1(3|4|5|7|8)\d{9}$/.test(tel))) {
                $('#telLabel').html('请填写正确手机号!').attr('class', '').css({
                    color: 'red'
                });
                return false;
            } else {
                $('#telLabel').html('手机号').attr('class', 'sr-only');
                return true;
            }
        }

        $('#tel').on('blur', function () {
            checkTel($(this).val());
        });

        $('#submit').on('click', function () {
            $username = $('#username').val();
            $tel = $('#tel').val();
            $date = $('#date').val();
            $content = $('#reason').val();
            $doctor = $('#doctor').val().substr(-1, 1);
            if ($username === '') {
                $('#errReason').html('用户名不能为空！');
                $('#err').modal();
            } else if (!checkTel($('#tel').val())) {
                $('#errReason').html('请填写正确手机号!');
                $('#err').modal();
            } else if ($content === '') {
                $('#errReason').html('请填写主诉!');
                $('#err').modal();
            }
            else {
                $.post('user/do_guahao', {
                    name: $username,
                    tel: $tel,
                    date: $date,
                    content: $content,
                    doctor: $doctor
                }, function (res) {
                    if (res === 'success') {
                        $('#modalLabel').html('挂号成功');
                        $('#errReason').html('点击去首页');
                        $('#sub').html('去首页').on('click', function () {
                            window.location.href = 'welcome'
                        });
                        $('#err').modal();
                    } else {
                        $('#modalLabel').html('挂号失败');
                        $('#errReason').html('网络异常');
                        $('#err').modal();
                    }
                });
            }

        });

    });
</script>

</body>
</html>

