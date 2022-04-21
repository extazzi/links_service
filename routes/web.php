<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\Links\LinkController::class, 'index'])->name('index.link');
Route::post('/create',  [App\Http\Controllers\Links\LinkController::class, 'create'])->name('create.link');
