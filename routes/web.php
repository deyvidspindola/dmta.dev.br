<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');

Route::post('/contato', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::redirect('/servicos', '/#servicos');
Route::redirect('/cases', '/#cases');
Route::redirect('/sobre', '/#processo');
Route::redirect('/contato', '/#contato');
