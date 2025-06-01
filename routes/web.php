<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.index');
    Route::get('/institutional', 'institutional')->name('page.institutional');
    Route::get('/contact', 'contact')->name('page.contact');
});
Route::resource('carreras', CareerController::class, CareerController::$options);
Route::resource('blog', BlogController::class, BlogController::$options);
