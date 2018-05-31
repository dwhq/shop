<html lang="zh-CN">
<head>
    <title> @yield('title')</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('adminfile/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('adminfile/css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('adminfile/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('adminfile/js/xadmin.js')}}"></script>

    @yield('import')
</head>
<body>
<div>
    {{--@include('myflash::notification')--}}
    {{--或者--}}
    @include('myflash::top-message')
    {{--或者--}}
    {{--@include('myflash::bottom-message')--}}
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    @yield('content')
</div>
</body>

</html>