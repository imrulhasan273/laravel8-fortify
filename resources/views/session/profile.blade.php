@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Session | Profile</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >

                <div>
                <h1>Hello, {{ session('name') }}</h1>
                </div>


                <a href="/logout" type="a" class="btn btn-light">Log Out</a>

                <br/>

            </div>
        </div>
    </div>
@endsection

