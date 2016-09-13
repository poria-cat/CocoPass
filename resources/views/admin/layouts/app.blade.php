<!DOCTYPE html>
<html lang="zh-Hans" class="han-init">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="/dashboard/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="/dashboard/font-awesome/css/font-awesome.min.css">

    <script src="/js/app.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div id="wrapper">
    {{--default navgation--}}
    @if (Auth::guard('admin')->guest())
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        MyDashboard
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <li><a href="{{ url('/admin/login') }}">登陆</a></li>
                        <li><a href="{{ url('/admin/register') }}">注册</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        {{--MyDashboard navgation--}}
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">MyDashboard</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::guard('admin')->guest())
                    <li><a href="{{ url('/admin/login') }}">登陆</a></li>
                    <li><a href="{{ url('/admin/register') }}">注册</a></li>
                @else

                <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ Auth::guard('admin')->user()->name }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i>   Logout
                                </a>
                                <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                @endif
            </ul>
            <!-- /.navbar-top-links -->
        @include('admin.layouts.left_menu')
        <!-- /.navbar-static-side -->
        </nav>


    @endif



    @yield('content')
</div>

<!-- Scripts -->
<!-- Metis Menu Plugin JavaScript -->
<script src="/dashboard/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/dashboard/js/sb-admin-2.js"></script>

</body>
</html>
