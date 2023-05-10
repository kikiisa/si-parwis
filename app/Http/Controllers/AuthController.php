<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException as Valid;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login',['title' => 'LOGIN - SISTEM-INFORMASI-GIS']);
    }


    public function store(Request $request)
    {
        
        if(Auth::attempt(['email' => $request->email,'password' => $request->password]))
        {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        throw Valid::withMessages(['notif' => 'Maaf Email Dan Password Anda Tidak Terdaftar']);
        
    }


    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth');
    }
}
