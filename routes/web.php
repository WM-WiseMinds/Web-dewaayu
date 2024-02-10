<?php

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get( '/permissions', function () {
        return view('permissions');
    })->name('permissions');

    Route::get('/roles', function () {
        return view('roles');
    })->name('roles');
    Route::get('/users', function () {
        return view('user');
    })->name('user');
    Route::get('/berita', function () {
        return view('berita');
    })->name('berita');
    Route::get('/operator', function () {
        return view('operator');
    })->name('operator');
    Route::get('/sekretarisdesa', function () {
        return view('sekretarisdesa');
    })->name('sekretarisdesa');
    Route::get('/tenagaahli', function () {
        return view('tenagaahli');
    })->name('tenagaahli');
    Route::get('/surat', function () {
        return view('surat');
    })->name('surat');
    Route::get('/penjadwalan', function () {
        return view('penjadwalan');
    })->name('penjadwalan');
});
