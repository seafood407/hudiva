<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penyelam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('landing.signup', [
            "title" => "Daftar"
        ]);
    } 
 

    public function store(Request $request)
    {
 
        $validatedData = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
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

        
         return redirect('/Login')->with('success', 'Registration Successfull! Please Login');
    }
    
}
