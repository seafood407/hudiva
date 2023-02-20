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
  

        <form action="/dashboard/daftar-lokasi" class="form-horizontal" method="post">
            @csrf
            <input type="hidden" value="Terverifikasi" name="status">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Lokasi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" placeholder="input nama lokasi" name="nama_lokasi" value="{{ old('nama_lokasi') }}">
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
                <input type="text" class="form-control @error('alamat_lokasi') is-invalid @enderror" placeholder="input alamat lokasi" name="alamat_lokasi" value="{{ old('alamat_lokasi') }}">
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
                <input type="text" class="form-control @error('depth') is-invalid @enderror" placeholder="input kedalaman lokasi" name="depth" value="{{ old('depth') }}">
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
                <input type="text" class="form-control @error('visibility') is-invalid @enderror" placeholder="input jarak pandang di bawah laut" name="visibility" value="{{ old('visibility') }}">
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
                <input type="text" class="form-control @error('coral_reef') is-invalid @enderror" placeholder="input jenis karang" name="coral_reef" value="{{ old('coral_reef') }}">
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
                <input type="text" class="form-control @error('creature') is-invalid @enderror" placeholder="input jenis biota laut" name="creature" value="{{ old('creature') }}">
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
                <input type="text" class="form-control @error('latitude') is-invalid @enderror" placeholder="input latitude" name="latitude" value="{{ old('latitude') }}">
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
                <input type="text" class="form-control @error('longitude') is-invalid @enderror" placeholder="input longitude" name="longitude" value="{{ old('longitude') }}">
                @error('longitude')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upload Foto Lokasi</label>
                <div class="custom-file col-sm-10">
                <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                
                <label class="custom-file-label" for="exampleInputFile">upload foto</label>
                
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Keterangan Foto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('nama_foto') is-invalid @enderror" placeholder="input keterangan foto" name="nama_foto" value="{{ old('nama_foto') }}">
                
            </div>
            </div> --}}

            <div class="row justify-content-center">
                <div class="col-4 mt-2">
                    <button type="submit" class="btn btn-block btn-info">Next untuk upload gambar</button>
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
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
        <script type="text/javascript">
            Dropzone.options.imageUpload = {
                maxFilesize         :       1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif"
            };
        </script>
    @endpush
@endsection

{{-- @section('javascript')
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
@endsection --}}