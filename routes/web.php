<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [UserController::class, 'index'])->name('point');

Route::controller(AuthController::class)->name('auth.')->group( function(){
    Route::middleware('guest')->group(function(){
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'login_proses')->name('login_proses');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'register_proses')->name('register_proses');
    });
    
    Route::middleware('auth')->group(function(){
        Route::get('/data-pengguna', 'index')->name('index');

        Route::delete('/delete', 'destroy')->name('destroy');
        Route::delete('/delete-akun/{akunUser}', 'destroy_akun')->name('destroy.akun');

        Route::get('/setting', 'edit')->name('edit');
        Route::put('/update', 'update')->name('update');

        Route::get('/edit-akun', 'edit_user')->name('edit.akun');
        Route::put('/edit-akun', 'update_user')->name('update.akun');
    });
});

Route::controller(TourController::class)->name('tours.')->group(function(){
    Route::get('/tours-mauk', 'index')->name('index');
    Route::get('/wisata-detail/{wisata}', 'show')->name('show');
});

Route::middleware('auth')->group(function(){

    Route::get('/riwayat-pesanan', [UserController::class, 'riwayat_pesanan'])->name('riwayat');
    Route::get('/pesan-wisata/{wisata}', [UserController::class, 'create'])->name('pesan');
    Route::get('/pesan-detail/{wisata}', [UserController::class, 'show'])->name('detail_pesan');
    Route::post('/proses-pemesanan', [UserController::class, 'store'])->name('proses_pesan');

    Route::middleware('role:admin')->group(function(){
        Route::get('/admin/dashboard', [UserController::class, 'admin'])->name('admin');
        Route::resource('tours/admin', TourController::class)->except(['index', 'show']);
        Route::controller(CategoryController::class)->name('kategori.')->group(function(){
            Route::get('/tours/kategori', 'index')->name('index');
            Route::delete('/kategori/delete/{id}', 'destroy')->name('destroy');
            Route::post('/kategori/create', 'store')->name('store');
        });
    });
});