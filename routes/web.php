<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransactionController;


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
    return view('login');
});
Route::get('/stok/mentah',[StocksController::class,'indexMentah'])->name('stok.mentah');
Route::get('/stok/jadi',[StocksController::class,'indexJadi'])->name('stok.jadi');
Route::get('/stok/setengah-jadi',[StocksController::class,'indexSetengahJadi'])->name('stok.setengah-jadi');

// stok crud
Route::post('/stok/update/{id}', [StocksController::class, 'update'])->name('stok.update');
Route::get('/stok/edit/{id}',[StocksController::class,'edit']);
Route::get('/stok/destroy/{id}',[StocksController::class,'destroy']);
Route::get('/stok/create/',[StocksController::class,'create'])->name('stok.create');
Route::post('/stok/store/',[StocksController::class,'store'])->name('stok.store');
Route::get('/stok/show/{id}',[StocksController::class,'show'])->name('stok.show');


//data stok
Route::get('/data-stocks/{category}',[StocksController::class,'getStocks'])->name('stocks.data');

// request-order
Route::get('/request_order/',[TransactionController::class,'requestOrder'])->name('request.order');
Route::get('/request_order/add',[TransactionController::class,'add'])->name('requestOrderAdd');
Route::post('/request_order/add/{id_nota}',[TransactionController::class,'createNota'])->name('create.nota');

// data request order
Route::get('/request_order/data',[TransactionController::class,'getRequestOrderData'])->name('requestOrder.data');


// purchase crud
Route::get('/purchase/add/{id_nota}',[PurchaseController::class,'addPurchase'])->name('purchase.add');
Route::get('/purchase/{id_nota}',[PurchaseController::class,'purchaseList'])->name('purchase.list');
Route::post('/purchase/create/{id_nota}',[PurchaseController::class,'createPurchase'])->name('purchase.create');


// data purchase
Route::get('/purchase/data/{id_nota}',[PurchaseController::class,'getPurchaseData'])->name('purchase.data');

// data stock name
Route::get('/purchase/stock_name/data/{category}',[PurchaseController::class,'getStockNameData'])->name('stock.name.data');











