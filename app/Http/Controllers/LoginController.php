<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('landing.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $input = $request->all();
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        

        if(Auth::attempt($credentials)) {
            if (auth()->user()->role == 'penyelam') {
                 $request->session()->regenerate();
            return redirect()->intended('/dashboard_penyelam');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
           
        }

        return back()->with('loginError', 'Login Failed');

    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/Login');
    }



}
