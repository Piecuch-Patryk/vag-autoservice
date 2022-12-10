<?php

use App\Http\Controllers\Auth\UpdateUserController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
  // User
  Route::post('/user/update/{id}', [UpdateUserController::class, 'update'])->name('user.update');

});

// Route::controller(OrderController::class)->group(function () {
//   Route::get('/orders/{id}', 'show');
//   Route::post('/orders', 'store');
// });
