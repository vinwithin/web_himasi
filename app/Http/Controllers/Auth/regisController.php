<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class regisController extends Controller
{
    public function index() {
        return view('auth/register');
    }
    public function register(Request $request){
        $str = Str::random(100);
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:32|confirmed',
        ]);
        $validateData["password"] = Hash::make($validateData["password"]);
        $validateData['role'] = "superadmin";
        $validateData['verify_key'] = $str;
        User::create($validateData);
        $details = [
            'name' => $validateData['name'],
            'url' => request()->getHttpHost() . '/register/verify/' . $str,
        ];
        $check =  Mail::to($validateData['email'])->send(new MailSend($details));
        if($check){
            return "Silahkan Periksa Alamat Email Anda Untuk Melakukan Verifikasi";
        }else{
            return redirect()->to('/register')->with("error", "Gagal Mendaftar Akun, Silahkan Coba Lagi");
        }
    }

    public function verify($verify_key){
        $checkKey = User::select('verify_key')->where('verify_key', $verify_key)
                    ->update(['active' => 1]);
        if($checkKey){
            return view('auth/after_verify');
        }else{
            return "Key Tidak Valid";
        }
    }
}
