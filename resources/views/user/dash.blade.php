<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Posyandu') }}</title>
    <link rel="shortcut icon" href="{!! asset('dist/img/pos.png') !!}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset('bower_components/Ionicons/css/ionicons.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{!! asset('bower_components/jvectormap/jquery-jvectormap.css') !!}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{!! asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{!! asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('css')
</head>
<body class="hold-transition skin-bluelight sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

        <!-- Logo -->
        <a href="{{ route('admin') }}" class="logo" style="background-color: rgb(34, 116, 143)">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                {{-- <span class="logo-mini"><b>PonsyanduLohbener</b></span> --}}
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PosyanduLohbener</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" style="background-color: rgb(34, 116, 143);">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="{!! asset('dist/img/avatar2.png') !!}" class="user-image" alt="User Image">
                                <span class="hidden-xs">Administrator</span> -->
                                <p>{{Auth::user()->nama_ibu}} <i class="bi bi-box-arrow-right"></i></p>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{!! asset('dist/img/avatar2.png') !!}" class="img-circle" alt="User Image">
                                    <p>
                                        {{Auth::user()->nama_ibu}}
                                        <small>Administrator</small>
                                        <!-- <small>Member since Nov. 2012</small> -->
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('getProfile') }}" class="btn btn-default btn-flat"><span><i class="fa fa-user"></i></span> Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat"><span><i class="fa fa-power-off"></i></span> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar" style="background-color: rgb(34, 116, 143);">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{!! asset('dist/img/avatar2.png') !!}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Auth::user()->nama_ibu}}</p>
                        <a href="#">
                            <i class="fa fa-circle text-success"></i> 
                            @if (Auth::user()->level == 1 && Auth::user()->level == 2)
                                @if (Auth::user()->jabatan == 1)
                                    Ketua
                                @elseif (Auth::user()->jabatan == 2)
                                    Sekretaris
                                @elseif (Auth::user()->jabatan == 3)
                                    Bendahara
                                @else
                                    Anggota
                                @endif
                            @else
                                Online
                            @endif
                        </a>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree" >
                    <li class="header" style="color: white;">POSYANDU</li>
                    <li>
                        <a href="{{ url('admin') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li><a href="{{ route('ibu.index') }}"><i class="fa fa-circle-o"></i> Data Ibu</a></li>
                   
                    <li><a href="{{ route('ibuhamil.index') }}"><i class="fa fa-circle-o"></i> Data Ibu Hamil</a></li>
                    <li>
                            <a href="{{ route('timbang.index') }}">
                                <i class="fa fa-balance-scale"></i> <span>Hasil Timbang</span>
                            </a>
                    </li> 
                    <li>
                        <a href="{{ route('laporan.index') }}">
                            <i class="fa fa-file-text"></i> <span>Laporan</span>
                        </a>
                    </li>

                </ul>
                </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                @yield('breadcrumb')
                
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>

        </div>

        <footer class="main-footer">
            <strong>Sistem Informasi Posyandu Lohbener </strong>Kelurahan Lohbener
        </footer>
    </div>
    
    <!-- jQuery 3 -->
    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{!! asset('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- Sparkline -->
    <script src="{!! asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}"></script>
    <!-- jvectormap -->
    <script src="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
    <script src="{!! asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{!! asset('bower_components/jquery-knob/dist/jquery.knob.min.js') !!}"></script>
    <!-- daterangepicker -->
    <script src="{!! asset('bower_components/moment/min/moment.min.js') !!}"></script>
    <script src="{!! asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
    <!-- datepicker -->
    <script src="{!! asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{!! asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
    <!-- Slimscroll -->
    <script src="{!! asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
    <!-- FastClick -->
    <script src="{!! asset('bower_components/fastclick/lib/fastclick.js') !!}"></script>
    <!-- AdminLTE App -->
    <script src="{!! asset('dist/js/adminlte.min.js') !!}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{!! asset('dist/js/pages/dashboard.js') !!}"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{!! asset('dist/js/demo.js') !!}"></script> -->

    <script>
        /** tambah class active jika di klik */
        var url = window.location;
        // ini untuk menambahkan class active pada menu yg tidak memiliki anak atau single link
        $('ul.sidebar-menu a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
        // ini untuk menu beranak, jadi otomatis akan terbuka sesuai dengan link tujuan
        $('ul.treeview-menu a').filter(function() {
            return this.href == url;
        }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
    </script>

    @yield('java')
</body>
</html>