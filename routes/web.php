<?php

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormController;
use App\Http\Controllers\PayOrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('home', 'home')->middleware('auth');


Route::get('/rest-api', [Controller::class, 'index'])->name('api.index');
Route::get('/service-provider', [Controller::class, 'servide_container'])->name('sc.index');
Route::get('/view-composer', [Controller::class, 'view_composer'])->name('vc.index');


Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');



Route::get('/users', [UserController::class, 'index'])->name('api.users.index');


# ----------===========START SESSION==============-------------
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
#----------===========END SESSION==============-------------


Route::post('/service-provider/pay', [PayOrderController::class, 'store'])->name('pay.order');

Route::get('/channels', [ChannelController::class, 'index'])->name('channed.index');

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
