<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;

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

Route::get('/', function () {
    echo 1;
});

 




Route::prefix('admin')->middleware(['if.auth'])->group(function () {
    Route::get('/login',                  [AuthController::class, 'index'])->name('admin.login');
    Route::post('/auth',                  [AuthController::class, 'authenticate'])->name('admin.auth');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/logout',                 [AuthController::class, 'logout'])->name('admin.login');

    Route::get('/company',                [CompanyController::class, 'index'])->name('company');
    Route::get('/company/create',         [CompanyController::class, 'create'])->name('company.create');
    Route::get('/company/edit/{id}',      [CompanyController::class, 'show'])->name('company.edit');
    Route::put('/company/{id}',           [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{id}',        [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::post('/company',               [CompanyController::class, 'store'])->name('company.store');

    Route::get('/job/company/{id}',       [JobController::class, 'indexById'])->name('job.byid');
    Route::get('/job/toggle-active/{id}', [JobController::class, 'toggleActive'])->name('job.toggle.active');
});