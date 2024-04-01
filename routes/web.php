<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
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
// route
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/sk', function () {
//     return view('extra');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// route resource adalah cara membuat route secara otomatis
//route::resource('artikel', 'ArticleController');

//controller
Route::get('/artikel', 'App\Http\Controllers\ArticleController@index');
Route::get('/artikel/create', 'App\Http\Controllers\ArticleController@create');
// slug adalah cara membuat url lebih dinamis
//slug adalah judul yang lebih ramah pada url
Route::get('/artikel/{slug}', 'App\Http\Controllers\ArticleController@contoh');
// route::get('/sk', 'ArticleController@contoh');
Route::post('/artikel', 'App\Http\Controllers\ArticleController@store');
Route::get('/artikel/{id}/edit', 'App\Http\Controllers\ArticleController@edit');

//route put adalah untuk mengupdate data
Route::put('/artikel/{id}', 'App\Http\Controllers\ArticleController@update');

// route delete adalah untuk menghapus data
Route::delete('/artikel/{id}', 'App\Http\Controllers\ArticleController@destroy');
