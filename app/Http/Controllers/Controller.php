<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $tasks = Task::all();
        return view('RestAPI.index', compact('tasks'));
    }

    public function servide_container()
    {
        return view('service_provider.index');
    }

    public function view_composer()
    {
        return view('view_composer.index');
    }

    public function polymorphic_relationships()
    {
        return view('polymorphic.index');
    }

    public function facade()
    {
        return view('facade.index');
    }

    public function macros()
    {
        return view('macros.index');
    }

    public function pipe()
    {
        return view('pipeline.index');
    }

    public function rp()
    {
        return view('rp.index');
    }

    public function lazy()
    {
        return view('lazy.index');
    }

    public function sDelete()
    {
        return view('soft.index');
    }
}
