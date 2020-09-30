<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('home', 'home')->middleware('auth');


Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');


Route::get('/rest-api', [Controller::class, 'index'])->name('api.index');

Route::get('/users', [UserController::class, 'index'])->name('api.users.index');


# Sessions --------------------------------------
Route::get('/session/login', function () {
    if (session()->has('name')) {
        return view('session.profile');
    }
    return view('/session/login');
})->name('session.login');

Route::post('/session/profile', [SessionController::class, 'userLogin'])->name('session.login.submit');

Route::get('/logout', function () {
    if (session()->has('name')) {
        session()->pull('name');
    }
    return Redirect::route('session.login');
});
