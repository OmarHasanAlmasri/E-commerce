<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProductController as CustomerProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('products', CustomerProductController::class)->name('products');

Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact_us');

Route::post('contact-us', [ContactUsController::class, 'store'])->name('contact_us.store');

Route::get('about-us', function () {
    return view('about_us');
})->name('about_us');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::view('login', 'admin.login')->middleware(['guest'])->name('login');

    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function() {
        // Authenticated routes
        Route::get('', DashboardController::class)->name('dashboard');

        // Product
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    });
});

// Restful routes

/* Products
 *
 * Get all products => GET => www.ecommerce.com/products
 * Get Single Product => GET => www.ecommerce.com/products/{id}
 * Create / store new product => POST => www.ecommerce.com/products (with data)
 * Delete product => delete => www.ecommerce.com/products/{id}
 * Edit => GET => www.ecommerce.com/products/{id}/edit => show the form to edit
 * update => PUT/Patch => www.ecommerce.com/products/{id} (with data)
 *
 *
 *
 * */
