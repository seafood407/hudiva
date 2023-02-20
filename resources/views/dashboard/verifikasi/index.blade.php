
@extends('dashboard.layouts.main')



@section('content')
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Left col -->
          

          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">
                <i class="fas fa-users mr-1"></i>
                Daftar Penyelam
              </h3>
            </div><!-- /.card-header -->
            
            <div class="card-body">
              <div class="tab-content p-0">

                  {{-- --------------- disini isi konten ---------------- --}}
                      <div class="card-body">
                        
                        <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th> 
                            <th>status</th>
                            <th style="width: 80px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($diver as $d)
                          
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $d->nama }}</td>
                              <td>{{ $d->user->role }}</td>
                              <td>{{ $d->status }}</td>
                              <td class="d-flex justify-content-center">
                                <a href="/dashboard/verifikasi-penyelam/{{ $d->user->id }}" class="btn btn-sm bg-info">
                                    <i class="fas fa-eye"></i>
                                  </a>
                                <a href="/dashboard/verifikasi-penyelam/{{ $d->user->id }}/edit" class="btn btn-sm bg-info mx-2">
                                  <i class="fas fa-edit"></i> 
                                </a>
                                {{-- <form action="/dashboard/verifikasi-penyelam/{{ $d->user->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm bg-danger" onclick="return confirm('anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
                                </form> --}}
                              </td>
                          </tr>

                          @endforeach
                        </tbody>
                        </table>
                      </div>

                  {{-- ---------- akhir konten ----------- --}}
              </div>
            </div><!-- /.card-body -->
          </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
