<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\JobController;

use App\Http\Controllers\Site\SiteJobController;
use App\Http\Controllers\Site\AuthSiteController;
use App\Http\Controllers\Site\SiteCompanyController;
use App\Http\Controllers\Site\SiteUserController;
use App\Http\Controllers\Site\SiteRequestController;
use App\Http\Controllers\Site\SiteProfileUserController;
use App\Http\Controllers\Site\FilterController;

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

 



// ** ADMIN **
Route::prefix('admin')->middleware(['if.auth'])->group(function () {
    Route::get('/login',                  [AuthController::class, 'index'])->name('admin.login');
    Route::post('/auth',                  [AuthController::class, 'authenticate'])->name('admin.auth');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/logout',                 [AuthController::class, 'logout'])->name('logout');

    Route::get('/company',                [CompanyController::class, 'index'])->name('company');
    Route::get('/company/create',         [CompanyController::class, 'create'])->name('company.create');
    Route::get('/company/edit/{id}',      [CompanyController::class, 'show'])->name('company.edit');
    Route::put('/company/{id}',           [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{id}',        [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::post('/company',               [CompanyController::class, 'store'])->name('company.store');

    Route::get('/job/company/{id}',       [JobController::class, 'indexById'])->name('job.byid');
    Route::get('/job/toggle-active/{id}', [JobController::class, 'toggleActive'])->name('job.toggle.active');
});

// ** SITE **
// site.if.auth nếu đã login thì không cho vào các route trong nó
Route::prefix('/')->middleware(['site.if.auth'])->group(function () {
    Route::get('/login',                  [AuthSiteController::class, 'index'])->name('site.login');
    Route::post('/auth',                  [AuthSiteController::class, 'authenticate'])->name('site.auth');
});

Route::prefix('/')->name('site.')->group(function () {
    Route::get('/',                       [SiteJobController::class, 'index'])->name('job.list');
    Route::get('job/detail/{id}',         [SiteJobController::class, 'detail'])->name('job.detail');
    Route::get('job/create',              [SiteJobController::class, 'create'])->name('job.create');
    Route::post('job/save',               [SiteJobController::class, 'save'])->name('job.save');
    Route::get('job/filter',              [SiteJobController::class, 'filter'])->name('job.filter');
    Route::get('job/delete/{id}',         [SiteJobController::class, 'delele'])->name('job.delete');

    Route::get('company/detail/{id}',     [SiteCompanyController::class, 'detail'])->name('company.detail');
    Route::get('company/profile',         [SiteCompanyController::class, 'profile'])->name('company.profile');
    Route::get('company/profile/edit',    [SiteCompanyController::class, 'edit'])->name('company.profile.edit');
    Route::get('company/applys/{id}',     [SiteCompanyController::class, 'applys'])->name('company.applys');
    Route::post('company/profile/save',   [SiteCompanyController::class, 'save'])->name('company.profile.save');

    Route::get('profile/detail',          [SiteUserController::class, 'profile'])->name('profile.detail');
    Route::post('profile/save',           [SiteProfileUserController::class, 'save'])->name('profile.save');
    Route::get('profile/detail-user/{id}',[SiteProfileUserController::class, 'detail'])->name('profile.detail.user');
    Route::get('profile/list',            [SiteProfileUserController::class, 'index'])->name('profile.list');
    Route::get('profile/filter',          [SiteProfileUserController::class, 'filter'])->name('profile.filter');

    Route::post('apply',                  [SiteRequestController::class, 'apply'])->name('request.apply');
    Route::get('apply/list/{id}',         [SiteRequestController::class, 'list'])->name('request.list');

   
    Route::get('password/change',         [AuthSiteController::class, 'changePassword'])->name('password.change');
    Route::post('password/save',          [AuthSiteController::class, 'savePassword'])->name('password.save');
    
    Route::prefix('/')->middleware(['site.auth', 'if.type.default'])->group(function () {
        Route::get('/type/confirm',       [AuthSiteController::class, 'typeConfirm'])->name('type.confirm');
        Route::POST('/type/save',         [AuthSiteController::class, 'typeSave'])->name('type.save');
    });
    
});

Route::get('/logout',                     [AuthSiteController::class, 'logout'])->name('site.logout');
Route::get('/callback',                   [\App\Http\Controllers\Api\GoogleController::class, 'loginCallback']);