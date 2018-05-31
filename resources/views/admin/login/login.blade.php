@extends('public.child')

@section('title', '后台登陆')
@section('import')
@endsection
@section('content')

    <div class="login-bg" style="height: 100%">
        <div class="login layui-anim layui-anim-up">
            <div class="message">x-admin2.0-管理登录</div>
            <div id="darkbannerwrap"></div>

            <form action="{{url('login')}}" method="post" class="layui-form">
                <input name="name" placeholder="用户名" type="text" lay-verify="required" class="layui-input">
                <hr class="hr15">
                {{ csrf_field() }}
                <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input">
                <hr class="hr15">
                <div class="layui-row">
                    <div class="layui-col-md4">
                        <img src="{{captcha_src('flat')}}" onclick="this.src=this.src+'?'" alt="点击刷新">
                    </div>
                    <div class="layui-col-md8">
                        <input type="text" class="form-control" id="captcha" name="captcha" required placeholder="验证码">
                    </div>
                </div>
                <hr class="hr15">
                <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
                <hr class="hr20">
            </form>
        </div>

        <script>
            $(function () {
                layui.use('form', function () {
                    var form = layui.form;
                    // layer.msg('玩命卖萌中', function(){
                    //   //关闭后的操作
                    //   });
                    //监听提交
                    {{--form.on('submit(login)', function (data) {--}}
                        {{--layer.msg(JSON.stringify(data.field), function () {--}}
                            {{--location.href = "{{url('login')}}"--}}
                        {{--});--}}
                        {{--return false;--}}
                    {{--});--}}
                });
            })


        </script>
    </div>

@endsection