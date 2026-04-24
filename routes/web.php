<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCommodityController; //mengimpor controller category commodity biar bisa dipake disini
use App\Http\Controllers\CommodityController; //mengimpor controller commodity biar bisa dipake disini
use App\Http\Controllers\LoginController;

Route::resource('/category-commodity', CategoryCommodityController::class);
//route resource berfungsi untuk membuat 7 route otomatis untuk CRUD tanpa menulis 1 per 1
// "/category-commodity" adalah URL yang akan diakses nantinya
// CategoryCommodityController::class adalah controller yang akan menangani permintaan untuk route ini

Route::resource('/commodity', CommodityController::class);

// LOGIN
Route::get('/login', [LoginController::class, 'view']);
// menggunakan get karena hanya menampilkan halaman login, tidak ada data yang disimpan atau diubah
Route::post('/login', [LoginController::class, 'login'])->name('login');
// menggunakan method post untuk menyimpan data yang sudah diinputkan user

// REGISTER
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/index', function () {
    return view('index');
});
