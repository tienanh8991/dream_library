<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('master.title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <style>
        .content {
            font-family: 'Overpass', sans-serif;
            margin-left: 15px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="https://png.pngtree.com/template/20190904/ourlarge/pngtree-cloud-library-logo-image_301705.jpg"
                 alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light" style="color: chocolate">DREAM LIBRARY</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            @if(\Illuminate\Support\Facades\Auth::user())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @if(auth()->user()->avatar !== null)
                        <div class="image">
                            <img
                                src="{{asset('storage/'. auth()->user()->avatar)}}"
                                class="brand-image img-circle elevation-3"
                                alt="User Image" width="100" height="100">
                        </div>
                    @else
                        <div class="image">
                            <img
                                src="{{asset('img/admin_img.jpg')}}"
                                class="brand-image img-circle elevation-3"
                                alt="User Image" width="100" height="100">
                        </div>
                    @endif
                    <div class="info">
                        <a href="{{route('user.profile')}}" class="d-block"
                           style="color: green">{{auth()->user()->name}}</a>
                    </div>
                </div>
        @endif
        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{route('dashboard')}}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Role::ADMIN)
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon 	fas fa-user-alt"></i>
                                <p>
                                    Users
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav-treeview {{ (request()->is('users')) ? 'active' : '' }}
                                                    {{ (request()->is('users/create')) ? 'active' : '' }}">
                                <li class="nav-item">
                                    <a href="{{route('user.list')}}"
                                       class="nav-link {{ (request()->is('users')) ? 'text-blue' : '' }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('user.create')}}"
                                       class="nav-link {{ (request()->is('users/create')) ? 'text-blue' : '' }} ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Customers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav-treeview {{ (request()->is('customers')) ? 'active' : '' }}
                                                {{ (request()->is('customers/create')) ? 'active' : '' }}">
                            <li class="nav-item">
                                <a href="{{route('customer.list')}}"
                                   class="nav-link {{ (request()->is('customers')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('customer.create')}}"
                                   class="nav-link {{ (request()->is('customers/create')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Role::ADMIN)
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Library
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav-treeview {{ (request()->is('libraries')) ? 'active' : '' }}
                                                    {{ (request()->is('libraries/create')) ? 'active' : '' }}">
                                <li class="nav-item">
                                    <a href="{{route('library.list')}}"
                                       class="nav-link {{ (request()->is('libraries')) ? 'text-blue' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('library.create')}}"
                                       class="nav-link {{ (request()->is('libraries/create')) ? 'text-blue' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Books
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav-treeview {{ (request()->is('books')) ? 'active' : '' }}
                                                {{ (request()->is('books/create')) ? 'active' : '' }}">
                            <li class="nav-item">
                                <a href="{{route('book.list')}}"
                                   class="nav-link {{ (request()->is('books')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('book.create')}}"
                                   class="nav-link {{ (request()->is('books/create')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Http\Role::ADMIN)
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon 	fas fa-file-alt"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav-treeview {{ (request()->is('categories')) ? 'active' : '' }}
                                                    {{ (request()->is('categories/create')) ? 'active' : '' }}">
                                <li class="nav-item">
                                    <a href="{{route('category.list')}}"
                                       class="nav-link {{ (request()->is('categories')) ? 'text-blue' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category.create')}}"
                                       class="nav-link {{ (request()->is('categories/create')) ? 'text-blue' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon 	fas fa-clipboard"></i>
                            <p>
                                Borrows
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav-treeview
                                {{ (request()->is('borrows')) ? 'active' : '' }}
                                {{ (request()->is('borrows/create')) ? 'active' : '' }}
                                {{ (request()->is('borrows/return')) ? 'active' : '' }}">
                            <li class="nav-item">
                                <a href="{{route('borrow.list')}}"
                                   class="nav-link {{ (request()->is('borrows')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> List</p>
                                </a>
                            </li>
                            @if(auth()->user()->role !== \App\Http\Role::ADMIN)
                                <li class="nav-item" disabled="disable">
                                    <a href="{{route('borrow.create')}}"
                                       class="nav-link {{ (request()->is('borrows/create')) ? 'text-blue' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New Borrow</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{route('borrow.return.list')}}"
                                   class="nav-link {{ (request()->is('borrows/return')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Borrow Return</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">EXAMPLES</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-exclamation-circle"></i>
                            <p>
                                Utilities
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav-treeview {{ (request()->is('users/profile')) ? 'active' : '' }}">
                            <li class="nav-item">
                                <a href="{{route('user.profile')}}" class="nav-link {{ (request()->is('users/profile')) ? 'text-blue' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('logout')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content">
        @yield('master.content')
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; COVID-2019 <a href="http://adminlte.io">Tiến Đệ</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> x.0.x
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('dist/js/My.js')}}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>
</body>
</html>
