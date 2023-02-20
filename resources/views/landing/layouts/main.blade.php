<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Hudiva | {{ $title }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://kit.fontawesome.com/8e676e07ec.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


        {{-- leaflet css --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
        crossorigin=""/>
        {{-- leaflet js --}}
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
        crossorigin=""></script>
        <link rel="stylesheet" href="{{ asset('js/leaflet-panel-layers-master/src/leaflet-panel-layers.css') }}" />
        <script src="{{ asset('js/leaflet-panel-layers-master/src/leaflet-panel-layers.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('js/Leaflet.markercluster-master/dist/MarkerCluster.css') }}" />
        <link rel="stylesheet" href="{{ asset('js/Leaflet.markercluster-master/dist/MarkerCluster.Default.css') }}" />
        <script src="{{ asset('js/Leaflet.markercluster-master/dist/leaflet.markercluster-src.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('js/L.Control.ZoomBar-master/src/L.Control.ZoomBar.css') }}"/>
        <script type="text/javascript" src="{{ asset('js/L.Control.ZoomBar-master/src/L.Control.ZoomBar.js') }}"></script>
        <script src="https://unpkg.com/leaflet-responsive-popup@1.0.0/leaflet.responsive.popup.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-responsive-popup@1.0.0/leaflet.responsive.popup.css" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">Hulondalo Dive Area</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-md-1"><a class="nav-link py-3 px-0 px-md-3 rounded" href="/">Home</a></li>
                        <li class="nav-item mx-0 mx-md-1"><a class="nav-link py-3 px-0 px-md-3 rounded" href="/DaftarLokasi">Dive Site</a></li>
                        <li class="nav-item mx-0 mx-md-1"><a class="nav-link py-3 px-0 px-md-3 rounded" href="/PetaLokasi">Dive Map</a></li>
                        <li class="nav-item mx-0 mx-md-1"><a class="nav-link py-3 px-0 px-md-3 rounded" href="/About">About</a></li>
                        <li class="nav-item mx-0 mx-md-1"><a class="nav-link py-3 px-0 px-md-3 rounded" href="/Login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->

        @yield('header')

        <!-- Portfolio Section-->
        
        @yield('portfolio')
        @yield('content')

        
        <!-- Footer-->
        <footer class="footer">
            <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Hulondalo Dive Area 2022</small></div>
        </div>
        </footer>
            
        <!-- Copyright Section-->
        
        <!-- Portfolio Modals-->

        @yield('portfolio_modal')
        @yield('galeri_modal')

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/leaflet.ajax.js') }}"></script>

    </body>
    @yield('leaflet')
    @yield('detailjs')
    @yield('javascript')
    
    

</html>
