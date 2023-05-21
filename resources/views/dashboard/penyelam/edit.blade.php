@extends('dashboard.layouts.main')


 
@section('content')
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <!-- Left col -->
        <section class="col-12 connectedSortable">
          <div class="card">
            <div class="card-header bg-info">
              <h3 class="card-title">
                <i class="fas fa-user-pen mr-1 pt-2"></i>
                Edit Data Penyelam
              </h3>
              <a href="/dashboard/users" class="btn btn-secondary float-right"><i class="fa-solid fa-arrow-left"></i></a>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
 
                {{-- --------------- disini isi konten ---------------- --}}
                
                <form action="/dashboard/users/{{ $data->id }}" class="form-horizontal" method="post">
                    @method('put')
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" name="nama" value="{{ old('nama',$user[0]['nama']) }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value=null>- Pilih Jenis Kelamin -</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat Lengkap" name="alamat" value="{{ old('alamat',$user[0]['alamat']) }}"">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Telpon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('telpon') is-invalid @enderror" placeholder="Masukan Nomor Telepon" name="telpon" value="{{ old('telpon',$user[0]['telpon']) }}"">
                            @error('telpon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
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


                    {{-- ---------------------input foto dan lisensi------------------------- --}}
                    {{-- <div class="form-group">
                        <label for="name">Foto</label>
                        <input type="file" class="form-control" placeholder="Upload Foto">
                    </div>
                    <div class="form-group">
                        <label for="name">Lisensi/Sertifikat</label>
                        <input type="file" class="form-control" placeholder="Upload Berkas">
                    </div> --}}
                    {{-- ------------------------------------------------------ --}}

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username',$data['username']) }}">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-4 mt-2">
                            <button type="submit" class="btn btn-block btn-info">Simpan Data</button>
                        </div>
                    </div>
                    
                </form>
                

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
