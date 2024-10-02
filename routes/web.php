<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
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
//     return view('home');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/kategori', function () {
//     return view('kategori');
// });

// Route::get('/detail', function () {
//     return view('detailwisata');
// });

// LOGIN-LOGOUT
Route::get('/login', [LoginController::class, 'login']);
Route::post('/auth', [LoginController::class, 'auth'] );
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('statuslogin')->group(function () {

// ADMIN
Route::get('/dashboard', [DashboardController::class, 'adm']);

// USER 
Route::get('/daftar-user', [UserController::class, 'showusr']);
Route::post('/daftar-user', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'add']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/delete/{id}', [UserController::class, 'delete']);

// KATEGORI
Route::get('/daftar-kategori', [KategoriController::class, 'showktgr']);
Route::post('/daftar-kategori', [KategoriController::class, 'search']);
Route::get('/kategori/create', [KategoriController::class, 'create']);
Route::post('/kategori/create', [KategoriController::class, 'add']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::post('/kategori/update/{id}', [KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete']);

// DESTINASI
Route::get('/daftar-destinasi', [DestinasiController::class, 'showdst']);
Route::post('/daftar-destinasi', [DestinasiController::class, 'search']);
Route::get('/destinasi/create', [DestinasiController::class, 'create']);
Route::post('/destinasi/create', [DestinasiController::class, 'add']);
Route::get('/destinasi/edit/{id}', [DestinasiController::class, 'edit']);
Route::post('/destinasi/update/{id}', [DestinasiController::class, 'update']);
Route::get('/destinasi/delete/{id}', [DestinasiController::class, 'delete']);

// WISATA
Route::get('/daftar-wisata', [WisataController::class, 'showisata']);
Route::post('/daftar-wisata', [WisataController::class, 'search']);
Route::get('/wisata/create', [WisataController::class, 'create']);
Route::post('/wisata/create', [WisataController::class, 'add']);
Route::get('/wisata/edit/{id}', [WisataController::class, 'edit']);
Route::post('/wisata/update/{id}', [WisataController::class, 'update']);
Route::get('/wisata/delete/{id}', [WisataController::class, 'delete']);

});

// HOME 
Route::get('/home', [HomeController::class, 'showhome']);
Route::get('/', [HomeController::class, 'showhome']);
Route::get('/wisata/search', [HomeController::class, 'search']);
Route::get('/detail/wisata/{id}', [HomeController::class, 'dtlwisata'])->name('detail.wisata');
Route::get('/detail/destinasi/{id}', [HomeController::class, 'dtldestinasi']);
Route::get('detail/destinasi/{destinasi_id}/wisata/{id}', [HomeController::class, 'dtlwisata'])->name('wisataa.show');
Route::get('/detail/kategori/{id}', [HomeController::class, 'dtlkategori']);
Route::get('detail/kategori/{kategori_id}/wisata/{id}', [HomeController::class, 'dtlwisata'])->name('wisata.show');
Route::get('/searchk', [HomeController::class, 'searchk']);

// Route::get('/searchd', [HomeController::class, 'searchd']);


