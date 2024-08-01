<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoriController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukInventoriController;
use App\Http\Controllers\ProdukKategoriController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplierProdukController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Models\Transaksi;
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
//     return view('index')->with(['title' => 'Laundry']);
// });


Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::controller(UserRoleController::class)->group(function () {
        Route::get('userRole', 'index');
        Route::get('userRole/create', 'create');
        Route::post('userRole', 'store');
        Route::get('userRole/edit/{id}', 'edit');
        Route::put('userRole/{id}', 'update');
        Route::delete('userRole/{id}', 'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user');
        Route::get('user/create', 'create');
        Route::post('user', 'store');
        Route::get('user/edit/{id}', 'edit');
        Route::put('user/{id}', 'update');
        Route::delete('user/{id}', 'destroy');
    });


    Route::controller(ProdukKategoriController::class)->group(function () {
        Route::get('produkKategori', 'index')->name('kategori');
        Route::post('produkKategori', 'store');
        Route::post('produkKategoriUpdate', 'updateKategori');
        Route::get('produkKategori/{id}', 'produkKategoriJSON');
        Route::put('produkKategori/{id}', 'update');
        Route::delete('produkKategori/{id}', 'destroy');
        Route::get('produkKateori/produk/{id}', 'showProduk');
        Route::get('produkKateori/listProdukPrint/{id}', 'listProdukPrint');
    });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('produk', 'index')->name('produk');
        Route::get('produk/create', 'create');
        Route::post('produk', 'store');
        Route::get('produk/edit/{id}', 'edit');
        Route::put('produk/{id}', 'update');
        Route::delete('produk/{id}', 'destroy');

        Route::get('produk/tambahStokById/{id}', 'addStokById');


        Route::get('produk/tambahStokByBarcode', 'addStokByBarcode');

        Route::post('produk/prosesTambahStok', 'storeStok');



        //Route for json output using jqury

        Route::get('produk/getProdukByBarcode/{id}', 'getProdukByBarcode');


        Route::get('produk/hargaBeli/{id}', 'hargaBeli');
        Route::get('produk/historyStok/{id}', 'historyStok');
        Route::get('produk/supplier/{id}', 'supplier');
        Route::post('produk/prosesKurangStok', 'storeKurangStok');
        Route::GET('produk/produkTerlaris', 'produkTerlaris');
        Route::GET('produk/produkTerlarisPrint/{id}', 'produkTerlarisPrint');






        // Route::get('produk/inventori/{id}', 'inventori');
    });

    Route::controller(ProdukInventoriController::class)->group(function () {
        Route::get('produkInventori/inventori/{id}', 'show');

        // Route::get('produkInventori', 'index')->name('produk');
        Route::get('produkInventori/create/{id}', 'create');
        Route::post('produkInventori', 'store');
        Route::put('produkInventori/updateStokIn/{id}', 'updateStokIn');
        Route::put('produkInventori/updateStokOut/{id}', 'updateStokOut');
        Route::get('produkInventori/edit/{id}', 'edit');
        Route::put('produkInventori/{id}', 'update');

        // Route::delete('produkInventori/{id}', 'destroy');



    });

    Route::controller(InventoriController::class)->group(function () {
        Route::get('inventori/{id}', 'show');
    });


    Route::controller(SupplierController::class)->group(function () {
        Route::get('supplier', 'index')->name('supplier');
        Route::get('supplier/create', 'create');
        Route::post('supplier', 'store');
        Route::get('supplier/edit/{id}', 'edit');
        Route::get('supplier/produk/{id}', 'produk');
        Route::put('supplier/{id}', 'update');
        Route::delete('supplier/{id}', 'destroy');
    });

    Route::controller(SupplierProdukController::class)->group(function () {
        Route::get('supplierProduk', 'index')->name('supplier-produk');
        Route::get('supplierProduk/create', 'create');
        Route::post('supplierProduk', 'store');
        Route::get('supplierProduk/edit/{id}', 'edit');

        Route::put('supplierProduk/{id}', 'update');
        Route::delete('supplierProduk/{id}', 'destroy');
    });




    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'index')->name('transaksi');
        Route::get('transaksi/item/{id}', 'item');
        Route::get('transaksi/create', 'create');
        Route::post('transaksi/createTemp', 'storeItemTemp');
        Route::delete('transaksi/deleteItem/{id}', 'destroyItemTemp');
        Route::put('transaksi/updateItemTemp/{id}', 'updateItemTemp');
        Route::post('transaksi/save', 'save');
        Route::get('transaksi/reset', 'reset');

        Route::get('transaksi/updateMetodePembayaran/{id}', 'updateMetodePembayaran');
        Route::get('transaksi/createTempByBarcode/{id}', 'storeItemTempByBarcode');
        Route::get('transaksi/createTempByBarcodeScanner/{id}', 'createTempByBarcodeScanner');
        // Route::put('transaksi/{id}', 'update');

        // Route::delete('transaksi/{id}', 'destroy');
    });


    Route::controller(JurnalController::class)->group(function () {
        Route::get('jurnal', 'index')->name('jurnal');
        Route::get('jurnal/create', 'create');
        Route::get('jurnal/test', 'test');
        Route::post('jurnal/storeJurnal', 'storeJurnal');







        Route::get('jurnal/akun', 'akun');
        Route::post('jurnal/storeAkun', 'storeAkun');
        Route::put('jurnal/updateAkun/{id}', 'updateAkun');


        Route::get('jurnal/kategori', 'kategori');
        Route::post('jurnal/storeKategori', 'storeKategori');
        Route::put('jurnal/updateKategori/{id}', 'udpateKategori');
        // sdsd

        // Route::delete('transaksi/{id}', 'destroy');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::get('laporan/pendapatan', 'pendapatan');
        Route::get('laporan/pembelian', 'pembelian');
        Route::post('laporan/ambilBelanja', 'ambilBelanja');
    });
});

Route::get('/reset', [ResetController::class, 'index'])->name('reset');
