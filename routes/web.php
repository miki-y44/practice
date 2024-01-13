<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

//一覧画面表示
Route::get('/product_view', [App\Http\Controllers\ProductController::class, 'showProduct_view'])->name('product_view');

//削除処理
Route::post('/product_view/{id}',[App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
//商品登録画面表示
Route::get('/regist',[App\Http\Controllers\ProductController::class,'regist_index'])->name('regist');
//商品登録処理
Route::post('/regist',[App\Http\Controllers\ProductController::class,'registSubmit'])->name('submit');

//詳細画面の表示
Route::get('/detail/{id}',[App\Http\Controllers\ProductController::class,'detail_index'])->name('detail');
//編集画面の表示
Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class,'edit_index'])->name('edit');
//編集処理
Route::post('/edit/{id}',[App\Http\Controllers\ProductController::class,'Updata'])->name('updata');
