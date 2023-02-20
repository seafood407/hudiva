@extends('dashboard.layouts.main')

@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <!-- Left col -->
        <section class="col-12 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user mr-1"></i>
                Informasi Detail Penyelam
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">

                {{-- --------------- disini isi konten ---------------- --}}
                
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-8">
                          <dl>
                            <dt>
                              Nama Lengkap
                            </dt>
                            <dd>
                              {{ $user[0]['nama'] }}
                            </dd>
                            <dt>
                              Jenis Kelamin
                            </dt>
                            <dd>
                              {{ $user[0]['jenis_kelamin'] }}
                            </dd>
                            <dt>
                              Alamat
                            </dt>
                            <dd>
                              {{ $user[0]['alamat'] }}
                            </dd>
                            <dt>
                              Nomor Telpon
                            </dt>
                            <dd>
                              {{ $user[0]['telpon'] }}
                            </dd>
                            <dt>
                              Status User
                            </dt>
                            <dd>
                              {{ $user[0]['status'] }}
                            </dd>
                          </dl>
                        </div>
                        <div class="col-md-4">
                          @if ($user[0]['foto'])
                          <img class="rounded mx-auto d-blok" style="width:300px; heigth:400px;" src="{{ asset('storage/'.$user[0]['foto']) }}" /> 
                          @else
                          <img class="rounded mx-auto d-blok" src="https://source.unsplash.com/300x400/?selfie" /> 
                          @endif
                          <button type="button" class="btn btn-block btn-sm btn-outline-primary mt-3" data-toggle="modal" data-target="#lisensi">
                            Lihat Lisensi
                          </button> 
                          {{-- <button type="button" class="btn btn-block btn-sm btn-success">
                            Verivikasi
                          </button>  --}}
                        </div>
                      </div> 
                      <a href="/dashboard/users" class="btn btn-block btn-secondary btn-sm mt-3">
                        Kembali
                      </a>
                    </div>
                  </div>
                </div>
                

                {{-- ---------- akhir konten ----------- --}}
                
                </div>
            </div><!-- /.card-body -->
            </div>
        </section>
    <!-- /.content -->
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->

   
@endsection

@section('lisensi')
<div class="modal fade" id="lisensi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="container-fluid mx-auto">
          @if ($user[0]['lisensi'])
          <img class="rounded mx-auto d-blok" style="width:1100px;" src="{{ asset('storage/'.$user[0]['lisensi']) }}" /> 
          @else
          <img class="rounded mx-auto d-blok" src="https://source.unsplash.com/300x400/?selfie" /> 
          @endif
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection