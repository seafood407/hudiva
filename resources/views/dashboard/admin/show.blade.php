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
                Informasi Detail User
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
                              {{$user['nama'] }}
                            </dd>
                            <dt>
                              Jenis Kelamin
                            </dt>
                            <dd>
                              {{ $user['jenis_kelamin'] }}
                            </dd>
                            <dt>
                              Alamat
                            </dt>
                            <dd> 
                              {{ $user['alamat'] }}
                            </dd>
                            <dt>
                              Nomor Telpon
                            </dt>
                            <dd>
                              {{ $user['telpon'] }}
                            </dd>
                          </dl>
                        </div>
                        <div class="col-md-4">
                          @if ($user['foto'])
                          <img class="rounded mx-auto d-blok" src="{{ asset('storage/'.$user['foto']) }}" style="width:300px; heigt:400px;"/> 
                          @else
                          <img class="rounded mx-auto d-blok" src="https://source.unsplash.com/300x400/?selfie" /> 
                          @endif
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
