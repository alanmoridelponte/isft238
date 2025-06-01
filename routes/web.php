<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/institucional', [PageController::class, 'institutional'])->name('institutional');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');

Route::resource('carreras', CareerController::class, CareerController::$options);
Route::resource('blog', BlogController::class, BlogController::$options);
