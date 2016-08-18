<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INSPINIA | Dashboard</title>
    <link href={{ asset('base/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('base/font-awesome/css/font-awesome.css') }} rel="stylesheet">
    <link href={{ asset('base/css/animate.css') }} rel="stylesheet">
    <link href={{ asset('base/css/style.css') }} rel="stylesheet">
    @yield('css')
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a href="index.html#"> api</a>
                    </div>
                </li>
                <li>
                    <a href="index.html#"><i class="fa fa-sitemap"></i> <span class="nav-label">接口 </span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li>
                            <a href="index.html#">知府机构版<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level in">
                                <li>
                                    <a href="index.html#">1.0.0</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index.html#">知府用户版<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level"></ul>
                        </li>
                        <li><a href="index.html#">Second Level Item</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.html#"><i class="fa fa-sitemap"></i> <span class="nav-label">数据字典 </span><span
                                class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li><a href="index.html#">db1</a></li>
                        <li><a href="index.html#">db2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="login.html"> <i class="fa fa-sign-out"></i> 登录 </a>
                    </li>
                </ul>
            </nav>
        </div>
        @yield('content')
    </div>
</div>
<!-- Mainly scripts -->
<script src={{ asset('base/js/jquery-2.1.1.js') }}></script>
<script src={{ asset('base/js/bootstrap.min.js') }}></script>
<script src={{ asset('base/js/plugins/metisMenu/jquery.metisMenu.js') }}></script>
<script src="{{ asset('base/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<script src={{ asset('base/js/inspinia.js') }}></script>
<script src={{ asset('base/js/plugins/pace/pace.min.js') }}></script>
<!-- jQuery UI -->
<script src={{ asset('base/js/plugins/jquery-ui/jquery-ui.min.js') }}></script>
@yield('js')
</body>
</html>
