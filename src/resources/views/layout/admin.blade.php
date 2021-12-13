<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap" rel="stylesheet" >

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    @include('sweetalert::alert')
    <div id="app">

    <body class="nav-md admin">
    <div class="container body admin" >
        <div class="main_container">
            <div id="dashboard" class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <!-- <img src="{{ asset('img/logo4.png') }}" style="margin: -25px 0 0 10px; width: 180px"> -->
                </div>

                <div class="clearfix"></div>

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <ul class="nav side-menu">
                    <li><a><i class="fa fa-building"></i> Venue <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="{{url('list/venue')}}">Daftar Venue</a></li>
                        <li><a href="{{url('list/venue/product')}}">Daftar Produk atau Paket</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-leaf"></i> Decoration <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="{{url('list/decoration')}}">Daftar Decoration</a></li>
                        <li><a href="{{url('list/decoration/product')}}">Daftar Produk atau Paket</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-camera"></i> Photography <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="{{url('list/photography')}}">Daftar Photography</a></li>
                        <li><a href="{{url('list/photography/product')}}">Daftar Produk atau Paket</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cutlery"></i> Catering <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        <li><a href="{{url('list/catering')}}">Daftar Catering</a></li>
                        <li><a href="{{url('list/catering/product')}}">Daftar Produk atau Paket</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu" >
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav" >
                <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a style="color: white; text-decoration: none;" href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user admin"></i>Admin
                    </a>
                    <div style="margin: auto" class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="{{url('admin/list/venue')}}"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
                    </div>
                    </li>

                </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <main>
            @yield('content')
        </main>

        </div>
    </div>

    </div>
    @yield('scripts')
</body>
</html>
