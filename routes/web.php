<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('home', 'home')->middleware('auth');


Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');


Route::get('/rest-api', [Controller::class, 'index'])->name('api.index');
