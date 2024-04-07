<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InstaController;
use Illuminate\Support\Facades\Auth;

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

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/', [FrontController::class, 'index'])->name('home');


Route::get('/product/{id}/{slug}', [FrontController::class, 'product'])->name('product');
Route::get('/category/{id}/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/page/{slug}', [FrontController::class, 'page'])->name('page');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin_index');
    Route::get('/home', [AdminController::class, 'index'])->name('admin_home');

    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/get_category', [AdminController::class, 'get_category'])->name('admin.get_category');
    Route::get('/add_category', [AdminController::class, 'add_category'])->name('admin.add_category');
    Route::post('/save_category', [AdminController::class, 'save_category'])->name('admin.save_category');
    Route::get('/edit_category/{category_id}', [AdminController::class, 'edit_category'])->name('admin.edit_category');
    Route::post('/update_category', [AdminController::class, 'update_category'])->name('admin.update_category');
    
    Route::get('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/get_store', [AdminController::class, 'get_store'])->name('admin.get_store');
    Route::get('/add_store', [AdminController::class, 'add_store'])->name('admin.add_store');
    Route::post('/save_store', [AdminController::class, 'save_store'])->name('admin.save_store');
    Route::get('/edit_store/{store_id}', [AdminController::class, 'edit_store'])->name('admin.edit_store');
    Route::post('/update_store', [AdminController::class, 'update_store'])->name('admin.update_store');
    Route::get('/store_links/{store_id}', [AdminController::class, 'store_links'])->name('admin.store_links');
    Route::post('/save_store_links', [AdminController::class, 'save_store_links'])->name('admin.save_store_links');
    
    Route::get('/product', [AdminController::class, 'product'])->name('admin.product');
    Route::get('/get_product', [AdminController::class, 'get_product'])->name('admin.get_product');
    Route::get('/add_product', [AdminController::class, 'add_product'])->name('admin.add_product');
    Route::post('/save_product', [AdminController::class, 'save_product'])->name('admin.save_product');
    Route::get('/edit_product/{product_id}', [AdminController::class, 'edit_product'])->name('admin.edit_product');
    Route::post('/update_product', [AdminController::class, 'update_product'])->name('admin.update_product');
    Route::delete('/delete_product_image/{id}', [AdminController::class, 'delete_product_image'])->name('admin.delete_product_image');
    Route::delete('/delete_product_attribute/{id}', [AdminController::class, 'delete_product_attribute'])->name('admin.delete_product_attribute');

    Route::get('/add_product_widget/{product_id}', [AdminController::class, 'add_product_widget'])->name('admin.add_product_widget');
    Route::post('/save_product_widget', [AdminController::class, 'save_product_widget'])->name('admin.save_product_widget');

    Route::post('ck_product_upload', [AdminController::class, 'ck_product_upload'])->name('admin.ck_product_upload');

    Route::get('/insta_account', [InstaController::class, 'insta_account'])->name('admin.insta_account');
    Route::get('/get_insta_account', [InstaController::class, 'get_insta_account'])->name('admin.get_insta_account');
    Route::get('/add_insta_account', [InstaController::class, 'add_insta_account'])->name('admin.add_insta_account');
    Route::post('/save_insta_account', [InstaController::class, 'save_insta_account'])->name('admin.save_insta_account');
    Route::get('/edit_insta_account/{insta_account_id}', [InstaController::class, 'edit_insta_account'])->name('admin.edit_insta_account');
    Route::post('/update_insta_account', [InstaController::class, 'update_insta_account'])->name('admin.update_insta_account');
    Route::get('/delete_insta_account/{insta_account_id}', [InstaController::class, 'delete_insta_account'])->name('admin.delete_insta_account');
    
});
