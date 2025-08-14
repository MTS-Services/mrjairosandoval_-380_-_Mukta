<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\Articles\ArticleController;
use App\Http\Controllers\Backend\Admin\BannerManagement\BannerController;
use App\Http\Controllers\Backend\Admin\Contact\ContactController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\Admin\MemberShipManagment\FeatureController;
use App\Http\Controllers\Backend\Admin\MemberShipManagment\MemberShipController;
use App\Http\Controllers\Backend\Admin\ServiceManagement\ServiceController;
use App\Http\Controllers\Backend\Admin\UserManagement\UserController;
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

  Route::group(['as' => 'sm.', 'prefix' => 'service-management'], function () {
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
  // User Management
  Route::group(['as' => 'um.', 'prefix' => 'user-management'], function () {
    Route::resource('user', UserController::class);
    Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
      Route::post('/show/{user}', 'show')->name('show');
      Route::get('/status/{user}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{user}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{user}', 'permanentDelete')->name('permanent-delete');
    });
  });
  Route::group(['as' => 'mm.', 'prefix' => 'membership-management'], function () {
    Route::resource('feature', FeatureController::class);
    Route::controller(FeatureController::class)->name('feature.')->prefix('feature')->group(function () {
      Route::post('/show/{feature}', 'show')->name('show');
      Route::get('/status/{feature}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{feature}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{feature}', 'permanentDelete')->name('permanent-delete');
    });
    Route::resource('membership', MemberShipController::class);
    Route::controller(MemberShipController::class)->name('membership.')->prefix('membership')->group(function () {
      Route::post('/show/{membership}', 'show')->name('show');
      Route::get('/status/{membership}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{membership}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{membership}', 'permanentDelete')->name('permanent-delete');
    });
  });
  //Article Management
  Route::group(['as' => 'am.', 'prefix' => 'article-management'], function () {
    Route::resource('article', ArticleController::class);
    Route::controller(ArticleController::class)->name('article.')->prefix('article')->group(function () {
      Route::post('/show/{article}', 'show')->name('show');
      Route::get('/status/{article}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{article}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{article}', 'permanentDelete')->name('permanent-delete');
    });
  });

  //Banner Management
  Route::group(['as'=> 'bm.', 'prefix' => 'banner-management'], function () {
    Route::resource('banner', BannerController::class);
    Route::controller(BannerController::class)->name('banner.')->prefix('banner')->group(function () {
      Route::post('/show/{banner}', 'show')->name('show');
      Route::get('/status/{banner}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{banner}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{banner}', 'permanentDelete')->name('permanent-delete');
    });
  });

  //Contact Management
  Route::group(['as' => 'cm.', 'prefix' => 'contact-management'], function () {
    Route::resource('contact', ContactController::class);
    Route::controller(ContactController::class)->name('contact.')->prefix('contact')->group(function () {
      Route::post('/show/{contact}', 'show')->name('show');
      Route::get('/status/{contact}', 'status')->name('status');
      Route::get('/trash/bin', 'trash')->name('trash');
      Route::get('/restore/{contact}', 'restore')->name('restore');
      Route::delete('/permanent-delete/{contact}', 'permanentDelete')->name('permanent-delete');
    });
  });
});
