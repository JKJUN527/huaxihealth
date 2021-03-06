<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>登录 | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/material.style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/material.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/icon-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("plugins/sweetalert/sweetalert.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/animate-css/animate.min.css')}}"/>

    <link rel="stylesheet" type="text/css" href="{{asset('style/admin-style.css')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<style>
</style>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Four2Nine - <b>管理系统</b></a>
        <br>
        <small>&copy;2016-2017 Four2Nine | Design: gurayyarar</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in_form" method="POST">

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" id="username" name="username" placeholder="登录名">
                    </div>
                    <label id="username-error" class="error" for="username"></label>
                </div>

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" id="password" name="password" placeholder="密码">
                    </div>
                    <label id="password-error" class="error" for="password"></label>
                </div>

                <div class="row">
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-teal waves-effect" type="submit">立即登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/material.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<script src="{{asset('js/master.js')}}"></script>
<script src="{{asset('js/admin-form-validation.js')}}"></script>

<script type="text/javascript">
    $("#sign_in_form").submit(function (event) {
        event.preventDefault();

        var $form = $(this);

        var serializedData = $form.serialize();

        //验证管理员名
        if (!checkUsername($("#username"))) {
            return false;
        }

        //验证密码
        if (!checkPassword($("#password"))) {
            return false;
        }
        $.ajax({
            url: "/admin/login",
            type: "post",
            dataType: 'text',
            data: serializedData,
            success: function (data) {
                var result = JSON.parse(data);
                checkResultWithLocation(result.status, "登录成功，正在跳转...", result.msg, "/admin");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal(xhr.status + "：" + thrownError);
            }
        });
    });

    //失去焦点时判断 input 的合法性
    $("#username").blur(function () {
        checkUsername($(this));
    });
    $("#password").blur(function () {
        checkPassword($(this))
    });

    $(".form-control").focus(function () {
        $(this.parentNode).addClass("focused");
    }).blur(function () {
        $(this.parentNode).removeClass("focused");
    });
</script>
</body>

</html>
