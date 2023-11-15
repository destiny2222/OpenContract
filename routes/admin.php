<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ContractorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function (){
    Route::controller(LoginController::class)->group(function (){
        Route::get('login-form','showLoginForm')->name('login-Form');
        Route::post('login','login')->name('login');
        Route::post('logout','logout')->name('logout');
    });
    Route::get('', [ HomeController::class,'home' ])->name('home');
    // Route::resource('/post', PostController::class);

    // contractor routes
    Route::get('/contract', [ContractorController::class, 'indexPage'])->name('contract-page');
    Route::get('/contract/create', [ContractorController::class, 'createPage'])->name('contract-create-page');
    Route::post('/contract/store', [ContractorController::class, 'storeContract'])->name('contract-store-page');
    Route::put('/contract/{id}/update', [ContractorController::class, 'updatePage'])->name('contract-update-page');
    Route::delete('/contract/{id}/delete', [ContractorController::class, 'deletePage'])->name('contract-delete-page');

    // project routes
    Route::resource('project', ProjectController::class);

    // profile routes
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile-page');
    Route::put('/profile_update/{id}', [HomeController::class, 'update'])->name('update-profile-page');
    // Route::post('/validate-otp', [ComfirmOtpController::class, 'ValidateOtp'])->name('validateotp');
    Route::put('change-passwprd', [HomeController::class, 'validatepassword'])->name('change-password-page');

    Route::get('optimize',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return 1;
    });
    Route::get('clear',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });
});
