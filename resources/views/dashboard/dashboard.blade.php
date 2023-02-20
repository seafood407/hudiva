
@extends('dashboard.layouts.main')


@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  {{ count($user) }}
                </h3>

                <p>Data User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  {{ count($lokasi)}}
                </h3>

                <p>Data Lokasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>3</h3>

                <p>Data Penyelam</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Data Galeri</p>
              </div>
              <div class="icon">
                <i class="ion ion-images"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-map mr-1"></i>
                  Dive Location
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

  {{-- --------------- disini isi peta ---------------- --}}

                  <div id="mapid"></div>

  {{-- --------------------- --}}
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->



          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('leafletjs')
  <script type="text/javascript">
      var map = L.map('mapid').setView([0.7005746, 122.3539113], 9.58);
      var layerbase = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 9,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          })

      map.addLayer(layerbase);
          
      // marker
      
      var markers = L.markerClusterGroup();
        
        @foreach($lokasi as $lokasi)
        var marker = L.marker([{{ $lokasi->latitude }}, {{ $lokasi->longitude }}])
            .bindPopup("Nama Lokasi : {{ $lokasi->nama_lokasi }}<br>Alamat Lokasi : {{ $lokasi->alamat_lokasi }}<br>kedalamatan : {{ $lokasi->depth }}<br>Jarak Pandang : {{ $lokasi->visibility }}");
        markers.addLayer(marker);
        @endforeach
        
        map.addLayer(markers);


      // var marker = L.marker([0.417517, 121.947978]).addTo(map);
      // var marker = L.marker([0.408011, 122.043014]).addTo(map);
      // var marker = L.marker([0.407033, 122.044794]).addTo(map);
      // var marker = L.marker([0.407636, 122.047411]).addTo(map);
      // var marker = L.marker([0.408133, 122.049567]).addTo(map);
      // var marker = L.marker([0.407728, 122.058669]).addTo(map);
      // var marker = L.marker([0.391333, 122.080106]).addTo(map);
      // var marker = L.marker([0.395036, 122.074683]).addTo(map);
      // var marker = L.marker([0.418069, 121.953364]).addTo(map);
      // var marker = L.marker([0.417608, 121.955881]).addTo(map);
      // var marker = L.marker([0.416892, 121.955947]).addTo(map);
      // var marker = L.marker([0.413558, 121.953108]).addTo(map);

  </script>
@endsection