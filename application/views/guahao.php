<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <link href="css/guahao.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/m_style.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

</head>
<body>


<!--预约挂号-->
<div class="part3">
    <div class="alert alert-success "><h1><?php echo $this->session->userdata('userinfo')->username ?>欢迎您进入挂号页面！</h1>
    </div>
    <section class="box-12 con_YuYue">
        <div class="wrap klg_wrap">
            <form id="subform" name="subform" action="" method="post" onsubmit="return false" accept-charset="utf-8">
                <!--姓名-->
                <p>
                    <label for="user_name">姓名：</label>
                    <input type="text" id="hzName" name="hzName" value="请输入您的姓名"
                           onfocus="if (value ==='请输入您的姓名'){value =''}" onblur="if (value ===''){value='请输入您的姓名'}">
                </p>
                <!--电话-->
                <p>
                    <label for="user_tel">电话：</label>
                    <input type="text" id="hzContact" name="hzContact" value="请输入手机号码" maxlength="11"
                           onfocus="if (value ==='请输入手机号码'){value =''}" onblur="if (value ===''){value='请输入手机号码'}">
                </p>
                <!--预约时间-->
                <p>
                    <label for="user_shijian">时间：</label>
                    <input id="datePicker" type="text" value="请选择时间" onfocus="if (value ==='请选择时间'){value =''}"
                           onblur="if (value ===''){value='请选择时间'}">

                </p>
                <!--预约专家-->
                <div class="add-lan" style="display:none">
                    <span>预约专家</span>
                    <select name="bztype" id="bztype">
                        <option value="1">专家1</option>
                        <option value="2">专家2</option>
                        <option value="3">专家3</option>
                        <option value="4">专家4</option>
                        <option value="5">专家5</option>
                        <option value="6">专家6</option>
                    </select>
                </div>

                <!--病情反馈-->
                <p><label class="float_left" style="vertical-align: top;padding-top:0.3rem">主诉：</label>
                    <textarea id="content" name="content"
                              style="width:75%;height:90px;background: #edebec;font-size: 0.24rem;"
                              class="input_style"></textarea>
                </p>

                <!--挂号时间-->
                <input name="addTime" value="" type="hidden" id="addTime" class="intxt">
                <script type="text/javascript">
                    function today() {
                        var date = new Date();
                        Y = date.getFullYear() + '-';
                        M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1) + '-';
                        D = date.getDate() + ' ';
                        h = date.getHours() + ':';
                        m = date.getMinutes() + ':';
                        s = date.getSeconds();
                        return Y + M + D + h + m + s;
                    }
                    document.getElementById("addTime").value = today();
                </script>

                <!--来源页面-->
                <input type="hidden" name="laiyuan" id="laiyuan" class="intxt" value="">

                <!--回访时间-->
                <div class="add-lan" style="display:none"><span>回访时间</span>
                    <input type="text" id="hfTime" name="hfTime" value=""/>
                    <script>
                        function getNowFormatDate() {
                            var date = new Date();
                            var seperator1 = "-";
                            var year = date.getFullYear();
                            var month = date.getMonth() + 1;
                            var strDate = date.getDate();
                            if (month >= 1 && month <= 9) {
                                month = "0" + month;
                            }
                            if (strDate >= 0 && strDate <= 9) {
                                strDate = "0" + strDate;
                            }
                            var currentdate = year + seperator1 + month + seperator1 + strDate;
                            return currentdate;
                        }
                        window.onload = function () {
                            var input = document.getElementById("hfTime");
                            setInterval(function () {
                                input.value = getNowFormatDate();
                            }, 1000);
                        }
                    </script>
                </div>

                <!--提交-->
                <div id="btn">
                    <input type="submit" name="gh_submit" value="提交挂号" style="background:#ff9c00; margin-right:.55rem"
                           onclick="add()">
                    <input type="reset" value="重新填写" style="background:#039d83;">
                </div>
            </form>
        </div>
    </section>
</div>

<div class="clear"></div>

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
                <button type="button" id="sub" class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<div class="row" style="padding-top: 60px; clear: both;">
    <div class="col-md-12 text-center">
        <p style="text-align: center">
            <a href="<?php echo site_url(); ?>">
                <small>基于PHP的社会医疗保障系统的设计与实现 - 王羽佳20134178</small>
            </a>
        </p>
    </div>
</div>

<script>
    function add() {
        //验证手机号码
        var $phone = $('#hzContact').val();
        if (!(/^1(3|4|5|7|8)\d{9}$/.test($phone))) {
            $('#errReason').html('请填写正确手机号!');
            $('#err').modal();
            return false;
        }
        //提取来源页面
        document.getElementById('laiyuan').value += window.location.href;
        //表单提交处理
        var hzName = $('#hzName').val();
        var hzContact = $('#hzContact').val();
        var hzTime = $('#datePicker').val();
        var addTime = $('#addTime').val();
        var bztype = $('#bztype').val();
        var content = $('#content').val();
        var laiyuan = $('#laiyuan').val();
        var hfTime = $('#hfTime').val();
        var urls = 'welcome/do_gaohao';
        //ajax返回
        $.post('user/do_guahao', {
            hzName: hzName,
            hzContact: hzContact,
            hzTime: hzTime,
            content: content
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
//        $.ajax({
//            url: urls,
//            data: {
//                hzName: hzName,
//                hzContact: hzContact,
//                hzTime: hzTime,
//                content: content,
//                addTime: addTime,
//                bztype: bztype,
//                laiyuan: laiyuan,
//                hfTime: hfTime
//            },
//            type: 'post',
//            success: function (data) {
//                if (data == 1 || data == 0) {
//                    alert('添加成功！');
//                } else {
//                    alert('添加失败！请输入正确的信息...');
//                }
//                $('#hzName').val(' ');
//                $('#hzContact').val(' ');
//                $('#datepicker_yy').val(' ');
//                //$('#addTime').val(' ');
//                $('#bztype').val(' ');
//                $('#content').val(' ');
//                $('#laiyuan').val(' ');
//                //$('#hfTime').val(' ');
//            }
//        })
    }

</script>

<script>
    $(function () {
        $('#datePicker').on('click', function () {
            $('.datepicker').css({
                left: $(this).offset().left + 100,
                top: $(this).offset().top + 40
            });
        });

        $('#datePicker').datepicker({
            language: 'zh-CN',
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    });
</script>

</body>
</html>