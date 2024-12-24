<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/product', [PageController::class, 'product'])->name('allproduct');

Route::get('/product/{slug}/{id}', [PageController::class, 'productdetail'])->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::get('/trasaction', [PageController::class, 'transaction'])->name('transaction');

    Route::resource('/address', AddressController::class);
    Route::post('/address/active/{id}', [AddressController::class, 'active'])->name('address.active');

    Route::resource('/cart', CartController::class);
    Route::post('/add-cart', [CartController::class, 'addcart'])->name('add.cart');

    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');
    Route::get('/checkout', [TransactionController::class, 'checkoutget'])->name('checkout.get');
    Route::post('/payment', [TransactionController::class, 'payment'])->name('payment');
    Route::post('/receive', [TransactionController::class, 'receive'])->name('receive');

    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('/admin/user', UserController::class);

    Route::resource('/admin/product', ProductController::class);

    Route::resource('/admin/transaction', TransactionController::class);

    Route::resource('/admin/product-gallery', ProductGalleryController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
