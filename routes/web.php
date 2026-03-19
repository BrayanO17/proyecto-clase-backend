<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;


Route::get('/', HomeController::class);

Route::prefix("/product")->controller(ProductController::class)->group(function(){
    Route::get('/', "index")->name("product.index");
    Route::get('/create', "create");
    Route::post('/store', "store")->name("product.store");
    Route::get('/{id}', "show")->name("product.show");
    Route::delete('/{product}', "destroy")->name("product.destroy");

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class)
         ->except(['show']);
});

Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add/{productId}', 'add')->name('add');
    Route::patch('/update/{productId}', 'update')->name('update');
    Route::delete('/remove/{productId}', 'remove')->name('remove');
    Route::delete('/clear', 'clear')->name('clear');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class)->except(['show']);
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
});