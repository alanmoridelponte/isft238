<?php

use App\Models\Career;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('index'))->name('home');
Route::get('/institucional', fn() => view('index'))->name('institutional');
Route::get('/carreras', fn() => view('careers'))->name('careers');
Route::get('/carreras/{career}', fn(Career $career) => view('career', compact('career')))->name('careers.show');
Route::get('/blog', fn() => view('index'))->name('blog');
Route::get('/contacto', fn() => view('contact'))->name('contact');
