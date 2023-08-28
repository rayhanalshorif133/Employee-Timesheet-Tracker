<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScopeOfDeliveryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        // User
        Route::prefix('user')
            ->name('user.')
            ->group(function () {
                Route::get('/', [UserController::class, 'index'])->name('index');
                Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
                Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('delete');
            });
        // Category
        Route::prefix('category')
            ->name('category.')
            ->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('index');
                Route::post('/store', [CategoryController::class, 'store'])->name('store');
                Route::get('/fetch/{id?}',[CategoryController::class,'fetch'])->name('fetch');
                Route::put('/update', [CategoryController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [CategoryController::class, 'destroy'])->name('delete');
            });
            
        // Condition
        Route::prefix('condition')
            ->name('condition.')
            ->group(function () {
                Route::get('/', [ConditionController::class, 'index'])->name('index');
                Route::post('/store', [ConditionController::class, 'store'])->name('store');
                Route::put('/update', [ConditionController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [ConditionController::class, 'destroy'])->name('delete');
            });
             
        // Movement
        Route::prefix('movement')
            ->name('movement.')
            ->group(function () {
                Route::get('/', [MovementController::class, 'index'])->name('index');
                Route::post('/store', [MovementController::class, 'store'])->name('store');
                Route::put('/update', [MovementController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [MovementController::class, 'destroy'])->name('delete');
            });
            
        // scope of delivery methods
        Route::prefix('scope-of-delivery')
            ->name('scope-of-delivery.')
            ->group(function () {
                Route::get('/', [ScopeOfDeliveryController::class, 'index'])->name('index');
                Route::post('/store', [ScopeOfDeliveryController::class, 'store'])->name('store');
                Route::put('/update', [ScopeOfDeliveryController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [ScopeOfDeliveryController::class, 'destroy'])->name('delete');
            });

        // Product
        Route::prefix('product')
            ->name('product.')
            ->group(function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');
                Route::get('/pending', [ProductController::class, 'pendingIndex'])->name('pending.index');
                Route::get('/rejected', [ProductController::class, 'rejectedIndex'])->name('rejected.index');
                Route::get('/create', [ProductController::class, 'create'])->name('create');
                Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
                Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
                Route::post('/store', [ProductController::class, 'store'])->name('store');
                Route::put('/update', [ProductController::class, 'update'])->name('update');
                Route::delete('/delete-image', [ProductController::class, 'deleteImage'])->name('delete-image');
                Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('delete');
            });
        
        // Product
        Route::prefix('bid')
            ->name('bid.')
            ->group(function () {
                Route::get('/', [BidController::class, 'index'])->name('index');
                Route::get('/{id}/show', [BidController::class, 'show'])->name('show');
            });
        
        // Product
        Route::prefix('payment')
            ->name('payment.')
            ->group(function () {
                Route::get('/', [PaymentController::class, 'index'])->name('index');
                Route::get('/{id}/show', [PaymentController::class, 'show'])->name('show');
            });
    });
