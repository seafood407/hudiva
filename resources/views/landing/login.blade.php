@extends('landing.layouts.main')

@section('content')
    <section class="page-section">
        <div class="container mt-5">
            <!-- Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">silahkan login</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fa-solid fa-user fa-beat-fade" style="--fa-beat-fade-opacity: 0.67; --fa-beat-fade-scale: 1.075;"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-4">

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif

                <form action="/Login" method="post">
                    @csrf
                    <div class="form-group">
                <div class="form-group">
                    <label>
                    Username
                    </label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autofocus required value="{{ old('username') }}"/>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">      
                    <label>
                    Password
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Login Sebagai</label>
                    <select class="form-control" name="role" >
                    <option value="SuperAdmin">Super Admin</option>
                    <option value="Admin">Admin Dinas Pariwisata</option>
                    <option value="Penyelam">Penyelam</option>
                    </select>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-6">
                    <button type="submit" class="btn btn-primary p-2 text-dark">
                        <ion-icon name="log-in-outline"></ion-icon>
                          Login
                    </button>
                    <a href="/Register" class="btn btn-warning p-2">
                        <ion-icon name="person-add-outline"></ion-icon>
                          Daftar
                    </a>
                </div>
                </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </section>
@endsection