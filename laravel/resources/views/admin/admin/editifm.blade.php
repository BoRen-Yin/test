<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文章列表--layui后台管理模板 2.0</title>
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
<form class="layui-form" style="width:80%;">
    <div class="layui-form-item layui-row layui-col-xs12">
        <input type="hidden" name="id" class="layui-input id">
        <label class="layui-form-label">账号</label>
        <div class="layui-input-block">
            <input type="text" name="user" class="layui-input user" lay-verify="required" placeholder="请输入登录名">
        </div>
    </div>

    <div class="layui-form-item layui-row layui-col-xs12">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input type="password" name="passwd" class="layui-input passwd" lay-verify="required" placeholder="请输入登入密码">
        </div>
    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input type="text" name="uname" class="layui-input uname" lay-verify="required" placeholder="请输入姓名">
        </div>
    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input type="text" name="email" class="layui-input email" lay-verify="email" placeholder="请输入邮箱">
        </div>
    </div>
    <div class="layui-row">

        <div class="magb15 layui-col-md4 layui-col-xs12">
            <label class="layui-form-label">管理员等级</label>
            <div class="layui-input-block">
                <select name="auth_id" class="auth_id" lay-filter="auth_id">

                    <option value="1">普通管理员</option>
                    <option value="2">数据录入员</option>
                    <option value="3">超级管理员</option>
                </select>
            </div>
        </div>

    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-block userSex">
            <input type="radio" name="status" value="1" title="启用" checked>
            <input type="radio" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item layui-row layui-col-xs12">
        <div class="layui-input-block">
            <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="addUser">立即添加</button>
            <button type="reset" class="layui-btn layui-btn-sm layui-btn-primary">取消</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/admin/layui/layui.js"></script>
<script type="text/javascript">
    layui.use(['form','layer'],function(){
        var form = layui.form
        layer = parent.layer === undefined ? layui.layer : top.layer,
            $ = layui.jquery;

        form.on("submit(addUser)",function(data){
            //弹出loading
            var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
            // 实际使用时的提交信息
            // $.post("上传路径",{
            //     userName : $(".userName").val(),  //登录名
            //     userEmail : $(".userEmail").val(),  //邮箱
            //     userSex : data.field.sex,  //性别
            //     userGrade : data.field.userGrade,  //会员等级
            //     userStatus : data.field.userStatus,    //用户状态
            //     newsTime : submitTime,    //添加时间
            //     userDesc : $(".userDesc").text(),    //用户简介
            // },function(res){
            //
            // })
            setTimeout(function(){
                top.layer.close(index);
                top.layer.msg("用户添加成功！");
                layer.closeAll("iframe");
                //刷新父页面
                parent.location.reload();
            },2000);
            return false;
        })

        //格式化时间
        function filterTime(val){
            if(val < 10){
                return "0" + val;
            }else{
                return val;
            }
        }
        //定时发布
        var time = new Date();
        var submitTime = time.getFullYear()+'-'+filterTime(time.getMonth()+1)+'-'+filterTime(time.getDate())+' '+filterTime(time.getHours())+':'+filterTime(time.getMinutes())+':'+filterTime(time.getSeconds());

    })

</script>
</body>
</html>
