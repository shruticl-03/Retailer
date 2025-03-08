<?php

use App\Http\Controllers\PanShopController;
use App\Http\Controllers\ProjectorController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WallPosterController;
use Illuminate\Support\Facades\Route;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});
Route::get('migrate', function () {
    Artisan::call('migrate');
    return "Migrate Completed!";
});
Route::get('optimize', function () {
    Artisan::call('optimize');
    return "optimized!";
});

Route::get('', [UserController::class, 'userLogin'])->name('login');
Route::get('/retailer/create', [RetailerController::class, 'retailerCreate'])->name('retailer-create');

Route::group(
    ['prefix' => 'user'],
    function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/register', 'userRegister')->name('user-register');
            Route::post('/register/post', 'userRegisterPost')->name('user-register-post');
            Route::post('/login/post', 'userLoginPost')->name('user-login-post');
            Route::group(['middleware' => 'auth:web'], function () {
                Route::get('/dashboard', 'userDashboard')->name('user-dashboard');
            });
        });


        Route::controller(WallPosterController::class)->group(function () {
            Route::group(['middleware' => 'auth:web'], function () {
                Route::get('/wallposter/create', 'create')->name('user-wallposter-create');
                Route::get('/wallposter/index', 'index')->name('user-wallposter-index');
            });
        });



        Route::controller(PanShopController::class)->group(function () {
            Route::group(['middleware' => 'auth:web'], function () {
                Route::get('/panshop/create', 'create')->name('user-panshop-create');
                Route::get('/panshop/index',  'index')->name('user-panshop-index');
            });
        });



        Route::controller(ProjectorController::class)->group(function () {
            Route::group(['middleware' => 'auth:web'], function () {
                Route::get('/projector/create', 'create')->name('user-projector-create');
                Route::get('/projector/index', 'index')->name('user-projector-index');
            });
        });
    }
);
