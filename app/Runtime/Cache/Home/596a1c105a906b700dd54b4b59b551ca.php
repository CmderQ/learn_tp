<?php if (!defined('THINK_PATH')) exit();?><!--加载公用头文件-->
<!DOCTYPE doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/ace.min.css">
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/jquery.loadmask.spin.css">
    <!--加载动画-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/chosen.css">
    <!--多选文本框-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/font-awesome.min.css">
    <!--图标字体-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/prettify.css">
    <!--代码美化-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/datepicker.css">
    <!--日期组件-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/bootstrap-duallistbox.css">
    <!--复选列表组件-->
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/tp/Public/static/css/login.css">
    </meta>
</head>


<body>
<div class="page-header center">
    <h1>
            <span class="">
                用户登录页面
            </span>
    </h1>
</div>
<div class="container">
    <div class="form-horizontal">
        <div class="form-group center">
            <label>
                <img src="/tp/Public/static/images/avtar.png"/>
            </label>
        </div>
        <div class="form-group ">
            <label class="col-md-1 col-md-offset-3 control-label">
                用户名
            </label>
            <div class="col-md-5">
                <input class="form-control" name="" placeholder="请输入用户名" type="text">
                </input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1 col-md-offset-3 control-label">
                密码
            </label>
            <div class="col-md-5">
                <input class="form-control" name="" placeholder="请输入密码" type="password">
                </input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 col-md-offset-4 control-label">
                <input class="form-control" name="verify" placeholder="验证码" type="text">
                </input>
            </label>
            <div class="col-md-4">
                <img id="verify_img" src="/tp/index.php/Home/Login/generatorVerfiy" alt="验证码" title="点击刷新"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                <a data-dismiss="modal" data-target="#register" data-toggle="modal" id="register_link">
                    还没有账号？点我注册
                </a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4 col-md-2">
                <button class="btn btn-success register">
                    登录
                </button>
                <button class="btn btn-danger">
                    取消
                </button>
            </div>
        </div>
    </div>
    <!-- 注册窗口 弹窗的形式-->
    <div class="modal hide" id="register" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal">
                    <span>
                        ×
                    </span>
                    </button>
                </div>
                <div class="modal-title">
                    <h1 class="text-center">
                        注册
                    </h1>
                </div>
                <div class="modal-body">
                    <form action=" " class="form-group">
                        <div class="form-group">
                            <label class="control-label">
                                用户名
                            </label>
                            <input class="form-control username" placeholder="用户名长度范围6-15位" type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                密码
                            </label>
                            <input class="form-control password" placeholder="至少6位" type="password">
                            </input>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                再次输入密码
                            </label>
                            <input class="form-control repassword" placeholder="至少6位" type="password">
                            </input>
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                邮箱
                            </label>
                            <input class="form-control email" placeholder="例如:123@123.com" type="email">
                            </input>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary register" type="button">
                                提交
                            </button>
                            <button class="btn btn-danger" data-dismiss="modal">
                                取消
                            </button>
                        </div>
                        <a data-dismiss="modal" data-toggle="modal" href="">
                            已有账号？点我登录
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/tp/Public/static/js/jquery.min.js" type="text/javascript">
</script>
<script src="/tp/Public/static/js/bootstrap.min.js" type="text/javascript">
</script>
<script src="/tp/Public/static/js/fuelux.js" type="text/javascript">
</script>
<!--数字选择框spinner依赖-->
<script src="/tp/Public/static/js/bootbox.js" type="text/javascript">
</script>
<!--对话框-->
<script src="/tp/Public/static/js/jquery.gritter.js" type="text/javascript">
</script>
<!--自动消失的提示条-->
<script src="/tp/Public/static/js/bootstrap-datepicker.js" type="text/javascript">
</script>
<!--日期选择器，必须放在fuelux之后，否则会冲突-->
<script src="/tp/Public/static/js/bootstrap-datepicker.zh-CN.js" type="text/javascript">
</script>
<!--日期选择器本地化-->
<script src="/tp/Public/static/js/spin.min.js" type="text/javascript">
</script>
<!--转菊花-->
<script src="/tp/Public/static/js/jquery.loadmask.spin.js" type="text/javascript">
</script>
<!--加载动画-->
<script src="/tp/Public/static/js/chosen.jquery.js" type="text/javascript">
</script>
<!--对话框-->
<script src="/tp/Public/static/js/jquery.bootstrap-duallistbox.js" type="text/javascript">
</script>
<!--双列多选列表-->
<script src="/tp/Public/static/js/ace.min.js" type="text/javascript">
</script>
<script src="/tp/Public/static/js/ace-elements.js" type="text/javascript">
</script>
<!--ace组件-->
<script src="/tp/Public/static/js/jquery.scrollUp.min.js" type="text/javascript">
</script>
<!--滚到顶部-->
<script src="/tp/Public/static/js/common.js" type="text/javascript">
</script>
<!--后台库类js-->
<script src="/tp/Public/static/js/prettify.js" type="text/javascript">
</script>
<!--代码美化-->
<script type="text/javascript">
    $().ready(function () {
        //随机生成验证码
        $("#verify_img").click(function () {
            var verifyURL = "/tp/index.php/Home/Login/generatorVerfiy";
            var time = new Date().getTime();
            $("#verify_img").attr({"src": verifyURL + "/" + time});
        });

        //注册
        $(".register").click(function () {
            var username = $(".username").val(),
                password = $(".password").val(),
                repassword = $(".repassword").val(),
                email = $(".email").val();
            if (!username) {
                alert("用户名不能为空");
                return false;
            }
            if (username.length < 6 || username.length > 15) {
                alert("用户名长度范围为6到15位");
                return false;
            }

            if (!password) {
                alert("密码不能为空");
                return false;
            }
            if (password.length < 6) {
                alert("密码长度最少为6位");
                return false;
            }

            if (!repassword) {
                alert("再次输入的密码不能为空");
                return false;
            }
            if (repassword.length < 6) {
                alert("密码长度最少为6位");
                return false;
            }

            //判断前后两次输入的密码是否一致
            if (trim(password) != trim(repassword)) {
                alert("两次输入的密码不一致，请重试");
                return false;
            }

            if (!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) {
                alert("邮箱格式不正确, 请重新输入");
                return false;
            }

            $.ajax({
                type: "POST",
                data: {user: username, paword: password, email: email},
                url: "/tp/index.php/Home/Login/register",
                dataType: "json",
                success: function (result) {
                    if (result.status == 1) {
                        alert(result.info);
                        window.location.reload();
                    } else {
                        alert(result.info);
                        window.location.reload();
                        $("#register_link").data-target("#register");
                    }
                },
                error: function (message) {
                    console.log(message);
                }
            });

        });
    })
</script>
</body>