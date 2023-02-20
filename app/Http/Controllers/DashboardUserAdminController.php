<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardUserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        return view('dashboard.admin.create',[
            "title" => "Tambah User Admin",
            "nama" => $login->nama,
            "page" => "User Admin"
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
            'foto' => 'image|file|max:5120',
            'username' => 'required|min:8|unique:users',
            'password' => 'required|min:5',
            'role' => 'required',
            'status' => 'required'
        ]);
         
        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('admin-image');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);


        $user = User::create([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],
            'role' => $validatedData['role']
        ]);

        Admin::create([
            'user_id' => $user['id'],
            'nama' => $validatedData['nama'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'alamat' => $validatedData['alamat'],
            'telpon' => $validatedData['telpon'],
            'foto' => $validatedData['foto']
        ]);

        
         return redirect('/dashboard/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
     
        $admin = Admin::where('user_id', $admin->id)->first();

        return view('dashboard.admin.show',[
            "title" => "Admin",
            "nama" => $login->nama,
            "page" => "Halaman Detail",
            "user" => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $data = Admin::where('user_id', $admin->id)->first();
        if(Auth::user()->admin)
        {
            $login = Auth::user()->admin;
        } else
        {
            $login = Auth::user()->penyelam->first();
        }
        return view('dashboard.admin.edit',[
            "title" => "User",
            "nama" => $login->nama,
            "page" => "Edit User",
            "user" => $data,
            "data" => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
            'password' => 'required|min:5',
            'username' => 'required|min:8|unique:users'
        ]);
        
       $validatedData['password'] = bcrypt($validatedData['password']);

        // if($request->username != $user->username) {
        //     $data['username'] = 'required|min:8|unique:users';
        // }
        
        User::where('id', $admin->id)
                ->update([
                    'username' => $validatedData['username'],
                    'password' => $validatedData['password']
                ]);

        Admin::where('user_id', $admin->id)
                ->update([
                    'nama' => $validatedData['nama'],
                    'jenis_kelamin' => $validatedData['jenis_kelamin'],
                    'alamat' => $validatedData['alamat'],
                    'telpon' => $validatedData['telpon'],
                    ]);


        
         return redirect('/dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $admin)
    {
        
        if($admin->admin->foto) {
            Storage::delete($admin->admin->foto);
        }
        
        User::destroy($admin->id);

        return redirect('/dashboard/users');
    }
}
