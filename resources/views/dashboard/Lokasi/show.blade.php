@extends('dashboard.layouts.main')

@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-map mr-1"></i>
                  Detail Lokasi
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

  {{-- --------------- disini isi konten ---------------- --}}
  

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="service-item">
                        <div id="mapdetail" style="height: 550px; z-index: 100;"></div>
                    </div>  
                </div>
                <div class="col-md-4">
                    <h3 class="text-center text-secondary">Informasi Detail</h3>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    Dive Site
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->nama_lokasi }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Location
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->alamat_lokasi }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kedalaman
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->depth }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jarak Pandang
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->visibility }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Karang
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->coral_reef }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jenis Biota Laut
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->creature }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Latitude dan Longitude
                                </td>
                                <td>:</td>
                                <td>
                                    {{ $data->latitude }} - {{ $data->longitude }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Lihat Galeri
                    </button>
                </div>
            </div>
            <a href="/dashboard/verifikasi-lokasi" class="btn btn-block btn-secondary btn-sm mt-3">
                Kembali
            </a>
        </div>
    </div>
  

  {{-- ---------- akhir konten ----------- --}}
                </div>
              </div><!-- /.card-body -->
            </div>
          </section>
          <!-- /.Left col -->
          

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection


@section('galeri')
     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- {{ $galeri->first()->id }} --}}
            <!-- Carousel markup: https://getbootstrap.com/docs/4.4/components/carousel/ -->
            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($galeri as $g)
                  {{-- <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('./images/'.$g['foto']) }}">
                </div> --}}
                        <div class="carousel-item {{ $galeri->first()->id == $g['id'] ? 'active' : ' ' }}">
                            {{-- <img class="d-block w-100" src="{{ asset('assets/img/portfolio/diving2.jpg') }}"> --}}
                            <img class="d-block w-100" src="{{ asset('./images/divesite/'.$g['foto']) }}">
                        </div>
                    @endforeach
                  {{-- <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/img/portfolio/diving2.jpg') }}">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/portfolio/diving3.jpg') }}">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/portfolio/diving4.jpg') }}">
                  </div> --}}
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
      
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    
@endsection

@section('javascript')
    <script>
        jQuery(document).ready(function($){
    
            $(".btnrating").on('click',(function(e) {
            
            var previous_value = $("#selected_rating").val();
            
            var selected_value = $(this).attr("data-attr");
            $("#selected_rating").val(selected_value);
            
            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);
            
            for (i = 1; i <= selected_value; ++i) {
            $("#rating-star-"+i).toggleClass('btn-warning');
            $("#rating-star-"+i).toggleClass('btn-default');
            }
            
            for (ix = 1; ix <= previous_value; ++ix) {
            $("#rating-star-"+ix).toggleClass('btn-warning');
            $("#rating-star-"+ix).toggleClass('btn-default');
            }
            
            }));    
    });
    </script>
@endsection

@section('leafletjs')

    <script type="text/javascript">
        var map = L.map('mapdetail').setView([{{ $data["latitude"] }}, {{ $data["longitude"] }}], 15);
        var marker = L.marker([{{ $data["latitude"] }}, {{ $data["longitude"] }}]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>

@endsection