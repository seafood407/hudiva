<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Lokasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.home', [
            "title" => "Home"
        ]);
    }

    public function about()
    {
        return view('landing.about', [
            "title" => "About"
        ]);
    }

    public function lokasi()
    {
        return view('landing.daftar', [
            "title" => "Daftar Lokasi",
            "data" => Lokasi::all()
        ]);
    }

    public function peta()
    {

        $data = Lokasi::all();
        return view('landing.peta', [
            "title" => "Peta Lokasi",
            "data" => $data
        ]);
    }

    public function login()
    {
        return view('landing.login', [
            "title" => "Login"
        ]);
    }

    
    public function detail($id)
    {
        $data = Lokasi::all();
        $ulasan = Ulasan::all()->where('lokasi_id', $id);
        $galeri = Galeri::where('lokasi_id', $id)->get();
        
        
        
        return view('landing.detail', [
            "title" => "detail lokasi",
            "data" => $data->firstWhere('id', $id),
            "ulasan" => $ulasan,
            "galeri" => $galeri
        ]);
    }

    public function store(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:ulasans',
            'rating' => 'required',
            'ulasan' => 'required',
        ]);

        Ulasan::create([
            'lokasi_id' => $id,
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'rating' => $validatedData['rating'],
            'ulasan' => $validatedData['ulasan']
        ]);

        return Redirect::back();


    }
    

}
