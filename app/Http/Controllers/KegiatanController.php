<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;


class KegiatanController extends Controller
{
    public function index(){
        return view('admin/kegiatan');
    }
}
