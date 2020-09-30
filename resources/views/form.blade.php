@extends('layouts.front')
@section('content')
<h1 style="margin-left:35%; margin-top: 5px;">Form Request Validation</h1>
    <div style="padding-top: 5%; padding-left:30%" class="container">
        <div class="row">

            <div class="col-lg-offset-4 col-lg-6">

                @if(count($errors)>0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif

                <form  method="post" action="{{ route('form.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email"/>
                    </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>

                </form>
                <br/>

            </div>
        </div>
    </div>
@endsection
