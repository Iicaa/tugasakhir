<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminJadwalRapatController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminPegawaiController;
use App\Http\Controllers\Admin\AdminHistoryController;
use App\Http\Controllers\Admin\AdminOperatorController;
use App\Http\Controllers\Admin\AdminBidangController;
use App\Http\Controllers\Admin\AdminUndanganController;

use App\Http\Controllers\Pegawai\PegawaiController;
use App\Http\Controllers\Pegawai\PegawaiRapatController;
use App\Http\Controllers\Pegawai\PegawaiHistoryController;
use App\Http\Controllers\Pegawai\PegawaiProfilController;

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


Route::controller(AuthController::class)->group(function () {
	Route::get('/', 'root');
	Route::get('login', 'login')->name('login');
	Route::get('logout', 'logout');
	Route::post('login', 'loginProses');
});


Route::prefix('admin')->middleware('auth')->group(function () {
	Route::controller(AdminController::class)->group(function () {
		Route::get('beranda', 'beranda');
	});

	Route::controller(AdminUndanganController::class)->group(function () {
		Route::get('undangan', 'index');
	});

	Route::controller(AdminJadwalRapatController::class)->group(function () {
		Route::get('/jadwal-rapat', 'index');
		Route::get('/jadwal-rapat/create', 'create');
		Route::get('/jadwal-rapat/{jadwal}/pilih-pegawai', 'pilihPegawai');
		Route::post('/jadwal-rapat/{jadwal}/pilih-pegawai', 'kirimJadwal');
		Route::get('/jadwal-rapat/{jadwal}/detail', 'show');
		Route::post('/jadwal-rapat/create', 'store');
		Route::get('/jadwal-rapat/{jadwal}/undang', 'undangLagi');
		Route::get('/jadwal-rapat/{jadwal}/generate-code', 'genereteCode');
		Route::get('/jadwal-rapat/{jadwal}/notulensi', 'notulensi');
		Route::post('/jadwal-rapat/{jadwal}/notulensi', 'storeNotulensi');
		Route::post('/jadwal-rapat/{jadwal}/notulensi-update', 'updateNotulensi');
		Route::get('/jadwal-rapat/{dokumentasi}/hapus-file', 'destroyFile');
		Route::post('/jadwal-rapat/{jadwal}/tambah-undangan', 'tambahUndangan');
	});


	Route::controller(AdminPegawaiController::class)->group(function () {
		Route::get('/data-pegawai', 'index');
		Route::get('/data-pegawai/create', 'create');
		Route::get('/data-pegawai/{pegawai}/detail', 'show');
		Route::get('/data-pegawai/{pegawai}/delete', 'destroy');
		Route::get('/data-pegawai/{pegawai}/edit', 'edit');
		Route::put('/data-pegawai/{pegawai}/update', 'update');
		Route::post('/data-pegawai/create', 'store');
		Route::get('/data-pegawai/reset-semua', 'resetAll');
	});
	

	Route::controller(AdminOperatorController::class)->group(function () {
		Route::get('/akun-operator', 'index');
		Route::post('/akun-operator', 'store');
		Route::get('/akun-operator/{pegawai}/non-aktifkan', 'destroy');
	});
	Route::controller(AdminBidangController::class)->group(function () {
		Route::get('/data-bidang', 'index');
		Route::post('/data-bidang', 'store');
		Route::get('/data-bidang/{bidang}/delete', 'destroy');
	});

	Route::controller(AdminProfilController::class)->group(function () {
		Route::get('/ganti-password', 'index');
		Route::post('/ganti-password', 'update');
	});
	Route::controller(AdminHistoryController::class)->group(function () {
		Route::get('/history', 'index');
	});
	
});



Route::prefix('x')->middleware('auth:pegawai')->group(function () {
	Route::controller(PegawaiController::class)->group(function () {
		Route::get('beranda', 'beranda');
		Route::get('absensi', 'absensi');
		Route::post('absensi', 'absensiKirim');
	});

	Route::controller(PegawaiRapatController::class)->group(function () {
		Route::get('/jadwal-rapat', 'index');
		Route::get('/jadwal-rapat/create', 'create');
		Route::get('/jadwal-rapat/{jadwal}/pilih-pegawai', 'pilihPegawai');
		Route::post('/jadwal-rapat/{jadwal}/pilih-pegawai', 'kirimJadwal');
		Route::get('/jadwal-rapat/{jadwal}/detail', 'show');
		Route::post('/jadwal-rapat/create', 'store');
		Route::get('/jadwal-rapat/{jadwal}/undang', 'undangLagi');
		Route::get('/jadwal-rapat/{jadwal}/generate-code', 'genereteCode');
		Route::get('/jadwal-rapat/{jadwal}/notulensi', 'notulensi');
		Route::post('/jadwal-rapat/{jadwal}/notulensi', 'storeNotulensi');
		Route::post('/jadwal-rapat/{jadwal}/notulensi-update', 'updateNotulensi');
		Route::get('/jadwal-rapat/{dokumentasi}/hapus-file', 'destroyFile');
		Route::post('/jadwal-rapat/{jadwal}/tambah-undangan', 'tambahUndangan');
	});

	Route::controller(PegawaiHistoryController::class)->group(function () {
		Route::get('/history-rapat', 'index');
	});

	Route::controller(PegawaiProfilController::class)->group(function () {
		Route::get('/ganti-password', 'index');
		Route::post('/ganti-password', 'update');
	});
});