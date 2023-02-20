
@extends('landing.layouts.main')

@section('content')
    <section class="page-section">
        <div class="container mt-5">
            <!-- Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">peta lokasi diving gorontalo</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-map-location-dot fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- map Section Form-->
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-md-12 p-2">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="service-item">
                                    <div id="mapdetail"></div>
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
                                            <tr>
                                                <td>
                                                    Rating
                                                </td>
                                                <td>:</td>
                                                <td>
                                                    5
                                                </td>
                                            </tr>
                                            <tr>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Lihat Galeri
                                    </button>
                                </div>
                        </div>
                        <div class="col-xl-12 col-md-3 mt-5">
                            <div class="card">
                                @foreach ($ulasan as $u)    
                                <div class="card-body">
                                    <h5 class="card-title">{{ $u->nama }}</h5>
                                <p class="card-text">{{ $u->ulasan }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                            {{-- komen section --}}

                    <section class="page-section" id="contact">
                <div class="container">
                <!-- Contact Section Heading-->
                <h3 class="text-center text-uppercase text-secondary mb-0">Tinggalkan Komentar anda</h3>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-xl-7">

                        <form id="contactForm" action="/ulasan/{{ $data->id }}" method="post" >
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('nama') is-invalid @enderror" id="name" placeholder="Nama Lengkap" name="nama" type="text" value="{{ old('nama') }}">
                                <label for="name">Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email Anda" name="email" type="email" value="{{ old('email') }}">
                                <label for="email">Alamat Email</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control @error('ulasan') is-invalid @enderror" id="message" type="text" placeholder="Komentar" name="ulasan" style="height: 10rem">{{ old('ulasan') }}</textarea>
                                <label for="message">Komentar</label>
                                @error('ulasan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- rating --}}
                            <div class="form-floating mb-5">
                                <label for="rating" class="label"></label>
                                
                                <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                                </div>
                                
                            </div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary btn-lg" type="submit">Simpan Komentar</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>

                    {{-- akhir komen --}}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('galeri_modal')
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
                            <img class="d-block w-100" src="{{ asset('./images/'.$g['foto']) }}">
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




@section('leaflet')
    <script type="text/javascript">
        var map = L.map('mapdetail').setView([{{ $data["latitude"] }}, {{ $data["longitude"] }}], 15);
        var marker = L.marker([{{ $data["latitude"] }}, {{ $data["longitude"] }}]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png',{
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
    </script>
@endsection

