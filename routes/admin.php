<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\Articles\ArticleController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\Admin\ServiceManagement\ServiceController;
use App\Services\Admin\Service\Service;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
  Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

  // Admin Management
  Route::group(['as' => 'am.', 'prefix' => 'admin-management'], function () {
    // Admin Routes
    Route::resource('admin', AdminController::class);
    Route::controller(AdminController::class)->name('admin.')->prefix('admin')->group(function () {
      Route::post('/show/{admin}', 'show')->name('show');
      Route::get('/status/{admin}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{admin}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{admin}', 'permanentDelete')->name('permanent-delete');
    });
  });

  Route::group(['as'=> 'sm.', 'prefix' => 'service-management'], function () {
    // Service Routes
    Route::resource('service', ServiceController::class);
    Route::controller(ServiceController::class)->name('service.')->prefix('service')->group(function () {
      Route::post('/show/{service}', 'show')->name('show');
      Route::get('/status/{service}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{service}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{service}', 'permanentDelete')->name('permanent-delete');
    });
      
  
  });
  //Article Management
  Route::group(['as'=> 'am.', 'prefix' => 'article-management'], function () {
    Route::resource('article', ArticleController::class);
    Route::controller(ArticleController::class)->name('article.')->prefix('article')->group(function () {
      Route::post('/show/{article}', 'show')->name('show');
      Route::get('/status/{article}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{article}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{article}', 'permanentDelete')->name('permanent-delete');
    });
    
  });
});


