<?php

namespace App\Http\Controllers;


use Exception;
use Illuminate\Http\Request;


class BeritaController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.berita');
    }
    


    public function upload(Request $request)
    {
       
    }
}
