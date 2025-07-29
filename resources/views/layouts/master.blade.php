<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Event Reminder App">
    <meta name="keywords" content="mit, wms">
    <meta name="author" content="MIT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Event Reminder App</title>
    <link rel="apple-touch-icon" href="{{ url('app_assets') }}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('app_assets') }}/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&family=Oswald:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css') }}/custom.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css') }}/modal.css">
    <link rel="stylesheet" type="text/css" href="{{ url('css') }}/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('app_assets') }}/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" href="{{url('jQueryUI')}}/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="{{url('jQueryDateTimePicker')}}/css/jquery-ui-timepicker-addon.min.css">
    @yield('header_css')
    @yield('header_js')
</head>
<body class="horizontal-layout horizontal-menu 2-columns menu-expanded" data-open="click" data-menu="horizontal-menu" data-col="2-columns">
    <!-- Horizontal navigation-->
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="nav-link" href="{{url('/dashboard')}}">
                        <i class="fas fa-home"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="fas fa-boxes"></i><span>Event Reminder App</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{ url('events') }}" data-toggle="dropdown"> Admin </a></li>
                        <li data-menu=""><a class="dropdown-item" href="{{ url('/events-upload/import') }}" data-toggle="dropdown"> Upload CSV </a></li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <!-- Horizontal navigation-->
    <div class="app-content container-fluid center-layout mt-1 mb-3">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
            <span class="float-md-left d-block d-md-inline-block">
                Copyright &copy; 2024, All rights reserved.
            </span>
            <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Developed By Moon Kabir</span>
        </p>
    </footer>
    <script src="{{url('app_assets')}}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ url('app_assets') }}/vendors/js/ui/jquery.sticky.js"></script>
    <script src="{{url('app_assets')}}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{url('app_assets')}}/js/core/app.js" type="text/javascript"></script>
    <script src="{{url('app_assets')}}/js/core/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('app_assets')}}/js/core/form-select2.js" type="text/javascript"></script>
    <script src="{{url('jQueryUI')}}/js/jquery-ui.js"></script>
    <script src="{{url('jQueryDateTimePicker')}}/js/jquery-ui-timepicker-addon.min.js"></script>
    <script src="{{url('js')}}/fontAwesomeKit.js"></script>
    <script src="{{url('js')}}/custom.js"></script>
    @yield('footer_js')
</body>
</html>
