<html lang="zh-CN">
<head>
    <title> @yield('title')</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="adminfile/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="adminfile/font-awesome/css/font-awesome.css?v=4.3.0" rel="stylesheet">

    <!-- Morris -->
    <link href="adminfile/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="adminfile/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="adminfile/css/animate.css" rel="stylesheet">
    <link href="adminfile/css/style.css?v=2.2.0" rel="stylesheet">
    <!-- Mainly scripts -->
    <script src="adminfile/js/jquery-2.1.1.min.js"></script>
    <script src="adminfile/js/bootstrap.min.js?v=3.4.0"></script>
    @yield('import')
</head>
<body>
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