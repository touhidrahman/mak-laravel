<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SubsubcategoryController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

// Route::middleware('admin')->group(function() {
    Route::get('admin', function () {
        return view('admin.dashboard');
    })->name('admin');

    Route::get('admin/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('admin/products/create', [ProductsController::class, 'show'])->name('admin.products.show');
    Route::post('admin/products/create', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}/upload', [ProductsController::class, 'showUploadForm'])->name('admin.products.showUploadForm');
    Route::post('admin/products/{product}/upload', [ProductsController::class, 'uploadImages'])->name('admin.products.uploadImages');
    Route::get('admin/products/{product}/manage', [ProductsController::class, 'showManageForm'])->name('admin.products.showManageForm');
    Route::post('admin/products/{product}/manage', [ProductsController::class, 'manage'])->name('admin.products.manage');

    Route::post('admin/products/{product}/stocks', [StockController::class, 'store'])->name('admin.stocks.store');
    Route::get('admin/products/{product_id}/stocks/{id}', [StockController::class, 'edit'])->name('admin.stocks.edit');
    Route::post('admin/products/{product_id}/stocks/{id}', [StockController::class, 'update'])->name('admin.stocks.update');

    Route::get('admin/categories', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('admin/categories/create', [CategoriesController::class, 'show'])->name('admin.categories.show');
    Route::post('admin/categories/create', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('admin/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('admin/categories/{category}/edit', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('admin.categories.delete');
    Route::get('admin/categories/ajax/{category}', [CategoriesController::class, 'ajaxGetSubcategories']);

    Route::get('admin/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
    Route::get('admin/subcategories/create', [SubcategoryController::class, 'show'])->name('admin.subcategories.show');
    Route::post('admin/subcategories/create', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::post('admin/subcategories/{subcategory}/edit', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::delete('admin/subcategories/{subcategory}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.delete');
    Route::get('admin/subcategories/ajax/{subcategory}', [SubcategoryController::class, 'ajaxGetSubsubcategories']);

    Route::get('admin/subsubcategories', [SubsubcategoryController::class, 'index'])->name('admin.subsubcategories');
    Route::get('admin/subsubcategories/create', [SubsubcategoryController::class, 'show'])->name('admin.subsubcategories.show');
    Route::post('admin/subsubcategories/create', [SubsubcategoryController::class, 'store'])->name('admin.subsubcategories.store');
    Route::get('admin/subsubcategories/{subsubcategory}/edit', [SubsubcategoryController::class, 'edit'])->name('admin.subsubcategories.edit');
    Route::post('admin/subsubcategories/{subsubcategory}/edit', [SubsubcategoryController::class, 'update'])->name('admin.subsubcategories.update');
    Route::delete('admin/subsubcategories/{subsubcategory}', [SubsubcategoryController::class, 'destroy'])->name('admin.subsubcategories.delete');

    Route::get('admin/settings', [ColorController::class, 'index'])->name('admin.settings');

    Route::post('admin/colors', [ColorController::class, 'store'])->name('admin.colors.store');
    Route::delete('admin/colors/{color}', [ColorController::class, 'destroy'])->name('admin.colors.destroy');

// });
