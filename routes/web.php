<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCommodityController; //mengimpor controller category commodity biar bisa dipake disini
use App\Http\Controllers\CommodityController; //mengimpor controller commodity biar bisa dipake disini

Route::resource('/category-commodity', CategoryCommodityController::class);
//route resource berfungsi untuk membuat 7 route otomatis untuk CRUD tanpa menulis 1 per 1
// "/category-commodity" adalah URL yang akan diakses nantinya
// CategoryCommodityController::class adalah controller yang akan menangani permintaan untuk route ini

Route::resource('/commodity', CommodityController::class);


Route::get('/', function () {
    return view('welcome');
});
