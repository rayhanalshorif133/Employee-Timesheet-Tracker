<?php

use App\Http\Controllers\api\BidController;
use App\Http\Controllers\api\OldProductController;
use App\Http\Controllers\api\ProductAndCategoryController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\ProductAttributeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/login-by-phone/{phone}', [UserController::class, 'loginByPhone'])->name('login-by-phone');
        Route::get('/otp-verification/{phone}/{otp}', [UserController::class, 'otpVerification'])->name('otp-verification');
    });

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::prefix('user')
            ->name('user.')
            ->group(function () {
                Route::get('/me', [UserController::class, 'me'])->name('me');
                Route::post('/profile-verification', [UserController::class, 'profileVerification'])->name('profile-verification');
                Route::post('/logout', [UserController::class, 'logout'])->name('logout');
            });
        // Product Attribute: category, condition , movement, scope-of-delivery
        Route::prefix('category')
            ->name('category.')
            ->group(function () {
                Route::get('/{id?}', [ProductAndCategoryController::class, 'fetchCategory'])->name('fetch-category');
                Route::get('/type/{type?}', [ProductAndCategoryController::class, 'fetchCategoryByType'])->name('fetch-category');
            });
            
        Route::get('/condition/{id?}',[ProductAttributeController::class, 'fetchCondition'])->name('condition.fetch');
        Route::get('/movement/{id?}',[ProductAttributeController::class, 'fetchMovement'])->name('movement.fetch');
        Route::get('/scope-of-delivery/{id?}',[ProductAttributeController::class, 'fetchScopeOfDelivery'])->name('scope-of-delivery.fetch');
            
        Route::prefix('product')
            ->name('product.')
            ->group(function () {
                Route::get('/{id?}', [ProductAndCategoryController::class, 'fetchProduct'])->name('fetch-product');
            });
        Route::prefix('old-product')
            ->name('old-product.')
            ->group(function () {
                Route::post('/upload', [OldProductController::class, 'upload'])->name('upload');
            });
    
        Route::prefix('bid')
            ->name('bid.')
            ->group(function () {
                Route::post('/product-by-user', [BidController::class, 'productBidByUser'])->name('product-by-user');
                Route::get('/fetch-by-user', [BidController::class, 'fetchByUser'])->name('fetch-by-user');
                Route::get('/fetch-by-product/{product_id}', [BidController::class, 'fetchByProduct'])->name('fetch-by-product');
                Route::get('/fetch-by-user-and-product/{product_id}', [BidController::class, 'fetchByUserAndProduct'])->name('fetch-by-user.product');
            });

        Route::prefix('payment')
            ->name('payment.')
            ->group(function () {
                Route::get('/invoice-download/{payment_id}', [PaymentController::class, 'invoiceDownload'])->name('invoice-download');
                Route::post('/pay-deposit', [PaymentController::class, 'payDeposit'])->name('pay-deposit');
            });
    });
