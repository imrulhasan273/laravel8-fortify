@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:35%; margin-top: 5px;">Soft Delete</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <div>


                <a href="{{route('notes.index')}}" type="a" class="btn btn-success">notes</a>

                {{-- <a href="{{ route('macros.mixin') }}" type="a" class="btn btn-success">Mixin</a> --}}


                <br/>

            </div>
        </div>
    </div>
@endsection
