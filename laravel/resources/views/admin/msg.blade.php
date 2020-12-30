<!DOCTYPE html>
<html class="loginHtml">
<head>
    <meta charset="utf-8">
    <title>提示信息</title>
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
<body>




<div style="padding: 20rem; background-color: #F2F2F2; text-align: center; position: relative; left: 0; bottom: 0; top: 0; right: 0;">
    <div class="layui-inline">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">提示信息</div>
                    <div class="layui-card-body">
                        {{$data['msg']}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/admin/layui/layui.js"></script>
<script type="text/javascript">
    layui.msg('{{$data[\'msg\']}}');

</script>

</body>
</html>
