
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
    <a href="/dashboard/daftar-lokasi/create" class="btn btn-sm btn-info mb-2"><i class="fa-solid fa-user-plus mr-2"></i>Tambah Data</a>
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
          <a href="/dashboard/daftar-lokasi/{{ $lokasi->id }}" class="btn btn-sm bg-info">
            <i class="fas fa-eye"></i>
          </a>
          @can('admin')
          <a href="/dashboard/daftar-lokasi/{{ $lokasi->id }}/edit" class="btn btn-sm bg-warning mx-2">
            <i class="fas fa-edit"></i> 
          </a> 
        </a>
        <form action="/dashboard/daftar-lokasi/{{ $lokasi->id }}" method="post">
          @method('delete')
          @csrf
          <button class="btn btn-sm bg-danger" onclick="return confirm('anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
        </form> 
              @endcan
          @can('admin_dispar')
          <a href="/dashboard/daftar-lokasi/{{ $lokasi->id }}/edit" class="btn btn-sm bg-warning mx-2">
            <i class="fas fa-edit"></i> 
          </a> 
          </a>
          <form action="/dashboard/daftar-lokasi/{{ $lokasi->id }}" method="post">
            @method('delete')
            @csrf
            <button class="btn btn-sm bg-danger" onclick="return confirm('anda yakin ingin menghapus data?')"><i class="fas fa-trash"></i></button>
            </form>
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
