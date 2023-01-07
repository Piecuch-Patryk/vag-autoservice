<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\UpdateUserController;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;

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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
  // User
  Route::post('/user/update/{id}', [UpdateUserController::class, 'update'])->name('user.update');

  // Company
  Route::controller(CompanyController::class)->group(function() {
    Route::get('/edit', 'edit')->name('company.edit');
    Route::put('/update/{id}', 'update')->name('company.update');
  });

  // Invoice
  Route::controller(InvoiceController::class)->group(function() {
    Route::get('/create-invoice', 'create')->name('invoice.create');
    Route::post('/create-invoice', 'store')->name('invoice.store');
    Route::post('/search-invoice', 'search')->name('invoice.search');
    Route::get('/invoices', 'index')->name('invoice.index');
    Route::get('/invoice/edit/{id}', 'edit')->name('invoice.edit');
    Route::get('/invoice-download/{id}', 'download')->name('invoice.download');
    Route::put('/invoice/{id}', 'update')->name('invoice.update');
    Route::delete('/invoice/{id}', 'destroy')->name('invoice.destroy');
  });

  // Category
  Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'index')->name('category.index');
    Route::get('/categories/order', 'editOrder')->name('category.editOrder');
    Route::put('/categories', 'updateOrder')->name('category.updateOrder');
    Route::get('/category/{id}', 'edit')->name('category.edit');
    Route::post('/category', 'store')->name('category.store');
    Route::put('/category/{id}', 'update')->name('category.update');
    Route::delete('/category/{id}', 'destroy')->name('category.destroy');
  });

  // Product
  Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index')->name('product.index');
    Route::get('/product-edit/{id}', 'edit')->name('product.edit');
    Route::put('/product/{id}', 'update')->name('product.update');
    Route::get('/product/{id}', 'create')->name('product.create');
    Route::post('/product', 'store')->name('product.store');
    Route::delete('/product/{id}', 'destroy')->name('product.destroy');
  });

  // Review
  Route::controller(ReviewController::class)->group(function() {
    Route::get('/reviews', 'index')->name('review.index');
    Route::delete('/review/{id}', 'destroy')->name('review.delete');
  });

  // Part
  Route::controller(PartController::class)->group(function() {
    Route::get('/parts', 'index')->name('part.index');
    Route::get('/create-part', 'create')->name('part.create');
    Route::get('/edit-part/{id}', 'edit')->name('part.edit');
    Route::post('/create-part', 'store')->name('part.store');
    Route::put('/part/{id}', 'update')->name('part.update');
    Route::delete('/part/{id}', 'destroy')->name('part.delete');
  });
});

Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
Route::post('/search', [FrontendController::class, 'search'])->name('frontend.search');
Route::get('/download/{id}', [FrontendController::class, 'download'])->name('frontend.download');
Route::post('email', [EmailController::class, 'contact'])->name('email.contact');