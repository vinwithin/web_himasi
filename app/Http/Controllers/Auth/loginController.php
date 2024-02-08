<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

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
        $user = User::where('email', $validateData['email'])->first();
        if (!$user->active ) {
            return "Akun anda belum aktif";
        }
        if(Auth::attempt($validateData)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with("success","Login Berhasil");
        }else{
            return back()->with('loginFailed', 'Email dan Password salah!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
