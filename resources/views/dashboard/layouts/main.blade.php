<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hudiva | {{ $title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- leaflet css  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
  integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
  crossorigin=""/>

     <!-- leaflet js -->
     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
  integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
  crossorigin=""></script>
    <link rel="stylesheet" href="{{ asset('js/Leaflet.markercluster-master/dist/MarkerCluster.css') }}" />
    <link rel="stylesheet" href="{{ asset('js/Leaflet.markercluster-master/dist/MarkerCluster.Default.css') }}" />
    <script src="{{ asset('js/Leaflet.markercluster-master/dist/leaflet.markercluster-src.js') }}"></script>

  {{-- custom css --}}
  <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
  {{-- font-awsome cdn --}}
  <script src="https://kit.fontawesome.com/8e676e07ec.js" crossorigin="anonymous"></script>

  @stack('css')

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
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Login as : {{ auth()->user()->role  }}</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            {{-- <li><a href="/dashboard/profil" class="dropdown-item"><i class="fa-solid fa-user-gear pr-2"></i>Profile </a></li> --}}
            <li>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket pr-2"></i>  Logout </button>
              </form>
            </li>
      </ul>
    </nav> 
    <!-- /.navbar -->



   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/logodispar.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Hudiva</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user-profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ "/dashboard" }}" class="nav-link {{ Request::is('/dashboard') ? 'is-active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          @can('admin')
            <li class="nav-item">
              <a href="{{ "/dashboard/users" }}" class="nav-link {{ Request::is('/dashboard/users') ? 'is-active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ "/dashboard/daftar-lokasi" }}" class="nav-link {{ Request::is('/dashboard/daftar-lokasi') ? 'is-active' : '' }}">
                <i class="fas fa-map nav-icon"></i>
                <p>Lokasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-check"></i>
                <p>
                  Verifikasi
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ "/dashboard/verifikasi-penyelam" }}" class="nav-link {{ Request::is('/dashboard/verifikasi-penyelam') ? 'active' : '' }}">
                    <i class="far fa-user nav-icon"></i>
                    <p>Penyelam</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ "/dashboard/verifikasi-lokasi" }}" class="nav-link {{ Request::is('/dashboard/verifikasi-lokasi') ? 'active' : '' }}">
                    <i class="far fa-map nav-icon"></i>
                    <p>Lokasi</p>
                  </a>
                </li>
              </ul>
            </li>
          @endcan
          @can('penyelam')
          <li class="nav-item">
            <a href="{{ "/dashboard/daftar-lokasi" }}" class="nav-link {{ Request::is('/dashboard/daftar-lokasi') ? 'is-active' : '' }}">
              <i class="fas fa-map nav-icon"></i>
              <p>Lokasi</p>
            </a>
          </li>
          @endcan
          @can('admin_dispar')
          {{-- <li class="nav-item">
            <a href="{{ "/dashboard/daftar-lokasi" }}" class="nav-link {{ Request::is('/dashboard/daftar-lokasi') ? 'is-active' : '' }}">
              <i class="fas fa-map nav-icon"></i>
              <p>Lokasi</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Verifikasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ "/dashboard/verifikasi-penyelam" }}" class="nav-link {{ Request::is('/dashboard/verifikasi-penyelam') ? 'active' : '' }}">
                  {{-- <a href="{{ "/dashboard/users" }}" class="nav-link {{ Request::is('/dashboard/daftar-lokasi') ? 'is-active' : '' }}"> --}}
                  <i class="far fa-user nav-icon"></i>
                  <p>Penyelam</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ "/dashboard/verifikasi-lokasi" }}" class="nav-link {{ Request::is('/dashboard/verifikasi-lokasi') ? 'active' : '' }}">
                  {{-- <a href="{{ "/dashboard/daftar-lokasi" }}" class="nav-link {{ Request::is('/dashboard/daftar-lokasi') ? 'is-active' : '' }}"> --}}
                  <i class="far fa-map nav-icon"></i>
                  <p>Lokasi</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $page }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $page }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

  @yield('content')
 
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Dinas Pariwisata Provinsi Gorontalo
    <div class="float-right d-none d-sm-inline-block">
      <b>Powered By</b> MIA.Dev
    </div>
  </footer>
  @yield('lisensi')
  @yield('galeri')


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
@stack('js')

</body>
@yield('leafletjs')
@yield('javascript')
</html>
