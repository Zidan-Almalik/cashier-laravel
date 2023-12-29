<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {

        Route::middleware('role:1')->group(function () {
            Route::get('all-jenis', [JenisController::class, 'index'])->name(
                'all-jenis.index'
            );
            Route::post('all-jenis', [JenisController::class, 'store'])->name(
                'all-jenis.store'
            );
            Route::get('all-jenis/create', [
                JenisController::class,
                'create',
            ])->name('all-jenis.create');
            Route::get('all-jenis/{jenis}', [JenisController::class, 'show'])->name(
                'all-jenis.show'
            );
            Route::get('all-jenis/{jenis}/edit', [
                JenisController::class,
                'edit',
            ])->name('all-jenis.edit');
            Route::put('all-jenis/{jenis}', [
                JenisController::class,
                'update',
            ])->name('all-jenis.update');
            Route::delete('all-jenis/{jenis}', [
                JenisController::class,
                'destroy',
            ])->name('all-jenis.destroy');

            Route::resource('kategoris', KategoriController::class);
            Route::resource('mejas', MejaController::class);
            Route::resource('menus', MenuController::class);

            Route::resource('stoks', StokController::class);
            Route::resource('users', UserController::class);
        });

        Route::middleware('role:1,2')->group(function () {
            Route::resource('pelanggans', PelangganController::class);
            Route::resource('pemesanans', PemesananController::class);
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
