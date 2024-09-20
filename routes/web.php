<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [WalletController::class, 'index']);
Route::get('/home/account', [WalletController::class, 'account']);
Route::get('/home/account/transfer', [WalletController::class, 'transfer']);

Route::post('/addmoney', [AccountController::class, 'credit']);
Route::post('/withdraw', [AccountController::class, 'debit']);
Route::get('/home/account/transfer', [AccountController::class, 'showAccount']);
Route::post('/home/account/transfer', [AccountController::class, 'transfer'])->name('wallet.transfer');
Route::get('/home/statement', [AccountController::class, 'statement']);
