<?php

namespace App\Http\Controllers;


use Exception;


class ArtikelController extends Controller
{
    public function index(){
        return view('admin/artikel');
    }
}
