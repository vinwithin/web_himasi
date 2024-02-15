<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profilController extends Controller
{
    public function index(){
        return view('admin/profil',[
            'profile' => User::all(),
        ]);
    }
    public function update(Request $request){
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|max:32|confirmed',
        ]);
        $user = Auth::user();
        if(!Hash::check($validateData['old_password'], $user->password)) {
            return redirect("/profil")->with('error','Password Salah');
        } else {
            $password = Hash::make($validateData['password']);
            User::where('id', $user->id)
            ->update(['password' => $password]);
            
    
    
            return redirect('/profil')->with('success', 'Password berhasil diubah.');
        }
                

           
    }
}
