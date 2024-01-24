<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class regisController extends Controller
{
    public function index() {
        return view('auth/register');
    }
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:32|confirmed',
        ],[
            "name.required" => "nama wajib diisi",
            "username.required" => "username wajib diisi",
            "email.required" => "alamat email wajib diisi",
            "email.email:dns" => "format alamat email salah",
            "email.unique" => "alamat email sudah terdaftar",
            "password.required" => "password wajib diisi",
            "password.min" => "password kurang dari 8 karakter",
            "password.max" => "password lebih dari 32 karakter",
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);
        $result = User::create($validateData);
        if($result){
            return redirect()->to('/login')->withSuccess("Berhasil Daftar Akun, Silahkan Login");
        }
    }
}
