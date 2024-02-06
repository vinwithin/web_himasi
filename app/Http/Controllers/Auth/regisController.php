<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);
        $result = User::create($validateData);
        if($result){
            return redirect()->to('/login')->withSuccess("Berhasil Daftar Akun, Silahkan Login");
        }
    }
}
