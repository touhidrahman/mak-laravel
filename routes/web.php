<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubcategoryController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FeaturedImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/maint', [HomeController::class, 'maint'])->name('maintenance'); // temp
Route::get('/home', [HomeController::class, 'index']); // temp
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/service', [HomeController::class, 'services'])->name('services');
Route::get('/b2b', [HomeController::class, 'b2b'])->name('b2b');
Route::get('/products/{product:slug}', [HomeController::class, 'productDetails'])->name('product.details');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.items.add');
Route::post('cart-change/{id}/ajax', [CartController::class, 'changeQty'])->name('cart.items.change');
Route::post('cart/{id}/items/{cartItemId}/del', [CartController::class, 'deleteFromCart'])->name('cart.items.delete');
Route::post('cart/{id}/items/{cartItemId}/dec', [CartController::class, 'reduceQty'])->name('cart.items.reduce');
Route::post('cart/{id}/items/{cartItemId}/inc', [CartController::class, 'increaseQty'])->name('cart.items.increase');

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout-success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
Route::get('/checkout-cancel', [CheckoutController::class, 'checkoutCancel'])->name('checkout.cancel');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::get('password/confirm', Confirm::class)->name('password.confirm');
    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::get('account/orders', [AccountController::class, 'orders'])->name('account.orders');
    Route::get('account/orders/{order}', [AccountController::class, 'show'])->name('account.orders.show');

    Route::post('logout', LogoutController::class)->name('logout');
});

Route::middleware('admin')->group(function() {
    Route::get('admin', function () {
        return view('admin.dashboard');
    })->name('admin');

    Route::get('admin/products', [ProductsController::class, 'index'])->name('admin.products');
    Route::get('admin/products/create', [ProductsController::class, 'show'])->name('admin.products.show');
    Route::post('admin/products', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::delete('admin/products/{product}', [ProductsController::class, 'delete'])->name('admin.products.delete');
    Route::get('admin/products/{product}/edit', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::patch('admin/products/{product}', [ProductsController::class, 'update'])->name('admin.products.update');
    Route::get('admin/products/{product}/thumbs', [ProductImagesController::class, 'thumbnails'])->name('admin.products.showThumbnails');
    Route::post('admin/products/{product}/thumbs', [ProductImagesController::class, 'uploadThumbnails'])->name('admin.products.uploadThumbnails');
    Route::get('admin/products/{product}/images', [ProductImagesController::class, 'images'])->name('admin.products.images');
    Route::post('admin/products/{product}/images', [ProductImagesController::class, 'uploadImages'])->name('admin.products.uploadImages');
    Route::delete('admin/products/{productId}/images/{imageId}', [ProductImagesController::class, 'deleteImage'])->name('admin.products.deleteImage');
    Route::get('admin/products/{product}/manage', [ProductsController::class, 'showManageForm'])->name('admin.products.showManageForm');
    Route::post('admin/products/{product}/manage', [ProductsController::class, 'manage'])->name('admin.products.manage');

    Route::post('admin/products/{product}/stocks', [StockController::class, 'store'])->name('admin.stocks.store');
    Route::get('admin/products/{product_id}/stocks/{id}', [StockController::class, 'edit'])->name('admin.stocks.edit');
    Route::post('admin/products/{product_id}/stocks/{id}', [StockController::class, 'update'])->name('admin.stocks.update');

    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('admin/orders/{id}', [OrderController::class, 'manage'])->name('admin.orders.manage');
    Route::post('admin/orders/{id}/item/{orderItemId}', [OrderController::class, 'pick'])->name('admin.orders.pick');
    Route::post('admin/orders/{id}/status', [OrderController::class, 'changeStatus'])->name('admin.orders.change-status');

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

    Route::get('admin/colors', [ColorController::class, 'index'])->name('admin.colors');
    Route::post('admin/colors', [ColorController::class, 'store'])->name('admin.colors.store');
    Route::delete('admin/colors/{color}', [ColorController::class, 'destroy'])->name('admin.colors.destroy');

    Route::get('admin/charges', [ChargeController::class, 'index'])->name('admin.charges');
    Route::post('admin/charges', [ChargeController::class, 'store'])->name('admin.charges.store');
    Route::put('admin/charges/{charge}', [ChargeController::class, 'update'])->name('admin.charges.update');

    Route::get('admin/featured-images', [FeaturedImageController::class, 'index'])->name('admin.featured-images');
    Route::get('admin/featured-images/create', [FeaturedImageController::class, 'show'])->name('admin.featured-images.show');
    Route::post('admin/featured-images', [FeaturedImageController::class, 'store'])->name('admin.featured-images.store');
    Route::get('admin/featured-images/{id}', [FeaturedImageController::class, 'edit'])->name('admin.featured-images.edit');
    Route::post('admin/featured-images/{id}', [FeaturedImageController::class, 'update'])->name('admin.featured-images.update');
    Route::delete('admin/featured-images/{id}', [FeaturedImageController::class, 'destroy'])->name('admin.featured-images.destroy');

});

Route::stripeWebhooks('webhook');
