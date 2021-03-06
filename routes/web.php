<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WishlistController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\WebsiteController;
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


/*
 *|---------------------------------------------------------------------|
 * <<=====================>> WEBSITE ROUTE LIST <<=====================>>
 *|---------------------------------------------------------------------|
 */

Route::get('/', [WebsiteController::class, 'home'])->name('website.home');
Route::get('/user-login', [WebsiteController::class, 'login'])->name('website.login');
Route::post('/user-access', [WebsiteController::class, 'login_access'])->name('website.user-access');
Route::post('/user-register', [WebsiteController::class, 'register'])->name('website.register');

// <<===== WISH LIST LIST ======>>
Route::group(['prefix' => 'wishlist', 'middleware' => 'auth'], function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/{slug}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::get('/delete/{slug}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

// <<===== ADD TO CART LIST ======>>
Route::group(['prefix' => 'cart','middleware' => 'auth'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/{slug}', [CartController::class, 'store'])->name('cart.store');
    Route::get('/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    // Coupon Apply
    Route::post('/coupon/apply', [CartController::class, 'coupon_apply'])->name('cart.coupon.apply');
    Route::get('/coupon/remove', [CartController::class, 'coupon_remove'])->name('cart.coupon.remove');
});


/*
 *|---------------------------------------------------------------------|
 * <<======================>> ADMIN ROUTE LIST <<======================>>
 *|---------------------------------------------------------------------|
*/
Route::get('/blank', [AdminController::class, 'blank'])->name('admin.blank');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/recycle-bin', [AdminController::class, 'recycle_bin'])->name('admin.recycle.bin');

    // <<===== USER ROUTE LIST ======>>
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index')->middleware('role_or_permission:user index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('role_or_permission:user create');
        Route::post('/', [UserController::class, 'store'])->name('user.store')->middleware('role_or_permission:user create');
        Route::get('/show/{slug}', [UserController::class, 'show'])->name('user.show')->middleware('role_or_permission:user show');
        Route::get('/edit/{slug}', [UserController::class, 'edit'])->name('user.edit')->middleware('role_or_permission:user edit');
        Route::put('/update/{slug}', [UserController::class, 'update'])->name('user.update')->middleware('role_or_permission:user edit');
        Route::get('/softdelete/{slug}', [UserController::class, 'softdelete'])->name('user.softdelete')->middleware('role_or_permission:user delete');
        Route::get('/delete/{slug}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/suspend/{slug}', [UserController::class, 'suspend'])->name('user.suspend');
    });

    // <<===== ROLE ROUTE LIST ======>>
    Route::get('/role', [AdminController::class, 'role_show'])->name('manage.role');
    Route::get('/role-permission/{role_id}', [AdminController::class, 'role_edit'])->name('manage.role.edit');
    Route::put('/role-permission/update/{role_id}', [AdminController::class, 'role_update'])->name('manage.role.update');


    // <<===== BASIC INFO ROUTE LIST ======>>
    Route::get('/basic-info', [ManageController::class, 'basic_index'])->name('manage.basic.index');
    Route::post('/basic-info', [ManageController::class, 'basic_update'])->name('manage.basic.update');

    // <<===== CONTACT INFO ROUTE LIST ======>>
    Route::get('/contact-info', [ManageController::class, 'contact_index'])->name('manage.contact.index');
    Route::post('/contact-info', [ManageController::class, 'contact_update'])->name('manage.contact.update');

    // <<===== SOCIAL MEDIA ROUTE LIST ======>>
    Route::get('/social-media', [ManageController::class, 'social_index'])->name('manage.social.index');
    Route::post('/social-media', [ManageController::class, 'socail_update'])->name('manage.social.update');

    // <<===== BANNER ROUTE LIST ======>>
    Route::group(['prefix' => 'banner'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/show/{slug}', [BannerController::class, 'show'])->name('banner.show');
        Route::get('/edit/{slug}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('/update/{slug}', [BannerController::class, 'update'])->name('banner.update');
        Route::get('/softdelete/{slug}', [BannerController::class, 'softdelete'])->name('banner.softdelete');
        Route::get('/delete/{slug}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });


    // <<===== PARTNER ROUTE LIST ======>>
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/', [PartnerController::class, 'index'])->name('partner.index');
        Route::get('/create', [PartnerController::class, 'create'])->name('partner.create');
        Route::post('/', [PartnerController::class, 'store'])->name('partner.store');
        Route::get('/show/{slug}', [PartnerController::class, 'show'])->name('partner.show');
        Route::get('/edit/{slug}', [PartnerController::class, 'edit'])->name('partner.edit');
        Route::put('/update/{slug}', [PartnerController::class, 'update'])->name('partner.update');
        Route::get('/softdelete/{slug}', [PartnerController::class, 'softdelete'])->name('partner.softdelete');
        Route::get('/delete/{slug}', [PartnerController::class, 'destroy'])->name('partner.destroy');
    });

    // <<===== PRODUCT ROUTE PREFIX LIST ======>>
    Route::group(['prefix' => 'product'], function () {
        // <<===== PRODUCT ROUTE LIST ======>>
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{slug}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{slug}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/softdelete/{slug}', [ProductController::class, 'softdelete'])->name('product.softdelete');
        Route::get('/delete/{slug}', [ProductController::class, 'destroy'])->name('product.destroy');

        // <<===== PRODUCT BRAND ROUTE LIST ======>>
        Route::group(['prefix' => 'brand'], function () {
            Route::get('/', [BrandController::class, 'index'])->name('brand.index');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create');
            Route::post('/', [BrandController::class, 'store'])->name('brand.store');
            Route::get('/show/{slug}', [BrandController::class, 'show'])->name('brand.show');
            Route::get('/edit/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
            Route::put('/update/{slug}', [BrandController::class, 'update'])->name('brand.update');
            Route::get('/softdelete/{slug}', [BrandController::class, 'softdelete'])->name('brand.softdelete');
            Route::get('/delete/{slug}', [BrandController::class, 'destroy'])->name('brand.destroy');
        });

        // <<===== PRODUCT CATEGORY ROUTE LIST ======>>
        Route::group(['prefix' => 'category'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/show/{slug}', [CategoryController::class, 'show'])->name('category.show');
            Route::get('/edit/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::put('/update/{slug}', [CategoryController::class, 'update'])->name('category.update');
            Route::get('/softdelete/{slug}', [CategoryController::class, 'softdelete'])->name('category.softdelete');
            Route::get('/delete/{slug}', [CategoryController::class, 'destroy'])->name('category.destroy');
        });

        // <<===== COUPON ROUTE LIST ======>>
        Route::group(['prefix' => 'coupon'], function () {
            Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
            Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
            Route::post('/', [CouponController::class, 'store'])->name('coupon.store');
            Route::get('/show/{slug}', [CouponController::class, 'show'])->name('coupon.show');
            Route::get('/edit/{slug}', [CouponController::class, 'edit'])->name('coupon.edit');
            Route::put('/update/{slug}', [CouponController::class, 'update'])->name('coupon.update');
            Route::get('/softdelete/{slug}', [CouponController::class, 'softdelete'])->name('coupon.softdelete');
            Route::get('/delete/{slug}', [CouponController::class, 'destroy'])->name('coupon.destroy');
        });

    });
});

require __DIR__ . '/auth.php';
