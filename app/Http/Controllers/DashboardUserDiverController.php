<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\Admin;
use App\Models\Penyelam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as AuthUser;

class DashboardUserDiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
       
        return view('dashboard.penyelam.index',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "User",
            "admin" => Admin::all(),
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
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.penyelam.create',[
            "title" => "Tambah User Penyelam",
            "nama" => $login->nama,
            "page" => "User Penyelam"
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|file|max:5120',
            'lisensi' => 'image|file|max:5120',
            'username' => 'required|min:8|unique:users',
            'password' => 'required|min:5',
            'role' => 'required',
            'status' => 'required'
        ]);

        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('diver-image');
            $validatedData['lisensi'] = $request->file('lisensi')->store('diver-image');
        }
        
        $validatedData['password'] = bcrypt($validatedData['password']);


        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role']
        ]);

        Penyelam::create([
            'user_id' => $user['id'],
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'alamat' => $validatedData['alamat'],
            'telpon' => $validatedData['telpon'],
            'foto' => $validatedData['foto'],
            'lisensi' => $validatedData['lisensi'],
            'status' => $validatedData['status']
        ]);

        
         return redirect('/dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $user = Penyelam::where('user_id', $user->id)->get();
        
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.penyelam.show',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "Halaman Detail",
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $data = Penyelam::where('user_id', $user->id)->get();
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.penyelam.edit',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "Edit User",
            "user" => $data,
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
 
       $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'password' => 'required|min:5',
            'username' => 'required|min:8|unique:users',
            'status' => 'required'
        ]);
        
       $validatedData['password'] = bcrypt($validatedData['password']);

        // if($request->username != $user->username) {
        //     $data['username'] = 'required|min:8|unique:users';
        // }
        
        User::where('id', $user->id)
                ->update([
                    'username' => $validatedData['username'],
                    'password' => $validatedData['password']
                ]);

        Penyelam::where('user_id', $user->id)
                    ->update([
                        'nama' => $validatedData['nama'],
                        'jenis_kelamin' => $validatedData['jenis_kelamin'],
                        'alamat' => $validatedData['alamat'],
                        'telpon' => $validatedData['telpon'],
                        'status' => $validatedData['status']
                    ]);


        
         return redirect('/dashboard/users');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        
        if($user->penyelam[0]['foto']) {
            Storage::delete($user->penyelam[0]['foto']);
            Storage::delete($user->penyelam[0]['lisensi']);
        }
        User::destroy($user->id);

        return redirect('/dashboard/users');
    }
}
