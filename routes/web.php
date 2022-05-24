<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\UserController;
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

/*
 *|---------------------------------------------------------------------|
 * <<======================>> ADMIN ROUTE LIST <<======================>>
 *|---------------------------------------------------------------------|
*/
Route::get('/blank',[ AdminController::class, 'blank' ])->name('admin.blank');

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');

    // <<===== USER ROUTE LIST ======>>
    Route::group(['prefix' => 'user'], function() {
        Route::get('/',[ UserController::class, 'index' ])->name('user.index');
        Route::get('/create',[ UserController::class, 'create' ])->name('user.create');
        Route::post('/',[ UserController::class, 'store' ])->name('user.store');
        Route::get('/show/{slug}',[ UserController::class, 'show' ])->name('user.show');
        Route::get('/edit/{slug}',[ UserController::class, 'edit' ])->name('user.edit');
        Route::put('/update/{slug}',[ UserController::class, 'update' ])->name('user.update');
        Route::get('/softdelete/{slug}',[ UserController::class, 'softdelete' ])->name('user.softdelete');
        Route::get('/delete/{slug}',[ UserController::class, 'destroy' ])->name('user.destroy');
        Route::get('/suspend/{slug}',[ UserController::class, 'suspend' ])->name('user.suspend');
    });

    // <<===== BASIC INFO ROUTE LIST ======>>
    Route::get('/basic-info',[ ManageController::class, 'basic_index' ])->name('manage.basic.index');
    Route::post('/basic-info',[ ManageController::class, 'basic_update' ])->name('manage.basic.update');

    // <<===== CONTACT INFO ROUTE LIST ======>>
    Route::get('/contact-info',[ ManageController::class, 'contact_index' ])->name('manage.contact.index');
    Route::post('/contact-info',[ ManageController::class, 'contact_update' ])->name('manage.contact.update');

    // <<===== SOCIAL MEDIA ROUTE LIST ======>>
    Route::get('/social-media',[ ManageController::class, 'social_index' ])->name('manage.social.index');
    Route::post('/social-media',[ ManageController::class, 'socail_update' ])->name('manage.social.update');

    // <<===== BANNER ROUTE LIST ======>>
    Route::group(['prefix' => 'banner'], function() {
        Route::get('/',[ BannerController::class, 'index' ])->name('banner.index');
        Route::get('/create',[ BannerController::class, 'create' ])->name('banner.create');
        Route::post('/',[ BannerController::class, 'store' ])->name('banner.store');
        Route::get('/show/{slug}',[ BannerController::class, 'show' ])->name('banner.show');
        Route::get('/edit/{slug}',[ BannerController::class, 'edit' ])->name('banner.edit');
        Route::put('/update/{slug}',[ BannerController::class, 'update' ])->name('banner.update');
        Route::get('/softdelete/{slug}',[ BannerController::class, 'softdelete' ])->name('banner.softdelete');
        Route::get('/delete/{slug}',[ BannerController::class, 'destroy' ])->name('banner.destroy');
    });

});

require __DIR__.'/auth.php';
