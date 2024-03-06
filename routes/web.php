<?php

use App\Models\Desa;
use App\Models\Surat;
use App\Models\User;
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
        $desaCount = Desa::count();
        $suratCount = Surat::count();
        $userCount = User::count();
        return view('dashboard', compact('desaCount', 'suratCount', 'userCount'));
    })->name('dashboard');

    Route::get('/permissions', function () {
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

    Route::get('/surat', function () {
        return view('surat');
    })->name('surat');

    Route::get('/penjadwalan', function () {
        return view('penjadwalan');
    })->name('penjadwalan');

    Route::get('/penugasan', function () {
        return view('penugasan');
    })->name('penugasan');

    Route::get('/desa', function () {
        return view('desa');
    })->name('desa');
});
