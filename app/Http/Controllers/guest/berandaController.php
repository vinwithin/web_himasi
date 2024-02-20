<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class berandaController extends Controller{
    //
    public function index(){
        return view('guest/beranda/index');
    }
}
