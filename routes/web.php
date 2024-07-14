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
use App\Http\Controllers\RealisasiSubIkuController;
use App\Http\Controllers\SubIkuController;
use App\Http\Controllers\SubKegiatanController;
use App\Http\Controllers\TriwulanController;
use App\Models\IndikatorKegiatan;
use App\Models\IndikatorProgram;
use App\Models\Realisasi;
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
    Route::get('/beranda', [HomeController::class, 'index']);
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

    // Route Realisasi
    // realisasi/{id}
    Route::get('realisasi/download', [RealisasiController::class, 'downloadExcel'])->name('realisasi.download');
    Route::resource('realisasi', RealisasiController::class)->except('update');
    Route::put('realisasi/update', [RealisasiController::class, 'update'])->name('realisasi.update');
    Route::get('get_realisasi', [RealisasiController::class, 'getRealisasi'])->name('getrealisasi');
    Route::get('get_realisasi/{id}', [RealisasiController::class, 'getRealisasiById'])->name('getrealisasibyID');


    // Route Triwulan
    Route::resource('triwulan', TriwulanController::class);

    // Realisasi Sub IKU
    Route::get('sub_iku/realisasi', [RealisasiSubIkuController::class, 'index'])->name("sub_iku.realisasi");
    Route::get('sub_iku/realisasi/download', [RealisasiSubIkuController::class, 'download'])->name("sub_iku.realisasi.download");
    Route::get('sub_iku/realisasi/{id}/kinerja', [RealisasiSubIkuController::class, 'get'])->name("sub_iku.realisasi.kinerja");
    Route::get('sub_iku/realisasi/{id}/edit', [RealisasiSubIkuController::class, 'edit'])->name("sub_iku.realisasi.edit");
    Route::put('sub_iku/realisasi/update', [RealisasiSubIkuController::class, 'update'])->name("sub_iku.realisasi.update");

    // Sub IKU
    Route::resource('sub_iku', SubIkuController::class);
});

Route::get('logout', [LoginController::class, 'logout']);
