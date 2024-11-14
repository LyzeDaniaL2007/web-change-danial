<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Peminjaman;

Route::get('/dashboard', [RoutesController::class, 'Dashboard']);

Route::get('/tes', function () {
   return redirect()->action([RoutesController::class, 'Dashboard']);
});

// Route::get('/buku', function(){
//   return view('views.buku');
// });

Route::get('/', [RequestController::class, 'store']);

Route::get('/login', [LoginController::class, 'login']);

Route::post('/login', [LoginController::class, 'postLogin']);

Route::get('/', function () {
   return 'Hallo, aku sedang belajar membuat website dengan Laravel';
});

Route::get('/dashboard', [RoutesController::class, 'Dashboard']);

Route::match(['get', 'post'], '/anggota', function () {
   return 'Hallo, aku membuat route anggota dengan beberapa method';
});

Route::get('/', [RequestController::class, 'store']);



Route::get('/name', function () {
   $name = session('name');
   return 'Halaman nama dengan nama ' . $name;
});

Route::get('/array', function () {
   return [1, 'Perpustakaan', true];
});

Route::get('/hello', function () {
   return response('Hello Laravel', 200)
      ->header('Content-Type', 'text/plain');
});

Route::get('/hello', function () {
   return response($content = 'Hallo Laravel')
      ->withHeaders([
         'Content-Type' => 'text/html',
         'X-Header-One' => 'Header Value1',
         'X-Header-Two' => 'Header Value2',
      ]);
});

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku-admin', [BukuController::class, 'indexAdmin']);

Route::post('/buku', [BukuController::class, 'store']);

Route::get('/helloworld', function () {
   return view('helloworld');
});

Route::get('/bootstrap', function () {
   return view('bootstrap');
});

Route::get('/login', [PagesController::class, 'loginPage'])->name('login');

Route::get('/dashboardadmin', [PagesController::class, 'dashboardadmin'])->name('dashboardAdmin');

Route::get('/dashboardsiswa', [PagesController::class, 'dashboardsiswa'])->name('dashboardSiswa');

Route::get('/peminjamanadmin', [PagesController::class, 'peminjamanadmin'])->name('dashboardAdmin');

Route::get('/peminjamansiswa', [PagesController::class, 'peminjamansiswa'])->name('peminjamanSiswa');

//buku

Route::post('/createbuku', [BukuController::class, 'create'])->name('action.createbuku');
Route::get('/createbuku', [PagesController::class, 'create_buku'])->name('create_buku');
Route::get('/update_buku/{buku_id}', [PagesController::class, 'update_buku'])->name('update_buku');
Route::patch('/buku/{buku_id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{buku_id}', [BukuController::class, 'delete'])->name('buku.delete');

Route::get('/bukuadmin', [PagesController::class, 'bukuadmin'])->name('bukuadmin');

Route::get('/bukusiswa', [PagesController::class, 'bukusiswa'])->name('bukusiswa');

Route::get('/pengaturanadmin', [PagesController::class, 'pengaturanadmin'])->name('pengaturanadmin');

Route::get('/pengaturansiswa', [PagesController::class, 'pengaturansiswa'])->name('pengaturansiswa');

Route::get('/penulisadmin', [PagesController::class, 'penulisadmin'])->name('penulisadmin');

Route::get('/kategoriadmin', [PagesController::class, 'kategoriadmin'])->name('kategoriadmin');

Route::get('/penerbitadmin', [PagesController::class, 'penerbitadmin'])->name('penerbitadmin');


//Penerbit

Route::post('/createpenerbit', [PenerbitController::class, 'create'])->name('action.createpenerbit');
Route::get('/createbuku', [PagesController::class, 'create_buku'])->name('create_buku');
Route::get('/createpenerbit', [PagesController::class, 'create_penerbit'])->name('create_penerbit');
Route::get('/update_penerbit/{penerbit_id}', [PagesController::class, 'update_penerbit'])->name('update_penerbit');
Route::patch('/penerbit/{penerbit_id}', [PenerbitController::class, 'update'])->name('penerbit.update');
Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');

//Kategori

Route::post('/createkategori', [KategoriController::class, 'create'])->name('action.createkategori');
Route::get('/createkategori', [PagesController::class, 'create_kategori'])->name('create_kategori');
Route::get('/update_kategori/{kategori_id}', [PagesController::class, 'update_kategori'])->name('update_kategori');
Route::patch('/kategori/{kategori_id}', [KategoriController::class, 'update'])->name('action.updatekategori');
Route::delete('/kategori/{kategori_id}', [KategoriController::class, 'delete'])->name('kategori.delete');

//Penulis

Route::post('/createpenulis', [PenulisController::class, 'create'])->name('action.createpenulis');
Route::get('/createpenulis', [PagesController::class, 'create_penulis'])->name('create_penulis');
Route::get('/update_penulis/{penulis_id}', [PagesController::class, 'update_penulis'])->name('update_penulis');
Route::patch('/penulis/{penulis_id}', [PenulisController::class, 'update'])->name('action.updatepenulis');
Route::delete('/penulis/{penulis_id}', [PenulisController::class, 'delete'])->name('penulis.delete');


//Rak

Route::get('/rakadmin', [PagesController::class, 'rakadmin'])->name('rakadmin');
Route::post('/createrak', [RakController::class, 'create'])->name('action.createrak');
Route::get('/createrak', [PagesController::class, 'create_rak'])->name('create_rak');
Route::get('/update_rak/{rak_id}', [PagesController::class, 'update_rak'])->name('update_rak');
Route::patch('/rak/{rak_id}', [RakController::class, 'update'])->name('rak.update');
Route::delete('/rak/{rak_id}', [RakController::class, 'delete'])->name('rak.delete');

//Peminjaman
Route::get('/peminjaman-admin', [PagesController::class, 'peminjamanadmin'])->name('peminjaman.index');
Route::get('/update-peminjaman/{id}', [PagesController::class, 'updatepeminjaman'])->name('peminjaman.update');

Route::put('/update-peminjaman/{id}', [PeminjamanController::class, 'update'])->name('action.update.peminjaman');
Route::delete('/delete-peminjaman/{id}', [PeminjamanController::class, 'delete'])->name('action.delete.peminjaman');
Route::get('/pinjam/{id}', [PeminjamanController::class, 'store'])->name('action.pinjambuku');
