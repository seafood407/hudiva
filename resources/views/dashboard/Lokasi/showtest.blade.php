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
                  Tambahkan Gambar
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">

  {{-- --------------- disini isi konten ---------------- --}}
  

    <div class="row">
        <form method="post" action="{{url('image/upload/'.$lokasi->id.'/store')}}" enctype="multipart/form-data" class="dropzone col-md-12" id="dropzone">
        @csrf
        </form>
        
        <a href="{{ url('image/'.$lokasi->id.'/imgdelete') }}" class="btn btn-danger col-md-12 mt-3">Hapus Semua</a> 
        <a href="{{ "/dashboard/daftar-lokasi" }}" class="btn btn-secondary col-md-12 mt-3">Kembali ke daftar lokasi</a>         
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
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    @endpush
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
        <script type="text/javascript">
            Dropzone.options.imageUpload = {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response){
                    return false;
                }
            };
        </script>
    @endpush
@endsection