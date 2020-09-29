# UI

```cmd
~$ composer require laravel/fortify
```

```cmd
~$ php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
```

```cmd
~$ php artisan migrate
```

Add below code to `app.php` in `Application Service Providers` array

```php
App\Providers\FortifyServiceProvider::class,
```

Add below code inside `boot()` function in `FortifyServiceProvider.php`.

```php
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });
```

Copy Past Bootstrap `Views` files from other project to `Fortify` projects `views`

Create the below route

```php
Route::view('home', 'home')->middleware('auth');
```

---

---

# Log In with Username instead of Email

> [Link](https://www.tutsplanet.com/laravel-auth-login-with-username-instead-of-email)

# **Advanced Laravel**

---

# **Form Request Validation #1**

---

## Inefficient Way

`form.blade.php`

```php
<div class="col-lg-offset-4 col-lg-6">

    @if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif

    <form  method="post" action="{{ route('form.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Name"/>
        </div>
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email"/>
        </div>
        <button class="btn btn-success" type="submit" name="submit">Submit</button>

    </form>
    <br/>

</div>
```

`web.php`

```php
Route::get('/form', [FormController::class, 'index'])->name('form.index');
Route::post('/form/store', [FormController::class, 'store'])->name('form.store');
```

`FormController.php`

```php
public function store(Request $request)
{
    $this->validate(
        $request,
        [
            'name' => 'required|max:20',
            'email' => 'required|max:40',
        ]
    );
}
```

## Efficiant Way

Create Request validation

```cmd
~$ php artisan make:request StoreFormValidation
```

`StoreFormValidation.php`

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'email' => 'required|max:40',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please input a Name',
            'name.max' => 'Name should not more than 20 charecters',
            'email.required' => 'Please input an Email',
            'email.max' => 'Email should not more than 40 charecters',
        ];
    }
}

```

> `return true` for `authorize` function.

`FormController.php`

```php
public function store(StoreFormValidation $request)
{
    //
}
```

## Output

![](markdowns/1.png)

---
