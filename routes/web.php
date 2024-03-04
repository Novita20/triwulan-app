<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndikatorKegiatanController;
use App\Http\Controllers\IndikatorKinerjaController;
use App\Http\Controllers\IndikatorProgramController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\TriwulanController;
use App\Models\IndikatorKegiatan;
use App\Models\IndikatorProgram;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::resource('program', ProgramController::class);
    Route::resource('indikator_program', IndikatorProgramController::class);
    Route::get('get_program', [ProgramController::class, 'getProgram'])->name('getprogram');

    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('indikator_kegiatan', IndikatorKegiatanController::class);
    Route::get('get_kegiatan', [KegiatanController::class, 'getKegiatan']);

    // Route Sub Kegiatan dan Kinerja
    Route::resource('/sub_kegiatan', SubKegiatanController::class);
    Route::resource('/indikator_kinerja', IndikatorKinerjaController::class);

    //Route Pengaturan
    Route::resource('/pengaturan', PengaturanController::class);
    // Route::post('/pengaturan/{id}', [namaclass, namamethod]);

    // Route Realisasi
    Route::resource('realisasi', RealisasiController::class);

    // Route Triwulan
    Route::resource('triwulan', TriwulanController::class);
});

Route::get('logout', [LoginController::class, 'logout']);
