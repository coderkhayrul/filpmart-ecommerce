<?php

use App\Http\Controllers\Admin\AdminController;
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


// |---------------------------------------------------------------------|
// <<=====================>> WEBSITE ROUTE LIST <<=====================>>
// |---------------------------------------------------------------------|
Route::get('/', [WebsiteController::class, 'home'])->name('website.home');

// |---------------------------------------------------------------------|
// <<=====================>> ADMIN ROUTE LIST <<=====================>>
// |---------------------------------------------------------------------|
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {

    Route::get('/',[ AdminController::class, 'dashboard' ])->name('admin.dashboard');
    Route::get('/blank',[ AdminController::class, 'blank' ])->name('admin.blank');

    Route::group(['prefix' => 'user'], function() {

        // <<===== USER ROUTE LIST ======>>
        Route::get('/',[ UserController::class, 'index' ])->name('user.index');
        Route::get('/create',[ UserController::class, 'create' ])->name('user.create');
        Route::post('/',[ UserController::class, 'store' ])->name('user.store');
        Route::get('/show/{id}',[ UserController::class, 'show' ])->name('user.show');
        Route::get('/edit/{id}',[ UserController::class, 'edit' ])->name('user.edit');
        Route::put('/update/{id}',[ UserController::class, 'update' ])->name('user.update');
        Route::get('/softdelete/{id}',[ UserController::class, 'softdelete' ])->name('user.softdelete');
        Route::get('/delete{id}',[ UserController::class, 'destroy' ])->name('user.destroy');
        Route::get('/delete{id}',[ UserController::class, 'suspend' ])->name('user.suspend');
    });
});

require __DIR__.'/auth.php';
