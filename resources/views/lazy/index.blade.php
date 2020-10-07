@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:35%; margin-top: 5px;">Lazy Collections & PHP Generator</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <div>
                <a href="{{route('lazy.exp1')}}" type="a" class="btn btn-success">Collection </a>
                <a href="{{route('lazy.exp2')}}" type="a" class="btn btn-success">Lazy Collection </a>
                <a href="{{route('gen.exp1')}}" type="a" class="btn btn-success">Generator 1</a>
                <a href="{{route('gen.exp2')}}" type="a" class="btn btn-success">get_class(function)</a>
                <a href="{{route('gen.exp3')}}" type="a" class="btn btn-success">get_class_method(function)</a>
                <a href="{{route('gen.exp4')}}" type="a" class="btn btn-success">Generator: current():1</a>
                <a href="{{route('gen.exp5')}}" type="a" class="btn btn-success">Generator: current():2</a>
                <div style="padding-top: 2%"></div>
                <a href="{{route('gen.exp6')}}" type="a" class="btn btn-success">Generator: current():3</a>
                <a href="{{route('gen.exp7')}}" type="a" class="btn btn-danger">Without generator NotHappyFunction</a>
                <a href="{{route('gen.exp8')}}" type="a" class="btn btn-success">Using generator HappyFUnction</a>
                <br/>

            </div>
        </div>
    </div>
@endsection
