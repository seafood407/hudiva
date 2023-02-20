@extends('landing.layouts.main')

@section('content')
    <div class="page-section">
        <div class="container-fluid mt-5">
            <!-- Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">harap masukan data yang benar</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><ion-icon name="document-text"></ion-icon></div>
                <div class="divider-custom-line"></div>
            </div>
            <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
                <h4 class="text-center font-weight-bold"> Daftar Sebagai Penyelam </h4>

            <form action="/Register" class="form-container" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="Penyelam" name="role">
                <input type="hidden" value="Belum Diverifikasi" name="status">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Namat" value="{{ old('alamat') }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telpon">No. Telpon</label>
                    <input type="text" class="form-control @error('telpon') is-invalid @enderror" name="telpon" placeholder="Masukkan Nomor Telpon" value="{{ old('telpon') }}">
                    @error('telpon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> 
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" placeholder="Upload Foto">
                </div>
                <div class="form-group">
                    <label for="lisensi">Lisensi/Sertifikat</label>
                    <input type="file" class="form-control" name="lisensi" placeholder="Upload Berkas">
                </div>
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukkan username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror 
                </div>
                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row justify-content-center">
                    <div class="col-4 mt-2">
                        <button type="submit" class="btn btn-lg btn-primary">Register</button>
                    </div>
                </div>
                
            </form>
        </section>
        </section>

        </div>
    </div>
@endsection