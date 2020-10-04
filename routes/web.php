<?php

use App\Http\Controllers\BlogController;
use App\Postcard;
use Illuminate\Support\Str;
use App\PostcardSendingService;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PayOrderController;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::view('/home', 'home')->middleware('auth');


Route::get('/rest-api', [Controller::class, 'index'])->name('api.index');
Route::get('/service-provider', [Controller::class, 'servide_container'])->name('sc.index');
Route::get('/view-composer', [Controller::class, 'view_composer'])->name('vc.index');
Route::get('/polymorphic-relationships', [Controller::class, 'polymorphic_relationships'])->name('pr.index');
Route::get('/facades', [Controller::class, 'facade'])->name('facade.index');
Route::get('/macros', [Controller::class, 'macros'])->name('macros.index');
Route::get('/pipeline', [Controller::class, 'pipe'])->name('pipe.index');
Route::get('/rp', [Controller::class, 'rp'])->name('rp.index');






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



## --- post card --- facades
Route::get('/post-cards', function () {
    $postcardService = new PostcardSendingService('USA', 4, 6);
    $postcardService->hello('Hello from Coder Tape USA!!', 'imrul.cse273@gmail.com');
})->name('postcard.index');


Route::get('/facade_version', function () {
    Postcard::hello('Hello from Coder Tape USA Facade Way!!', 'imrul.cse273@facade.com');
})->name('postcard.facade');


Route::get('/macros/partNumber', function () {
    dd(Str::partNumber('1234567890'));
})->name('macros.partnumber');

Route::get('/macros/mixin', function () {
    dd(Str::prefix('1234567890'));
})->name('macros.mixin');

# -- - - -- - - -

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');



Route::get('/customers', [CustomerController::class, 'index'])->name('cs.index');

Route::get('/customers/{customerId}', [CustomerController::class, 'show'])->name('cs.show');
