<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Penyelam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class AdminController extends Controller
{
    
    public function dashboard()
    {
        
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        
        return view('dashboard.dashboard',[
            "title" => "Dashboard",
            "nama" => $login->nama,
            "page" => "Dashboard",
            "lokasi" => Lokasi::all(),
            "user" => User::all(),
            "galeri" => Galeri::all(),
            "penyelam" => User::all()->where('role', 'Penyelam')            
        ]);
    }

}
