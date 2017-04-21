<!DOCTYPE html>
<html lang="en">
<!-- START Head -->
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <!-- Enable responsiveness on mobile devices-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
    </title>

    <!--START Loader -->
    <style>
        #initial-loader{display:flex;align-items:center;justify-content:center;flex-wrap:wrap;width:100%;background:#212121;position:fixed;z-index:10000;top:0;left:0;bottom:0;right:0;transition:opacity .2s ease-out}#initial-loader .initial-loader-top{display:flex;align-items:center;justify-content:space-between;width:200px;border-bottom:1px solid #2d2d2d;padding-bottom:5px}#initial-loader .initial-loader-top > *{display:block;flex-shrink:0;flex-grow:0}#initial-loader .initial-loader-bottom{padding-top:10px;color:#5C5C5C;font-family:-apple-system,"Helvetica Neue",Helvetica,"Segoe UI",Arial,sans-serif;font-size:12px}@keyframes spin{100%{transform:rotate(360deg)}}#initial-loader .loader g{transform-origin:50% 50%;animation:spin .5s linear infinite}body.loading {overflow: hidden !important} body.loaded #initial-loader{opacity:0}
    </style>
    <!--END Loader-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- SCSS Output -->
    <!-- build:css assets/stylesheets/app.min.css -->
    <link rel="stylesheet" href="/assets/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="/assets/stylesheets/app.css">
    <link rel="stylesheet" href="/assets/stylesheets/plugins.css">
    <link rel="stylesheet" href="/assets/vendor/css/select2.css">
    <link rel="stylesheet" href="/assets/vendor/css/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/stylesheets/custom.css">
    <!-- endbuild -->

    <!-- START Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/favicons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/favicons/android-chrome-256x256.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicons/favicon-16x16.png">
    <link rel="mask-icon" href="/assets/images/favicons/safari-pinned-tab.svg" color="#f85d4c">
    <meta name="theme-color" content="#ffffff">
    <!-- END Favicon -->

    <!-- RSS -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="atom.xml">

    <!--    <style>
        .navigation .sidebar {
      background: background: rgba(39,40,46,1);
    background: -moz-linear-gradient(top, rgba(39,40,46,1) 0%, rgba(58,65,80,1) 100%);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(39,40,46,1)), color-stop(100%, rgba(58,65,80,1)));
    background: -webkit-linear-gradient(top, rgba(39,40,46,1) 0%, rgba(58,65,80,1) 100%);
    background: -o-linear-gradient(top, rgba(39,40,46,1) 0%, rgba(58,65,80,1) 100%);
    background: -ms-linear-gradient(top, rgba(39,40,46,1) 0%, rgba(58,65,80,1) 100%);
    background: linear-gradient(to bottom, rgba(39,40,46,1) 0%, rgba(58,65,80,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#27282e', endColorstr='#3a4150', GradientType=0 );
      direction: ltr;
    }
        </style>-->
    <!-- jekyll settings -->
    <script>
        var ASSET_PATH_BASE = '';
    </script>
</head>
<!-- END Head -->


<body class="sidebar-full-height sidebar-full-height sidebar-slim">
<script src="/assets/vendor/js/lib.min.js"></script>

<div class="main-wrap" id="app">
    <nav class="navigation">
        <!-- START Navbar -->
        <div class="navbar-default navbar navbar-fixed-top">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="current navbar-brand" href="{{ url('/') }}">
                        <img alt="Spin Logo Inverted" class="h-20" src="assets/images/logo-warning-black@2X.png">
                    </a>
                    <button class="action-right-sidebar-toggle navbar-toggle collapsed" data-target="#navdbar" data-toggle="collapse" type="button">
                        <i class="fa fa-fw fa-align-right"></i>
                    </button>
                    <button class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                        <i class="fa fa-fw fa-user"></i>
                    </button>
                    <button class="action-sidebar-open navbar-toggle collapsed" type="button">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbar">

                    <!-- START Search Mobile -->
                    <div class="form-group hidden-lg hidden-md hidden-sm m-t-2">
                        <div class="input-group hidden-lg hidden-md">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-search"></i></button>
                    </span>
                        </div>
                    </div>
                    <!-- END Search Mobile -->

                    <!-- START Left Side Navbar -->
                    <ul class="nav navbar-nav navbar-left clearfix yamm">

                        <!-- START Switch Sidebar ON/OFF -->
                        <li id="sidebar-switch" class="hidden-xs">
                            <a class="action-toggle-sidebar-slim" data-placement="bottom" data-toggle="tooltip" href="#" title="Slim sidebar on/off">
                                <i class="fa fa-lg fa-bars fa-fw"></i>
                            </a>
                        </li>
                        <!-- END Switch Sidebar ON/OFF -->

                        <li class="spin-search-box clearfix hidden-xs">
                            <a href="#" class="pull-left">
                                <i class="fa fa-search fa-lg icon-inactive"></i>
                                <i class="fa fa-close  fa-lg icon-active"></i>
                            </a>
                            <div class="input-group input-group-sm pull-left p-10">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn active">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                    </ul>
                    <!-- START Left Side Navbar -->

                    <!-- START Right Side Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li role="separator" class="divider hidden-lg hidden-md hidden-sm"></li>
                        <li class="dropdown-header hidden-lg hidden-md hidden-sm text-gray-lighter text-uppercase">
                            <strong>Your Profile</strong>
                        </li>

                        <!-- START Notification -->
                        <li class="dropdown">
                            <!-- START Icon Notification width Badge (10) -->
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                                <i class="fa fa-lg fa-fw fa-bell hidden-xs"></i>
                                <span class="hidden-sm hidden-md hidden-lg">
                                    Notifications <span class="badge badge-primary m-l-1">10</span>
                                </span>
                                <span class="label label-primary label-pill label-with-icon hidden-xs">10</span>
                                <span class="fa fa-fw fa-angle-down hidden-lg hidden-md hidden-sm"></span>
                            </a>
                            <!-- END Icon Notification with Badge (10) -->

                            <!-- START Notification Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-right p-t-0 b-t-0 p-b-0 b-b-0 b-a-0">
                                <li>
                                    <div class="yamm-content p-t-0 p-r-0 p-l-0 p-b-0">
                                        <ul class="list-group m-b-0 b-b-0">
                                            <li class="list-group-item b-r-0 b-l-0 b-r-0 b-t-r-0 b-t-l-0 b-b-2 w-350">
                                                <small class="text-uppercase">
                                                    <strong>Notifications</strong>
                                                </small>
                                                <a role="button" href="#" class="btn m-t-0 btn-xs btn-default pull-right">
                                                    <i class="fa fa-fw fa-gear"></i>
                                                </a>
                                            </li>

                                            <!-- START Scroll Inside Panel -->
                                            <li class="list-group-item b-a-0 p-x-0 p-y-0 b-t-0">
                                                <div class="scroll-300 custom-scrollbar">
                                                    <a href="#" class="list-group-item b-r-0 b-t-0 b-l-0">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle-thin fa-stack-2x text-danger"></i>
                                                                    <i class="fa fa-close fa-stack-1x fa-fw text-danger"></i>
                                                                </span>
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="m-t-0">
                                                                    You can&apos;t program the alarm without quantifying the haptic HTTP interface!
                                                                </h5>
                                                                <p class="text-nowrap small m-b-0">
                                                                    <span>2017-03-22</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <!-- END Scroll Inside Panel -->
                                            <li class="list-group-item b-a-0 p-x-0 p-y-0 r-a-0 b-b-0">
                                                <a class="list-group-item text-center b-r-0 b-b-0 b-l-0 b-r-b-r-0 b-r-b-l-0" href="#">
                                                    See all Notifications <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!-- END Notification Dropdown Menu -->
                        </li>
                        <!-- END Notification -->

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                                <i class="fa fa-lg fa-fw fa-envelope hidden-xs"></i>
                                <span class="hidden-sm hidden-md hidden-lg">Messages <span class="badge badge-info m-l-1">3</span></span>
                                <span class="label label-info label-pill label-with-icon hidden-xs">3</span>
                                <span class="fa fa-fw fa-angle-down hidden-lg hidden-md hidden-sm"></span>
                            </a>

                            <!-- START Messages Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-right p-t-0 b-t-0 p-b-0 b-b-0 b-a-0">
                                <li>
                                    <div class="yamm-content p-t-0 p-r-0 p-l-0 p-b-0">
                                        <ul class="list-group m-b-0">
                                            <li class="list-group-item b-r-0 b-l-0 b-r-0 b-t-r-0 b-t-l-0 b-b-2 w-350">
                                                <small class="text-uppercase">
                                                    <strong>Messages</strong>
                                                </small>
                                                <a role="button" href="../apps/new-email.html" class="btn m-t-0 btn-xs btn-default pull-right">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </li>

                                            <!-- START Scroll Inside Panel -->
                                            <li class="list-group-item b-a-0 p-x-0 p-y-0 b-t-0">
                                                <div class="scroll-200 custom-scrollbar">

                                                    <a href="../apps/email-details.html" class="list-group-item b-r-0 b-t-0 b-l-0">
                                                        <div class="media">
                                                            <div class="media-left media-middle">
                                                                <div class="avatar">
                                                                    <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/bertboerland/128.jpg" alt="Avatar">
                                                                    <i class="avatar-status avatar-status-bottom bg-danger b-gray-darker"></i>
                                                                </div>
                                                            </div>
                                                            <div class="media-body media-auto">
                                                                <h5 class="m-b-0 m-t-0">
                                                                    <span>Mortimer Mante</span>
                                                                    <small><span>03:21</span></small>
                                                                </h5>
                                                                <p class="m-t-0 m-b-0">
                                                                    <span>Ut quis accusantium est illum sapiente non impedit necessitatibus.</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                            <!-- END Scroll Inside Panel -->

                                            <li class="list-group-item b-a-0 p-x-0 b-b-0 p-y-0 r-a-0">
                                                <a class="list-group-item text-center b-b-0 b-r-0 b-l-0 b-r-b-r-0 b-r-b-l-0" href="#">
                                                    See All Messages <i class="fa fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <!-- END Messages Dropdown Menu -->
                        </li>

                        @if(Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle user-dropdown" data-toggle="dropdown" href="#" role="button">
                                <span class="m-r-1">{{ Auth::user()->name }}</span>
                                <div class="avatar avatar-image avatar-sm avatar-inline">
                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/craighenneberry/128.jpg">
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">
                                    <small class="text-uppercase"><strong>Account</strong></small>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="../apps/profile-details.html">
                                        <i class="fa fa-user fa-fw text-gray-dark m-r-1"></i>
                                        Your Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="../apps/profile-edit.html">
                                        <i class="fa fa-gear fa-fw text-gray-dark m-r-1"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="../apps/faq.html">
                                        <i class="fa fa-file fa-fw text-gray-dark m-r-1"></i>
                                        Faq
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="../pages/login.html">
                                        <i class="fa fa-sign-out fa-fw text-gray-dark m-r-1"></i>
                                        Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <!-- END Right Side Navbar -->
                </div>
            </div>
        </div>
        <!-- END Navbar -->
        <!-- START Sidebars -->
        <aside class="navbar-default sidebar">
            <div class="sidebar-overlay-head">
                <img src="/assets/images/logo-warning-white@2x.png" alt="Logo" width="80">
                <a href="#" class="sidebar-switch action-sidebar-close">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="sidebar-content">
                <div class="add-on-container">
                    <!-- START Sidebar Header -->
                    <div class="sidebar-container-default sidebar-section">
                        @if(Auth::check())
                        <div class="media">
                            <div class="media-left media-top">
                                <div class="avatar avatar-image avatar-inline">
                                    <img src="/assets/images/avatars/avatar-34.jpg" alt="Avatar">
                                    <i class="avatar-status bg-success avatar-status-bottom b-sidebar-status"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading m-t-0 text-white m-b-0"><span>{{ Auth::user()->name }}</span></h5>
                                <small>Administrator</small>
                                <div class="progress h-3 m-t-1 m-b-0">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%">
                                        <span class="sr-only">34% Complete</span>
                                    </div>
                                </div>

                                <!-- START Usage & Gear Icon -->
                                <div class="media m-t-1">
                                    <div class="media-body media-middle">
                                        <small class="text-left">34 / 100 Comics</small>
                                    </div>
                                </div>
                                <!-- END Usage & Gear Icon -->
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- END Sidebar Header -->

                </div>

                <div class="sidebar-default-visible small text-uppercase sidebar-section m-t-3 m-b-2">
                    <strong>
                        Navigation
                    </strong>
                </div>

                <!-- START Tree Sidebar Common -->
                <ul class="side-menu">
                    <li class="">
                        <a href="{{ route('dashboard.index') }}">
                            <i class="fa fa-home fa-lg"></i><span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <!-- Publishers -->
                    <li>
                        <a href="#" title="Publisher">
                            <i class="fa fa-newspaper-o fa-lg"></i><span class="nav-label">Publishers</span><i class="fa arrow"></i>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ route('publishers.index') }}">
                                    <span class="nav-label">Publishers List</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('publishers.create') }}">
                                    <span class="nav-label">Create Publisher</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Volumes -->
                    <li>
                        <a href="#" title="Volumes">
                            <i class="fa fa-cubes fa-lg"></i><span class="nav-label">Volumes</span><i class="fa arrow"></i>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ route('volumes.index') }}">
                                    <span class="nav-label">Volumes List</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('volumes.create') }}">
                                    <span class="nav-label">Create Volume</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Issue -->
                    <li>
                        <a href="#" title="Issues">
                            <i class="fa fa-file fa-lg"></i><span class="nav-label">Issues</span><i class="fa arrow"></i>
                        </a>
                        <ul>
                            <li class="">
                                <a href="{{ route('issues.index') }}">
                                    <span class="nav-label">Issues List</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('issues.create') }}">
                                    <span class="nav-label">Create Issue</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- END Sidebars -->

    </nav>

    <div class="content">
        @yield('content')
    </div>
</div>

<link rel="stylesheet" href="/assets/vendor/css/lib.min.css">
<link rel="stylesheet" href="/css/custom.css">

<!-- JS -->
<script src="/assets/javascript/app/helpers.js"></script>
<script src="/assets/javascript/app/layoutControl.js"></script>
<script src="/assets/javascript/app/rightSidebar.js"></script>
<script src="/assets/javascript/app/sidebar.js"></script>
<script src="/assets/javascript/app/main.js"></script>
<script src="/assets/javascript/plugins-init.js"></script>
<script src="/assets/javascript/holder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.6/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.1/vue-resource.min.js"></script>
@yield('javascript')
<script>
    $(".select2-container").css('width', '');
</script>

</body>

</html>
