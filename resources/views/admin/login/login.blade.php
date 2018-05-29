@extends('public.child')

@section('title', '后台登陆')
@section('import')
@endsection
@section('content')
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">H+</h1>

            </div>
            <h3>欢迎使用 H+</h3>

            <form class="m-t" role="form" action="{{url('login')}}" method="post">
                <div class="form-group">
                    <input type="text"  name="name" class="form-control" placeholder="用户名" >
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码" >
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>

                {{--<p class="text-muted text-center"> <a href="login.html#"><small>忘记密码了？</small></a> | <a href="register.html">注册一个新账号</a>--}}
                </p>

            </form>
        </div>
    </div>

@endsection