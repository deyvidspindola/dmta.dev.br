<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/servicos', 'services')->name('services');
Route::view('/cases', 'cases')->name('cases');
Route::view('/sobre', 'about')->name('about');

Route::get('/contato', [ContactController::class, 'show'])->name('contact');
Route::post('/contato', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
