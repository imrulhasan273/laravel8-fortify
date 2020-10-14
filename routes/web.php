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
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PayOrderController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\LazyCollection;

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
Route::get('/lazy', [Controller::class, 'lazy'])->name('lazy.index');
Route::get('/soft-delete', [Controller::class, 'sDelete'])->name('softD.index');








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


# ------ lazy collection

// example 1
Route::get('/lazy/example1', function () {
    $collection = Collection::times(10000000)
        ->map(function ($number) {
            return pow(2, $number);
        })
        ->all();

    return 'done';
})->name('lazy.exp1');

// example 2
Route::get('/lazy/example2', function () {
    $collection = LazyCollection::times(10000000)
        ->map(function ($number) {
            return pow(2, $number);
        })
        ->all();

    return 'done';
})->name('lazy.exp2');

Route::get('/generator/example1', function () {
    function happyFunction($string)
    {
        return $string;
    }
    return happyFunction('Super Happy');
})->name('gen.exp1');


Route::get('/generator/example2', function () {
    function happyFunction2($string)
    {
        yield $string;
    }
    return get_class(happyFunction2('Super Happy'));
})->name('gen.exp2');

Route::get('/generator/example3', function () {
    function happyFunction3($string)
    {
        yield $string;
    }
    return get_class_methods(happyFunction3('Super Happy'));
})->name('gen.exp3');


Route::get('/generator/example4', function () {
    function happyFunction4($string)
    {
        yield $string;
    }
    return happyFunction4('Super Happy')->current();
})->name('gen.exp4');

Route::get('/generator/example5', function () {
    function happyFunction5()
    {
        dump('One Start');
        yield 'One';
        dump('One End');

        dump('Two Start');
        yield 'Two';
        dump('Two End');

        dump('Three Start');
        yield 'Three';
        dump('Three End');
    }
    return happyFunction5()->current();
})->name('gen.exp5');


//--- --- --- ---
Route::get('/generator/example6', function () {
    function happyFunction6($strings)
    {
        foreach ($strings as $string) {
            dump('Start ' . $string);
            yield $string;
            dump('End ' . $string);
        }
    }

    foreach (happyFunction6(['One', 'Two', 'Three']) as $result) {
        dump($result);
    }
})->name('gen.exp6');


Route::get('/generator/example7', function () {

    function notHappyFunction7($number)
    {
        $return = [];

        for ($i = 1; $i < $number; $i++) {
            $return[] = $i;
        }

        return $return;
    }

    foreach (notHappyFunction7(100000000) as $number) {

        if ($number % 1000 == 0) {
            dump('Hello');
        }
    }
})->name('gen.exp7');



Route::get('/generator/example8', function () {
    function HappyFunction8($number)
    {
        for ($i = 1; $i < $number; $i++) {
            yield $i;
        }
    }

    foreach (HappyFunction8(100000000) as $number) {

        if ($number % 1000 == 0) {
            dump('Hello');
        }
    }
})->name('gen.exp8');




Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
