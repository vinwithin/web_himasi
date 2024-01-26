<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index(){
        return view('auth/login');
    }
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6|max:32',
        ]);
        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with("success","Login Berhasil");
        }
        return back()->with('loginFailed', 'Gagal Login!');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
