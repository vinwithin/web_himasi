<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class masterController extends Controller
{
    public function index(Request $request){
        if ($request->user()->cannot('view', User::class)) {
            abort(403);
        }
        return view('superadmin/index',[
            'users' => User::select('name', 'email', 'role')->where('role', 'admin')->get(),
        ]);
    }
    public function destroy(Request $request, $id){
        if ($request->user()->cannot('delete', User::class)) {
            abort(403);
        }
        User::where('id', $id)->delete();
        return redirect('/master')->with('success', 'Pengguna Berhasil Dihapus!');
    }
}
