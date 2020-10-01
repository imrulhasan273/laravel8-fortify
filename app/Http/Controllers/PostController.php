<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        // $channels = Channel::all();
        // $channels = Channel::orderBy('name')->get();

        // return view('view_composer.post.create', compact('channels'));
        return view('view_composer.post.create');
    }
}
