@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Session | Login</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                @if(count($errors)>0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif

                <div>
                    <form  method="post" action="{{ route('session.login.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" type="name" name="name" placeholder="Name"/>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password"/>
                        </div>
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </form>
                </div>

                <br/>

            </div>
        </div>
    </div>
@endsection


