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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm']);
Route::get('/admin/home', [App\Http\Controllers\Admin\AdminController::class, 'adminIndex'])->name('admin.home');
Route::get('/admin/password-change', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('admin.password.change');
Route::post('/admin/password-update', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.password.update');

// ========================= Admin Section ======================
// Category
Route::prefix('admin')->group(function() {
    Route::get('/categories', [App\Http\Controllers\Admin\Category\CategoryController::class, 'category'])->name('categories');
    Route::post('/store/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'storeCategory'])->name('store.category');
    Route::get('/delete/category/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'deleteCategory'])->name('delete.category');
});
