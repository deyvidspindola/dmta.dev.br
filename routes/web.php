<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sobre', function () {
    return view('home');
})->name('about');

Route::get('/contato', function () {
    return view('home');
})->name('contact');