<?php

use App\Http\Controllers\AdminConroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogistController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MonetaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/admin', [AdminConroller::class, 'admin'])->middleware('auth');
Route::get('/logist', [LogistController::class, 'show_logist'])->middleware('auth');
Route::get('/catalog', [CatalogController::class, 'show_catalog'])->middleware('auth')->name('catalog');
Route::get('get_photo/{id}', [CatalogController::class, 'getPhoto'])->name('get_photo')->middleware('auth');

Route::post('/addShoe', [CatalogController::class, 'addShoe'])->middleware('auth');

Route::get('/callback', [MonetaController::class, 'payResponse']);

Auth::routes();
