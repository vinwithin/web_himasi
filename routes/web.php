<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
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
Route::get('/login', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'login'])->middleware('throttle:login');
Route::get('/register', [regisController::class, 'index']);
Route::post('/register', [regisController::class, 'register']);
Route::get('/', [HomeController::class, 'index']);
Route::post('/post-berita', [BeritaController::class, 'store']);
Route::post('/post-image', [BeritaController::class, 'upload'])->middleware(['api', 'cors']);