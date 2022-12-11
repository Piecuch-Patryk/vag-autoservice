<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\InvoiceController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
  // User
  Route::post('/user/update/{id}', [UpdateUserController::class, 'update'])->name('user.update');

  // Company
  Route::controller(CompanyController::class)->group(function() {
    Route::get('/edit', 'edit')->name('company.edit');
    Route::post('/update/{id}', 'update')->name('company.update');
  });

  // Invoice
  Route::controller(InvoiceController::class)->group(function() {
    Route::get('/create-invoice', 'create')->name('invoice.create');
    Route::post('/create-invoice', 'store')->name('invoice.store');
  });


});