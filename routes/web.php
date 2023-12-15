<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Models\State;
use App\Models\Township;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
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
})->name('welcome');


Route::group(['middleware' => 'auth'], function () {
    Route::get('blog/index',[BlogController::class,'index'])->name('blog.index');
    Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::POST('blog/store',[BlogController::class,'store'])->name('store');
    Route::get('blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('blog/{id}/update',[BlogController::class,'update'])->name('blog.update');
    Route::post('blog/{id}/destory',[BlogController::class,'delete'])->name('blog.delete');
    Route::resource('post', PostController::class);
});


Route::get('/chart',function (){
    return view('chart');
})->name('chart');

Auth::routes(['register' => false]);

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('state',function (){
    $state = State::all();
    return view('welcome',compact('state'));
});

Route::get('township',function(){
    $township = Township::with('state')->get();
    return view('township',compact('township'));
});
