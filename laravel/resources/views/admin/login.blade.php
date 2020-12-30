<!DOCTYPE html>
<html class="loginHtml">
<head>
    <meta charset="utf-8">
    <title>登录-后台管理系统-laravel8</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
{{--    <link rel="icon" href="../../favicon.ico">--}}
    <link rel="stylesheet" href="/admin/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/admin/css/public.css" media="all" />
</head>
<body class="loginBody">

<form class="layui-form" method="post" action="">
    {{csrf_field()}}
    <div class="login_face"><img src="/admin/images/face.jpg" class="userAvatar"></div>

    <div class="layui-form-item input-item">
        <label for="userName">用户名</label>
        <input type="text" placeholder="请输入用户名" name="user" autocomplete="off" id="userName" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item">
        <label for="password">密码</label>
        <input type="password" placeholder="请输入密码" name="passwd" autocomplete="off" id="password" class="layui-input" lay-verify="required">
    </div>
    <div class="layui-form-item input-item" id="imgCode">
        <label for="code">验证码</label>
        <input type="text" placeholder="请输入验证码" name="captcha" autocomplete="off" id="code" class="layui-input">
        <img src="{{captcha_src()}}">
    </div>
    <div class="layui-form-item">
        <button class="layui-btn layui-block" id="submit" lay-filter="login" lay-submit>登录</button>
    </div>

{{--    <div class="layui-form-item layui-row">--}}
{{--        <a href="javascript:;" class="seraph icon-qq layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
{{--        <a href="javascript:;" class="seraph icon-wechat layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
{{--        <a href="javascript:;" class="seraph icon-sina layui-col-xs4 layui-col-sm4 layui-col-md4 layui-col-lg4"></a>--}}
{{--    </div>--}}
</form>
<script type="text/javascript" src="/admin/layui/layui.js"></script>
<script type="text/javascript" src="/admin/js/login.js"></script>
<script type="text/javascript" src="/admin/js/cache.js"></script>
<script>
    layui.use('layer',function(){
        var layer = layui.layer;
        layer.ready(function(){
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                layer.msg('{{ $error }}');
                @endforeach
            @endif
            @if($msg)
                layer.msg('{{ $msg }}');
            @endif
        });


    });

</script>
</body>
</html>
