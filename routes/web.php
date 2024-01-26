<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\loginController;
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
    Route::post('/berita', [BeritaController::class, 'store']);
    Route::get('/artikel', [ArtikelController::class, 'index']);
    Route::post('/artikel', [ArtikelController::class, 'store']);
    Route::get('/kegiatan', [KegiatanController::class, 'index']);
    Route::post('/kegiatan', [KegiatanController::class, 'store']);
    Route::get('/logout', [loginController::class, 'logout']);
});
Route::middleware('guest')->group(function(){
    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->middleware('throttle:login');
    Route::get('/register', [regisController::class, 'index']);
    Route::post('/register', [regisController::class, 'register']);
});



//Route::post('/post-image', [BeritaController::class, 'upload'])->middleware(['api', 'cors']);