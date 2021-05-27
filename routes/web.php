<?php

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::resource('companies', App\Http\Controllers\CompanyController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
});

Auth::routes();
// (['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
