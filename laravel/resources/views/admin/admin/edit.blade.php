<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>个人资料--layui后台管理模板 2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/admin/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/admin/css/public.css" media="all" />
</head>
<body class="childrenBody">
<form class="layui-form layui-row">

    <div class="layui-col-md6 layui-col-xs12">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" value="{{Session::get('admin_user')->user}}" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户组</label>
            <div class="layui-input-block">
                <input type="text" value="{{Session::get('admin_auth')}}" disabled class="layui-input layui-disabled">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">真实姓名</label>
            <div class="layui-input-block">
                <input type="text" value="{{Session::get('admin_user')->uname}}" placeholder="请输入真实姓名" lay-verify="required" class="layui-input realName">
            </div>
        </div>





        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" value="{{Session::get('admin_user')->email}}" placeholder="请输入邮箱" lay-verify="email" class="layui-input userEmail">
            </div>
        </div>
        <div class="layui-form-item" pane="">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block userSex">
                <input type="radio" name="status" value="1" title="启用" checked="">
                <input type="radio" name="status" value="0" title="禁用">

            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="changeUser">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="/admin/layui/layui.js"></script>
<script type="text/javascript" src="/admin/js/userInfo.js"></script>
<script type="text/javascript" src="/admin/js/cacheUserInfo.js"></script>
</body>
</html>
