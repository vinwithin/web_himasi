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
        ],[
            "email.required" => "alamat email wajib diisi",
            "email.email:dns" => "format alamat email salah",
            "password.required" => "password wajib diisi",
            "password.min" => "password kurang dari 8 karakter",
            "password.max" => "password lebih dari 32 karakter",
        ]);
        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with("success","Login Berhasil");
        }
        return back()->with("error","Email atau Password Salah!");
    }
}
