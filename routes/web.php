<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;


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