<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'))->name('home');
Route::get('/institucional', fn() => view('index'))->name('institutional');
Route::get('/carreras', fn() => view('index'))->name('careers');
Route::get('/carreras/{slug}', fn() => view('index'))->name('careers.show');
Route::get('/blog', fn() => view('index'))->name('blog');
Route::get('/contacto', fn() => view('index'))->name('contact');
