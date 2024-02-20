<?php

use App\Http\Controllers\Artikel\ArtikelController;
use App\Http\Controllers\Berita\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kegiatan\KegiatanController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Artikel\PostArtikelController;
use App\Http\Controllers\Berita\PostBeritaController;
use App\Http\Controllers\Kegiatan\PostKegiatanController;
use App\Http\Controllers\Auth\regisController;
use App\Http\Controllers\Auth\forgotPassword;
use App\Http\Controllers\guest\aboutController;
use App\Http\Controllers\guest\berandaController;
use App\Http\Controllers\guest\guestArtikelController;
use App\Http\Controllers\guest\guestBeritaController ;
use App\Http\Controllers\guest\guestKegiatanController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\Superadmin\masterController;
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

//Route Berita
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::get('/beranda', [berandaController::class, "index"]);
    Route::get('/profil', [profilController::class, 'index']);
    Route::post('/profil/ubah-password', [profilController::class, 'update']);

    Route::get('/berita', [BeritaController::class, 'index']);
    Route::get('/berita/detail/{berita:slug}', [BeritaController::class, 'show']);

    Route::get('/berita/buat', [PostBeritaController::class, 'index']);
    Route::post('/berita/buat', [PostBeritaController::class, 'store']);
    Route::get('/berita/hapus/{berita:slug}', [PostBeritaController::class, 'destroy']);
    Route::get('/berita/sunting/{berita:slug}', [PostBeritaController::class, 'edit']);
    Route::post('/berita/perbarui/{berita:slug}', [PostBeritaController::class, 'update']);
});

//Route Artikel
Route::middleware('auth')->group(function (){
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::get('/artikel/detail/{artikel:slug}', [ArtikelController::class, 'show']);

    Route::get('/artikel/buat', [PostArtikelController::class, 'index']);
    Route::post('/artikel/buat', [PostArtikelController::class, 'store']);
    Route::get('/artikel/hapus/{artikel:slug}', [PostArtikelController::class, 'destroy']);
    Route::get('/artikel/sunting/{artikel:slug}', [PostArtikelController::class, 'edit']);
    Route::post('/artikel/perbarui/{artikel:slug}', [PostArtikelController::class, 'update']);
});

//Route Kegiatan
Route::middleware('auth')->group(function (){
    Route::get('/kegiatan', [KegiatanController::class, 'index']);
    Route::get('/kegiatan/detail/{kegiatan:slug}', [KegiatanController::class, 'show']);

    Route::get('/kegiatan/buat', [PostKegiatanController::class, 'index']);
    Route::post('/kegiatan/buat', [PostKegiatanController::class, 'store']);
    Route::get('/kegiatan/hapus/{kegiatan:slug}', [PostKegiatanController::class, 'destroy']);
    Route::get('/kegiatan/sunting/{kegiatan:slug}', [PostKegiatanController::class, 'edit']);
    Route::post('/kegiatan/perbarui/{kegiatan:slug}', [PostKegiatanController::class, 'update']);

    Route::get('/logout', [loginController::class, 'logout']);
});

//Route Superadmin
Route::middleware('auth')->group(function (){
    Route::get('/master', [masterController::class, 'index']); 
    Route::get('/master/hapus/{id}', [masterController::class, 'index']); 
});

//Route Admin Auth
Route::middleware('guest')->group(function(){
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->middleware('throttle:login');
    Route::get('/register', [regisController::class, 'index']);
    Route::post('/register', [regisController::class, 'register']);
    Route::get('/register/verify/{verify_key}', [regisController::class, 'verify']);
    Route::get('/forgot-password', [forgotPassword::class, 'index']);
    Route::post('/forgot-password', [forgotPassword::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [forgotPassword::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [forgotPassword::class, 'update']);

});

// Route Guest

    Route::get('/', [berandaController::class, "index"]);
    Route::get('/about', [aboutController::class, "index"]);
    Route::get('/news', [guestBeritaController::class, "index"]);
    Route::get('/articles', [guestArtikelController::class, "index"]);
    Route::get('/events', [guestKegiatanController::class, "index"]);


