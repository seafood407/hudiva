@extends('dashboard.layouts.main')

@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Left col -->
          <section class="col-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-map mr-1"></i>
                  Tambah Lokasi Baru
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

  {{-- --------------- disini isi konten ---------------- --}}
  

        <form action="/dashboard/daftar-lokasi/{{ $data->id }}" class="form-horizontal" method="post">
            @method('put')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" placeholder="input nama lokasi" name="nama_lokasi" value="{{ old('nama_lokasi',$lokasi['nama_lokasi']) }}">
                @error('nama_lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('alamat_lokasi') is-invalid @enderror" placeholder="input alamat lokasi" name="alamat_lokasi" value="{{ old('alamat_lokasi',$lokasi['alamat_lokasi']) }}">
                @error('alamat_lokasi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kedalaman lokasi / Depth</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('depth') is-invalid @enderror" placeholder="input kedalaman lokasi" name="depth" value="{{ old('depth',$lokasi['depth']) }}">
                @error('depth')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jarak Pandang / Visibility</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('visibility') is-invalid @enderror" placeholder="input jarak pandang di bawah laut" name="visibility" value="{{ old('visibility',$lokasi['visibility']) }}">
                @error('visibility')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Karang / Coral Reef</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('coral_reef') is-invalid @enderror" placeholder="input jenis karang" name="coral_reef" value="{{ old('coral_reef',$lokasi['coral_reef']) }}">
                @error('coral_reef')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Biota Laut / Reef Fish and Creature</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('creature') is-invalid @enderror" placeholder="input jenis biota laut" name="creature" value="{{ old('creature',$lokasi['creature']) }}">
                @error('creature')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Garis Lintang / Latitude</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('latitude') is-invalid @enderror" placeholder="input latitude" name="latitude" value="{{ old('latitude',$lokasi['latitude']) }}">
                @error('creature')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Garis Bujur / Longitude</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="input longitude" name="longitude" value="{{ old('longitude',$lokasi['longitude']) }}">
                @error('longitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            
            {{-- ---------------------input foto------------------------- --}}
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Foto Lokasi</label>
            <div class="col-sm-10">
                <input type="file" class="form-control @error('longitude') is-invalid @enderror" placeholder="input longitude" name="longitude" value="{{ old('longitude') }}">
                @error('longitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div> --}}

            {{-- ------------------------------------------------------ --}}

            <div class="form-group row">
                <label for="Status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                <select name="status" class="form-control">
                    <option value="Belum Diverifikasi">Belum Diverifikasi</option>
                    <option value="Sudah Diverifikasi">Sudah Diverifikasi</option>
                </select>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-4 mt-2">
                    <button type="submit" class="btn btn-block btn-info">Edit Data Lokasi</button>
                </div>
            </div>
            
        </form>
  

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