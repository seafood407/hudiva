
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
                  Daftar Lokasi
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
        <th>Nama lokasi</th>
        <th>Status</th>
        <th class="d-flex justify-content-center">action</th>
    </tr>
    </thead> 
    <tbody>
      @foreach ($data as $lokasi)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $lokasi->nama_lokasi }}
        </td>
        <td>{{ $lokasi->status }}</td>
        <td class="d-flex justify-content-center">
          <a href="/dashboard/verifikasi-lokasi/{{ $lokasi->id }}" class="btn btn-sm bg-info">
            <i class="fas fa-eye"></i>
          </a>
          @can('admin')
          <a href="/dashboard/verifikasi-lokasi/{{ $lokasi->id }}/edit" class="btn btn-sm bg-warning mx-2">
            <i class="fas fa-edit"></i> 
          </a> 
        </a>
         
              @endcan
          @can('admin_dispar')
          <a href="/dashboard/verifikasi-lokasi/{{ $lokasi->id }}/edit" class="btn btn-sm bg-warning mx-2">
            <i class="fas fa-edit"></i> 
          </a> 
          </a>
    
          @endcan

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
          </section>
          <!-- /.Left col -->
          

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
