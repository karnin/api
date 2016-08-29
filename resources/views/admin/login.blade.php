<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>api | Login</title>

    <link href={{ asset('css/all.css') }} rel="stylesheet">
    <link href={{ asset('base/font-awesome/css/font-awesome.css') }} rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>



        <p>请登录</p>
        <form class="m-t" role="form" action="{{ url('admin/login') }}" method="post">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="账号" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登录</button>

        </form>

    </div>
</div>

<!-- Mainly scripts -->
<script src={{ asset('js/all.js') }}></script>

</body>

</html>
