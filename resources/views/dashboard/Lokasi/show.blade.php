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
                <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#gallerymodal">
                    Lihat Galeri
                </button>
                </div>
            </div>
            <a href="/dashboard/daftar-lokasi" class="btn btn-block btn-secondary btn-sm mt-3">
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