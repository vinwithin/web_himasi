<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PostArtikelController;
use App\Http\Controllers\PostBeritaController;
use App\Http\Controllers\PostKegiatanController;
use App\Http\Controllers\regisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function (){
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/search', [BeritaController::class, 'search']);
    Route::get('/berita/detail/{berita:slug}', [BeritaController::class, 'show']);

    Route::post('/berita/upload', [PostBeritaController::class, 'upload'])->name('ckeditor.berita.upload');
    Route::get('/berita/create', [PostBeritaController::class, 'index']);
    Route::post('/berita/create', [PostBeritaController::class, 'store']);
    Route::get('/berita/delete/{berita:slug}', [PostBeritaController::class, 'destroy']);
    Route::get('/berita/edit/{berita:slug}', [PostBeritaController::class, 'edit']);
    Route::post('/berita/update/{berita:slug}', [PostBeritaController::class, 'update']);
});

Route::middleware('auth')->group(function (){
    Route::get('/artike', [ArtikelController::class, 'check']);
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/artikel/search', [ArtikelController::class, 'search']);
    Route::get('/artikel/detail/{artikel:slug}', [ArtikelController::class, 'show']);

    Route::get('/artikel/create', [PostArtikelController::class, 'index']);
    Route::post('/artikel/upload', [PostArtikelController::class, 'upload'])->name('ckeditor.upload');
    Route::post('/artikel/create', [PostArtikelController::class, 'store']);
    Route::get('/artikel/delete/{artikel:slug}', [PostArtikelController::class, 'destroy']);
    Route::get('/artikel/edit/{artikel:slug}', [PostArtikelController::class, 'edit']);
    Route::post('/artikel/update/{artikel:slug}', [PostArtikelController::class, 'update']);
});

Route::middleware('auth')->group(function (){
    Route::get('/kegiatan', [KegiatanController::class, 'index']);
    Route::get('/kegiatan/search', [KegiatanController::class, 'search']);
    Route::get('/kegiatan/detail/{kegiatan:slug}', [KegiatanController::class, 'show']);

    Route::post('/kegiatan/upload', [PostKegiatanController::class, 'upload'])->name('ckeditor.kegiatan.upload');
    Route::get('/kegiatan/create', [PostKegiatanController::class, 'index']);
    Route::post('/kegiatan/create', [PostKegiatanController::class, 'store']);
    Route::get('/kegiatan/delete/{kegiatan:slug}', [PostKegiatanController::class, 'destroy']);
    Route::get('/kegiatan/edit/{kegiatan:slug}', [PostKegiatanController::class, 'edit']);
    Route::post('/kegiatan/update/{kegiatan:slug}', [PostKegiatanController::class, 'update']);

    Route::get('/logout', [loginController::class, 'logout']);
});




Route::middleware('guest')->group(function(){
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->middleware('throttle:login');
    Route::get('/register', [regisController::class, 'index']);
    Route::post('/register', [regisController::class, 'register']);
});



//Route::post('/post-image', [BeritaController::class, 'upload'])->middleware(['api', 'cors']);