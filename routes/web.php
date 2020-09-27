<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('home', 'home')->middleware('auth');


Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::get('/form/store', [FormController::class, 'store'])->name('form.store');
