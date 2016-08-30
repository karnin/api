<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>api</title>
    <link href={{ asset('css/all.css') }} rel="stylesheet">
    <link href={{ asset('base/font-awesome/css/font-awesome.css') }} rel="stylesheet">
    {{--<link href={{ asset('base/css/bootstrap.min.css') }} rel="stylesheet">

    <link href={{ asset('base/css/animate.css') }} rel="stylesheet">
    <link href={{ asset('base/css/style.css') }} rel="stylesheet">--}}
    @yield('css')
</head>
<body id="app">
<div id="wrapper">
    @include('home.section_nav')
    <div id="page-wrapper" class="gray-bg dashbard-1">

        @yield('content')
    </div>
</div>
<!-- Mainly scripts -->
{{--<script src={{ asset('base/js/jquery-2.1.1.js') }}></script>--}}
<script src={{ asset('js/all.js') }}></script>
{{--<script src={{ asset('base/js/bootstrap.min.js') }}></script>
<script src={{ asset('base/js/plugins/metisMenu/jquery.metisMenu.js') }}></script>
<script src="{{ asset('base/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src={{ asset('base/js/inspinia.js') }}></script>
<script src={{ asset('base/js/plugins/pace/pace.min.js') }}></script>
<!-- jQuery UI -->
<script src={{ asset('base/js/plugins/jquery-ui/jquery-ui.min.js') }}></script>--}}
@yield('js')
</body>
</html>
