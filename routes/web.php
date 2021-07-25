<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SirempongController;//import controller SirempongController
use App\Http\Controllers\DashboardController;//import controller DashboardController
use App\Http\Controllers\MasterCompanyController;//import controller MasterCompanyController
use App\Http\Controllers\MasterAdminController;//import controller MasterAdminController
use App\Http\Controllers\MasterUserController;//import controller MasterUserController
use App\Http\Controllers\MasterJenisController;//import controller MasterJenisController
use App\Http\Controllers\MasterProductController;//import controller MasterProductController
use App\Http\Controllers\MasterBankController;//import controller MasterBankController

use App\Http\Controllers\TransaksiSewaController;//import controller TransaksiSewaController
use App\Http\Controllers\TransaksiAdminListTransaksiController;//import controller TransaksiAdminListTransaksiController
use App\Http\Controllers\TransaksiAdminListSewaController;//import controller TransaksiAdminListSewaController

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

// Route::get('/', function () {
//     return view('sirempong');
// });

Route::get('/', [SirempongController::class, 'index']);//default 

//membuat group route
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){//apabila sudah login bisa akses dashboard, apabila belum maka kembali ke login
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');//default 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');//default 

    Route::get('/master/company', [MasterCompanyController::class,'index'])->name('company.index');// memanggil halaman index
    Route::get('/company/create', [MasterCompanyController::class,'create'])->name('company.create');// memanggil halaman create
    Route::get('/company/edit', [MasterCompanyController::class,'edit'])->name('company.edit');// memanggil halaman edit
    Route::post('/company/update', [MasterCompanyController::class,'update'])->name('company.update');// memanggil fungsi update
    Route::post('/company/store', [MasterCompanyController::class,'store'])->name('company.store');// memanggil fungsi store

    Route::get('/master/admin', [MasterAdminController::class,'index'])->name('admin.index');// memanggil halaman admin
    Route::post('/admin/store', [MasterAdminController::class,'store'])->name('admin.store');// memanggil fungsi store
    Route::post('/admin/update', [MasterAdminController::class,'update'])->name('admin.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/admin/delete', [MasterAdminController::class,'destroy'])->name('admin.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/master/user', [MasterUserController::class,'index'])->name('user.index');// memanggil halaman user
    Route::post('/user/store', [MasterUserController::class,'store'])->name('user.store');// memanggil fungsi store
    Route::post('/user/update', [MasterUserController::class,'update'])->name('user.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/user/delete', [MasterUserController::class,'destroy'])->name('user.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/master/jenis', [MasterJenisController::class,'index'])->name('jenis.index');// memanggil halaman jenis product
    Route::post('/jenis/store', [MasterJenisController::class,'store'])->name('jenis.store');// memanggil fungsi store
    Route::post('/jenis/update', [MasterJenisController::class,'update'])->name('jenis.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/jenis/delete', [MasterJenisController::class,'destroy'])->name('jenis.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/master/product', [MasterProductController::class,'index'])->name('product.index');// memanggil halaman product
    Route::post('/product/store', [MasterProductController::class,'store'])->name('product.store');// memanggil fungsi store
    Route::post('/product/update', [MasterProductController::class,'update'])->name('product.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/product/delete', [MasterProductController::class,'destroy'])->name('product.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/master/bank', [MasterBankController::class,'index'])->name('bank.index');// memanggil halaman index
    Route::post('/bank/store', [MasterBankController::class,'store'])->name('bank.store');// memanggil fungsi store
    Route::post('/bank/update', [MasterBankController::class,'update'])->name('bank.update');// memanggil fungsi update & tampilkan id nya
    Route::get('/bank/delete', [MasterBankController::class,'destroy'])->name('bank.delete');// memanggil halaman delete article & tampilkan id nya

    Route::get('/transaksi/sewa/home', [TransaksiSewaController::class, 'index'])->name('transaksi_sewa.index');// memanggil halaman index
    Route::get('/transaksi/sewa/create', [TransaksiSewaController::class,'create'])->name('transaksi_sewa.create');// memanggil halaman create
    Route::post('/transaksi/sewa/store', [TransaksiSewaController::class,'store'])->name('transaksi_sewa.store');// memanggil fungsi store
    Route::get('/transaksi/sewa/payment/{id}', [TransaksiSewaController::class,'bayar'])->name('transaksi_sewa.bayar');// memanggil halaman bayar
    Route::post('/transaksi/sewa/save', [TransaksiSewaController::class,'save'])->name('transaksi_sewa.save');// memanggil fungsi save
    Route::post('/transaksi/sewa/update', [TransaksiSewaController::class,'update'])->name('transaksi_sewa.update');// memanggil fungsi update
    Route::get('/transaksi/sewa/delete', [TransaksiSewaController::class,'destroy'])->name('transaksi_sewa.delete');// memanggil fungsi delete

    Route::get('/transaksi/admin/list-transaksi/home', [TransaksiAdminListTransaksiController::class, 'index'])->name('transaksi_admintransaksi.index');// memanggil halaman index
    Route::get('/transaksi/admin/list-transaksi/create/{id}', [TransaksiAdminListTransaksiController::class,'create'])->name('transaksi_admintransaksi.create');// memanggil halaman create
    Route::post('/transaksi/admin/list-transaksi/store', [TransaksiAdminListTransaksiController::class,'store'])->name('transaksi_admintransaksi.store');// memanggil fungsi store
    Route::post('/transaksi/admin/list-transaksi/update', [TransaksiAdminListTransaksiController::class,'update'])->name('transaksi_admintransaksi.update');// memanggil fungsi update
    Route::get('/transaksi/admin/list-transaksi/delete', [TransaksiAdminListTransaksiController::class,'destroy'])->name('transaksi_admintransaksi.delete');// memanggil fungsi delete

    Route::get('/transaksi/admin/list-sewa/home', [TransaksiAdminListSewaController::class, 'index'])->name('transaksi_adminsewa.index');// memanggil halaman index
    Route::get('/transaksi/admin/list-sewa/create/{id}', [TransaksiAdminListSewaController::class,'create'])->name('transaksi_adminsewa.create');// memanggil halaman create
    Route::post('/transaksi/admin/list-sewa/store', [TransaksiAdminListSewaController::class,'store'])->name('transaksi_adminsewa.store');// memanggil fungsi store
    Route::post('/transaksi/admin/list-sewa/update', [TransaksiAdminListSewaController::class,'update'])->name('transaksi_adminsewa.update');// memanggil fungsi update
    Route::get('/transaksi/admin/list-sewa/delete', [TransaksiAdminListSewaController::class,'destroy'])->name('transaksi_adminsewa.delete');// memanggil fungsi delete
});