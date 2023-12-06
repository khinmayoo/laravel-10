<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('blog/index',[BlogController::class ,'index'])->name('blog.index');
Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
Route::POST('blog/store',[BlogController::class,'store'])->name('store');
Route::get('blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::post('blog/{id}/update',[BlogController::class,'update'])->name('blog.update');

Route::resource('posts', PostController::class);
