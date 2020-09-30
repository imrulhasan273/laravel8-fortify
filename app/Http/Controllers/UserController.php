<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $users =  Http::get('https://reqres.in/api/users?page=1')['data'];

        return view('RestAPI.users', compact('users'));
    }
}
