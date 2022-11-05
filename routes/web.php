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

// Frontend Routes
Route::post('store/newsletter', [App\Http\Controllers\FrontendController::class, 'storeNewsletter'])->name('store.newsletter');

// Admin Routes
Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'showLoginForm']);
Route::get('/admin/home', [App\Http\Controllers\Admin\AdminController::class, 'adminIndex'])->name('admin.home');
Route::get('/admin/password-change', [App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('admin.password.change');
Route::post('/admin/password-update', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('admin.password.update');

// ========================= Admin Section ======================

Route::prefix('admin')->group(function() {
    // Category Routes
    Route::get('/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'category'])->name('category');
    Route::post('/store/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'storeCategory'])->name('store.category');
    Route::post('/update/category', [App\Http\Controllers\Admin\Category\CategoryController::class, 'updateCategory'])->name('update.category');
    Route::get('/delete/category/{id}', [App\Http\Controllers\Admin\Category\CategoryController::class, 'deleteCategory'])->name('delete.category');

    // Brand Routes
    Route::get('/brand', [App\Http\Controllers\Admin\Category\BrandController::class, 'brand'])->name('brand');
    Route::post('/store/brand', [App\Http\Controllers\Admin\Category\BrandController::class, 'storeBrand'])->name('store.brand');
    Route::get('/edit/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'editBrand'])->name('edit.brand');
    Route::post('/update/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'updateBrand'])->name('update.brand');
    Route::get('/delete/brand/{id}', [App\Http\Controllers\Admin\Category\BrandController::class, 'deleteBrand'])->name('delete.brand');

    // Sub Category Routes
    Route::get('sub/category', [App\Http\Controllers\Admin\Category\SubCateoryController::class, 'subCategory'])->name('subCategory');
    Route::post('store/sub/category', [App\Http\Controllers\Admin\Category\SubCateoryController::class, 'storeSubCategory'])->name('store.subCategory');
    Route::get('edit/sub/category/{id}', [App\Http\Controllers\Admin\Category\SubCateoryController::class, 'editSubCategory'])->name('edit.subCategory');
    Route::post('update/sub/category/{id}', [App\Http\Controllers\Admin\Category\SubCateoryController::class, 'updateSubCategory'])->name('update.SubCategory');
    Route::get('delete/sub/category/{id}', [App\Http\Controllers\Admin\Category\SubCateoryController::class, 'deleteSubCategory'])->name('delete.SubCategory');

    // Coupon Routes
    Route::get('coupons', [App\Http\Controllers\Admin\CouponController::class, 'coupons'])->name('coupons');
    Route::post('store/coupon', [App\Http\Controllers\Admin\CouponController::class, 'storeCoupon'])->name('store.coupon');
    Route::get('edit/coupon/{id}', [App\Http\Controllers\Admin\CouponController::class, 'editCoupon'])->name('edit.coupon');
    Route::post('update/coupon/{id}', [App\Http\Controllers\Admin\CouponController::class, 'updateCoupon'])->name('update.coupon');
    Route::get('delete/coupon/{id}', [App\Http\Controllers\Admin\CouponController::class, 'deleteCoupon'])->name('delete.coupon');

    // Product Routes
    Route::get('product/all', [App\Http\Controllers\Admin\ProductController::class, 'productAll'])->name('all.product');
    Route::get('product/add', [App\Http\Controllers\Admin\ProductController::class, 'productAdd'])->name('add.product');
    Route::post('product/store', [App\Http\Controllers\Admin\ProductController::class, 'productStore'])->name('store.product');
    Route::get('delete/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('edit/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('update/product/withoutImage/{id}', [App\Http\Controllers\Admin\ProductController::class, 'updateProductWithoutImage'])->name('update.product.without.image');
    Route::post('update/product/withImage/{id}', [App\Http\Controllers\Admin\ProductController::class, 'updateProductWithImage'])->name('update.product.with.image');

    Route::get('/get/subcategory/{category_id}', [App\Http\Controllers\Admin\ProductController::class, 'getSubcategory']);

    Route::get('inactive/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'inActiveProduct'])->name('inactive.product');
    Route::get('active/product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'activeProduct'])->name('active.product');

    // Post Category Routes
    Route::get('post/categories', [App\Http\Controllers\Admin\PostCategoryController::class, 'postCategories'])->name('all.post.category');
    Route::post('store/post/category', [App\Http\Controllers\Admin\PostCategoryController::class, 'postCategoryStore'])->name('post.category.store');
    Route::post('update/post/category/{id}', [App\Http\Controllers\Admin\PostCategoryController::class, 'postCategoryUpdate'])->name('post.category.update');
    Route::get('delete/post/category/{id}', [App\Http\Controllers\Admin\PostCategoryController::class, 'postCategoryDelete'])->name('post.category.delete');

    // Post Routes
    Route::get('get/all/post', [App\Http\Controllers\Admin\PostController::class, 'getAllPost'])->name('get.all.post');
    Route::get('add/post', [App\Http\Controllers\Admin\PostController::class, 'postAdd'])->name('add.post');
    Route::post('store/post', [App\Http\Controllers\Admin\PostController::class, 'postStore'])->name('store.post');

    // Newsletter List Routes
    Route::get('newsletters', [App\Http\Controllers\Admin\NewsletterController::class, 'newsletters'])->name('newsletters');
    Route::get('delete/newsletter/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'deleteNewsletter'])->name('delete.newsletter');
});
