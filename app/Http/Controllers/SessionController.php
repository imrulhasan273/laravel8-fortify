<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    public function userLogin(Request $request)
    {
        $data = $request->input();
        $request->session()->put('name', $data['name']);

        return view('session.profile');
    }
}
