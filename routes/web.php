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

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/etiquetas/{tag}', [BlogController::class, 'byTag'])->name('tag');
    Route::get('{category}', [BlogController::class, 'byCategory'])->name('category');
    Route::get('{category}/{post}', [BlogController::class, 'show'])->name('show');
});

Route::fallback(function () {
    return redirect('/');
});
