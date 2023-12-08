<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\CeritaUlosController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HasKategoriController;
use App\Http\Controllers\DashboardController;

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

Route::group(['domain'=>''],function(){
    Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::get('dashboard/ulos/', [DashboardController::class, 'ulos']);
    Route::get('dashboard/kategori', [DashboardController::class, 'kategori']);
    Route::get('dashboard/galeri',[DashboardController::class, 'galeri']);
    Route::resource('sejarah', CeritaUlosController::class)->only(['index']);
    Route::resource('comment', CommentController::class)->only(['index']);
    Route::resource('comment', CommentController::class)->except(['index']);
    Route::resource('ulos', UlosController::class)->only(['show','create']);
    Route::resource('kategori', KategoriController::class)->only(['show', 'create']);

    Route::middleware(['auth'])->group(function(){
        Route::resource('galeri', GaleryController::class);
        Route::post('comment/{comment}', [CommentController::class, 'reply'])->name('comment.reply');
        Route::resource('user', UserController::class)->only(['edit', 'update']);
    });

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::resource('ulos', UlosController::class)->except(['show']);
        Route::resource('kategori', KategoriController::class)->except(['show']);
        Route::resource('user', UserController::class)->except(['edit', 'update']);
        Route::resource('sejarah', CeritaUlosController::class)->except(['index']);
        Route::resource('haskategori', HasKategoriController::class);
        Route::patch('galeri/{id}/apply', [GaleryController::class, 'apply'])->name('galeri.apply');
        Route::patch('galeri/{id}/reject', [GaleryController::class, 'reject'])->name('galeri.reject');
    });
});




