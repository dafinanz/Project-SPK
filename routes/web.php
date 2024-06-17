<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\CripsController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\IntensitasController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MatriksValueController;
use Route as GlobalRoute;

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

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/action', [LoginController::class, 'postLogin'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');


#Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home');

#Kriteria
Route::resource('kriteria', KriteriaController::class);

#Crips
Route::resource('crips', CripsController::class);

#Alternatif
Route::resource('alternatif', AlternatifController::class);
#Hapus Semua Data Alternatif
Route::post('/alternatif/hapus_semua',  [AlternatifController::class, 'hapusSemua'])->name('alternatif.hapus_semua');
Route::patch('/alternatif/update-selection/{id}', [AlternatifController::class, 'updateSelection'])->name('alternatif.update_selection');

#nilaiIntensitas
Route::resource('nilaiIntensitas', IntensitasController::class);

#matriksValue
Route::get('/matriks-value', [MatriksValueController::class, 'index'])->name('matriks_value.index');
Route::patch('/matriks-value/update-selection-with-values', [MatriksValueController::class, 'updateSelectionWithValues'])->name('matriks_value.update_selection_with_values');

#perhitungan
Route::resource('perhitungan', PerhitunganController::class);
Route::get('/proses', 'App\Http\Controllers\PerhitunganController@proses')->name('perhitungan.proses');

#Hasil
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
Route::get('/hasil/cetak', [HasilController::class, 'cetak'])->name('hasil.cetak');
Route::get('/hasil/cetak/dwonload', [HasilController::class, 'pdfDwonload'])->name('hasil.pdfDwonload');
Route::get('/hasil/excel', [HasilController::class, 'excel'])->name('hasil.excel');
Route::get('/hasil/excel/dwonload', [HasilController::class, 'excelDwonload'])->name('hasil.excelDwonload');
Route::get('/hasil/cari', [HasilController::class, 'cari'])->name('hasil.cari');

//About
// Route::resource('about', AboutController::class)->middleware(['auth']);
Route::resource('about', AboutController::class);

//Backup
Route::post('/cadangkan', [BackupController::class, 'cadangkanAlternatif'])->name('cadangkan');
Route::get('/cadangkan', [HistoryController::class, 'riwayat'])->name('riwayat');
Route::get('/cadangan-alternatif', [HistoryController::class, 'riwayatAlternatif'])->name('riwayat.tampil');

//Upload JSON
Route::get('/upload', [BackupController::class, 'upload'])->name('upload.form');
Route::post('/upload/file', [BackupController::class, 'uploadAlternatif'])->name('uploadFile');
