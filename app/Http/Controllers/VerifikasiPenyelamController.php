<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Penyelam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class VerifikasiPenyelamController extends Controller
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
       
        return view('dashboard.verifikasi.index',[
            "title" => "Verifikasi",
            "nama" => $login->nama,
            "page" => "Verifikasi",
            "diver" => Penyelam::all()
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
    public function show($verifikasi_penyelam)
    {
        $user = Penyelam::where('user_id', $verifikasi_penyelam)->get();
        
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.verifikasi.show',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "Halaman Detail",
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $verifikasi_penyelam)
    {
        $data = Penyelam::where('user_id', $verifikasi_penyelam->id)->get();
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.verifikasi.edit',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "Edit User",
            "user" => $data,
            "data" => $verifikasi_penyelam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $verifikasi_penyelam)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);


        Penyelam::where('user_id', $verifikasi_penyelam)
                    ->update([
                        'status' => $validatedData['status']
                    ]);


        
         return redirect('/dashboard/verifikasi-penyelam');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($verifikasi_penyelam)
    {
        if($verifikasi_penyelam->penyelam[0]['foto']) {
            Storage::delete($verifikasi_penyelam->penyelam[0]['foto']);
            Storage::delete($verifikasi_penyelam->penyelam[0]['lisensi']);
        }
        User::destroy($verifikasi_penyelam);

        return redirect('/dashboard/users');
    }
}
