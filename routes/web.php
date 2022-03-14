<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

// Route::get('/index', function () {
//     return view('allcategory');
// });
Route::get('/', [AdminController::class,'index']);
Route::post('/login',[AdminController::class,'login'])->name('login');
Route::middleware(['protectedpages'])->group(function () {
 //dashbord
Route::get('/dashboard', [AdminController::class,'dashboard']);

//Category
Route::get('/add-category', [CategoryController::class,'index']);
Route::post('/add-category',[CategoryController::class,'addCategory'])->name('addCategory');
Route::get('/view-category',[CategoryController::class,'getAll']);
// Route::get('/delete-categories/{id}', [CategoryController::class, 'delete'])->name('categories.delete');

Route::get('categories/{id}',[CategoryController::class, 'delete'])->name('categories.destroy');
Route::get('edit-category/{id}',[CategoryController::class,'edit']);
Route::post('update-category/{id}',[CategoryController::class,'update'])->name('update');
//
Route::get('/add-product', [ProductController::class,'index']);
Route::post('/add-product',[ProductController::class,'addProduct'])->name('add_product');
Route::get('/view-product',[ProductController::class,'getAll']);
Route::get('deleteproduct/{id}',[ProductController::class,'deleteProduct'])->name('products.destroy');
Route::get('edit-product/{id}',[ProductController::class,'showProduct']);
Route::post('/update-product/{id}',[ProductController::class,'editProduct'])->name('update-product');
});
