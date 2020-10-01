@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">View Composer</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <div>

                <a href="{{route('channed.index')}}" type="a" class="btn btn-success">Channels</a>
                <a href="{{route('post.create')}}" type="a" class="btn btn-success">Post</a>

                <br/>

            </div>
        </div>
    </div>
@endsection



