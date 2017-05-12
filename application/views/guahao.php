<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url(); ?>">
    <link href="css/guahao.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.ui.base.css" rel="stylesheet" type="text/css"/>
    <link href="css/jquery.ui.theme.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/m_style.js"></script>
    <script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.core.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.ui.datepicker.js" charset="utf-8"></script>

    <!--预约时间-->
    <script language="javascript">
        $(function () {
            $("#datepicker_yy,#datepicker_hf,#datepicker_xdz,#datepicker_xhf").datepicker();
        });
        $(document).ready(function () {
            $("input:radio").click(function () {
                var a = $('input:radio[id="way"]:checked').val();
                if (a == 2) {
                    $("#media").show();
                } else {
                    $("#media").hide();
                }
            })
        });
    </script>
</head>
<body>

<!--预约挂号-->
<div class="part3">
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
                    <input type="text" id="hzContact" name="hzContact" value="请输入手机号码"
                           onfocus="if (value ==='请输入手机号码'){value =''}">
                </p>
                <!--预约时间-->
                <p>
                    <label for="user_shijian">时间：</label>
                    <input type="text" id="datepicker_yy" name="hzTime" value="" required="required">
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
                    <input type="submit" name="gh_submit" value="立刻提交" style="background:#ff9c00; margin-right:.55rem"
                           onclick="add()">
                    <input type="reset" value="重新填写" style="background:#039d83;">
                </div>
            </form>
        </div>
    </section>
</div>

<div class="clear"></div>

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
        var phone = document.getElementById('hzContact').value;
        if (!(/^1(3|4|5|7|8)\d{9}$/.test(phone))) {
            alert("手机号码有误，请重填");
            return false;
        }
        //提取来源页面
        document.getElementById('laiyuan').value += window.location.href;
        //表单提交处理
        var hzName = $('#hzName').val();
        var hzContact = $('#hzContact').val();
        var hzTime = $('#datepicker_yy').val();
        var addTime = $('#addTime').val();
        var bztype = $('#bztype').val();
        var content = $('#content').val();
        var laiyuan = $('#laiyuan').val();
        var hfTime = $('#hfTime').val();
        var urls = '/?m=addpatientgh&a=add';
        //ajax返回
        $.ajax({
            url: urls,
            data: {
                hzName: hzName,
                hzContact: hzContact,
                hzTime: hzTime,
                content: content,
                addTime: addTime,
                bztype: bztype,
                laiyuan: laiyuan,
                hfTime: hfTime
            },
            type: 'post',
            success: function (data) {
                if (data == 1 || data == 0) {
                    alert('添加成功！');
                } else {
                    alert('添加失败！请输入正确的信息...');
                }
                $('#hzName').val(' ');
                $('#hzContact').val(' ');
                $('#datepicker_yy').val(' ');
                //$('#addTime').val(' ');
                $('#bztype').val(' ');
                $('#content').val(' ');
                $('#laiyuan').val(' ');
                //$('#hfTime').val(' ');
            }
        })
    }

</script>

</body>
</html>