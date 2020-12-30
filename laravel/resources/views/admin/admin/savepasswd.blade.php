<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>修改密码--layui后台管理模板 2.0</title>
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
<form class="layui-form layui-row changePwd" action="/admin/admin/savepasswd" method="post">
    {{csrf_field()}}
    <div class="layui-col-xs12 layui-col-sm6 layui-col-md6">
        <div class="layui-input-block layui-red pwdTips">新密码必须两次输入一致才能提交</div>
        <input type="hidden" value="{{Session::get('admin_user')->id}}" name="id">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" value="{{Session::get('admin_user')->user}}" disabled class="layui-input layui-disabled">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-block">
                <input type="password" name="passwd" value="" placeholder="请输入新密码" lay-verify="required|newPwd" id="oldPwd" class="layui-input pwd">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="passwd_confirmation" value="" placeholder="请确认密码" lay-verify="required|confirmPwd" class="layui-input pwd">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="changePwd">立即修改</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript" src="/admin/layui/layui.js"></script>
<script type="text/javascript">

    layui.use(['form','layer'],function() {
        var form = layui.form,
            layer = parent.layer === undefined ? layui.layer : top.layer,
            $ = layui.jquery

        @if($data['msg'])
            layer.msg('{{$data['msg']}}')
        @endif
        //添加验证规则

        form.verify({

            newPwd : function(value, item){
                if(value.length < 6){
                    return "密码长度不能小于6位";
                }
            },
            confirmPwd : function(value, item){
                if(!new RegExp($("#oldPwd").val()).test(value)){
                    return "两次输入密码不一致，请重新输入！";
                }
            }
        })


    });
</script>
</body>
</html>
