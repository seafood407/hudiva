<?php

namespace App\Http\Controllers;
 
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;

class DashboardLokasiController extends Controller
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
        return view('dashboard.lokasi.index',[
            "title" => "Daftar Lokasi",
            "nama" => $login->nama,
            "page" => "Lokasi",
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
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.lokasi.create',[
            "title" => "Tambah Lokasi Diving",
            "nama" => $login->nama,
            "page" => "Lokasi Diving"
        ]);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required',
            'alamat_lokasi' => 'required',
            'depth' => 'required',
            'visibility' => 'required',
            'coral_reef' => 'required',
            'creature' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required'
        ]);
        
        $lokasi = Lokasi::create($validatedData);
        
        return redirect('/dashboard/'.$lokasi->id.'/showtest');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $daftar_lokasi)
    {
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        $lokasi = Lokasi::where('id', $daftar_lokasi->id)->first();
        
        return view('dashboard.lokasi.show',[
            "title" => "Detail Lokasi",
            "nama" => $login->nama,
            "page" => "Halaman Detail",
            "data" => $lokasi
        ]);
    }

    public function upload() { 
        return back();
    }

    public function imgdelete(Lokasi $lokasi) { 
        Galeri::where('lokasi_id', $lokasi->id)->delete();
        return back();
    }
     
    public function fileStore(Request $request, Lokasi $lokasi) { 
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        $imageUpload = new Galeri();
        $imageUpload->lokasi_id =  $lokasi->id;
        $imageUpload->nama_foto = $lokasi->nama_lokasi.' '.Galeri::where('lokasi_id', $lokasi->id)->count() + 1;
        $imageUpload->foto = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function showtest(Lokasi $daftar_lokasi)
    {
        
        return view('dashboard.lokasi.showtest' ,[
            "title" => "Detail Lokasi",
            "nama" => Auth::user()->admin->nama ??  Auth::user()->penyelam->first()->nama,
            "page" => "Halaman Detail",
            "lokasi" => $daftar_lokasi
        ]);
        // if(Auth::user()->admin)
        // {
        //     $login = Auth::user()->admin;
        // } else
        // {
        //     $login = Auth::user()->penyelam->first();
        // }
        // $lokasi = Lokasi::where('id', $daftar_lokasi->id)->first();
        
        // return view('dashboard.lokasi.show',[
        //     "title" => "Detail Lokasi",
        //     "nama" => $login->nama,
        //     "page" => "Halaman Detail",
        //     "data" => $lokasi
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $daftar_lokasi)
    {
        $lokasi = Lokasi::where('id', $daftar_lokasi->id)->first();
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.lokasi.edit',[
            "title" => "Edit Lokasi",
            "nama" => $login->nama,
            "page" => "Edit User",
            "data" => $lokasi,
            "lokasi" => $daftar_lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $daftar_lokasi)
    {
        $validatedData = $request->validate([
            'nama_lokasi' => 'required',
            'alamat_lokasi' => 'required',
            'depth' => 'required',
            'visibility' => 'required',
            'coral_reef' => 'required',
            'creature' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required'
        ]);

        Lokasi::where('id', $daftar_lokasi->id)
                ->update($validatedData);

        
        return redirect('/dashboard/daftar-lokasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $daftar_lokasi)
    {
        Lokasi::destroy($daftar_lokasi->id);

        return redirect('/dashboard/daftar-lokasi');
    }
}
