<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/logo-preview', 'logo-preview')->name('logo.preview');

Route::post('/contato', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::redirect('/servicos', '/#servicos');
Route::redirect('/cases', '/#cases');
Route::redirect('/sobre', '/#processo');
Route::get('/contato', fn () => redirect('/#contato'));
