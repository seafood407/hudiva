@extends('landing.layouts.main')

@section('content')
<section class="page-section">
    <div class="container mt-5">
        {{-- awal konten --}}
        <div class="row">
            <div class="com-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lokasi Diving</th>
                        <th scope="col">Alamat Lokasi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="/DaftarLokasi/{{ $d->id }}" class="text-primary text-decoration-none">{{ $d->nama_lokasi }}</a></td>
                            <td>{{ $d["alamat_lokasi"] }}</td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div> 
        </div>
        {{-- akhir konten --}}
    </div>
</section>
@endsection