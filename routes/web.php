<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimeSheetController;
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
        Route::prefix('employee')
            ->name('employee.')
            ->group(function () {
                Route::get('/', [EmployeeController::class, 'index'])->name('index');
                Route::post('/create', [EmployeeController::class, 'create'])->name('create');
                Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
                Route::put('/update', [EmployeeController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [EmployeeController::class, 'destroy'])->name('delete');
            });
            
        Route::prefix('project')
            ->name('project.')
            ->group(function () {
                Route::get('/', [ProjectController::class, 'index'])->name('index');
                Route::post('/create', [ProjectController::class, 'create'])->name('create');
                Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('edit');
                Route::put('/update', [ProjectController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [ProjectController::class, 'destroy'])->name('delete');
            }); 
        Route::prefix('timesheet')
            ->name('timesheet.')
            ->group(function () {
                Route::get('/', [TimeSheetController::class, 'index'])->name('index');
                Route::post('/create', [TimeSheetController::class, 'create'])->name('create');
                Route::get('/{id}/edit', [TimeSheetController::class, 'edit'])->name('edit');
                Route::put('/update', [TimeSheetController::class, 'update'])->name('update');
                Route::delete('/{id}/delete', [TimeSheetController::class, 'destroy'])->name('delete');
            });
        
    });
