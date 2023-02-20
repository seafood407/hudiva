<?php
 
namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;

class VerifikasiLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.ver-lokasi.index',[
            "title" => "Verifikasi Lokasi",
            "nama" => $login->nama,
            "page" => "Verifikasi Lokasi",
            "data" => Lokasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($verifikasi_lokasi)
    {
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        $lokasi = Lokasi::where('id', $verifikasi_lokasi)->first();
        $galeri = Galeri::where('lokasi_id', $verifikasi_lokasi)->get();
        
        return view('dashboard.ver-lokasi.show',[
            "title" => "Detail Lokasi",
            "nama" => $login->nama,
            "page" => "Halaman Detail",
            "data" => $lokasi,
            "galeri" => $galeri
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $verifikasi_lokasi)
    {
        $lokasi = Lokasi::where('id', $verifikasi_lokasi->id)->first();
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.ver-lokasi.edit',[
            "title" => "Edit Lokasi",
            "nama" => $login->nama,
            "page" => "Edit User",
            "data" => $lokasi,
            "lokasi" => $verifikasi_lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verifikasi_lokasi)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);

        Lokasi::where('id', $verifikasi_lokasi)
                ->update($validatedData);
        return redirect('/dashboard/verifikasi-lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
