@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:35%; margin-top: 5px;">Facade</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <div>


                <a href="{{route('postcard.index')}}" type="a" class="btn btn-success">postcard</a>

                <a href="{{ route('postcard.facade') }}" type="a" class="btn btn-success">facade postcard</a>


                <br/>

            </div>
        </div>
    </div>
@endsection
