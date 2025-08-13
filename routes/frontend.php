<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::group(['as' => 'f.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');

    Route::get('/home-login', [HomeController::class, 'login'])->name('login');


    Route::get('/about', [HomeController::class, 'about'])->name('about');

    Route::get('/servic', [HomeController::class, 'servic'])->name('servic');

    Route::get('/mamberShip', [HomeController::class, 'memberShip'])->name('memberShip');

    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    Route::get('/insight', [HomeController::class, 'insight'])->name('insight');

    Route::get(';/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');


});