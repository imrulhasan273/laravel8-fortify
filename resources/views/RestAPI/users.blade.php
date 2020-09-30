@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Rest API</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">

            <div >

                @if(count($errors)>0)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif

                <div>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Photo</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{$user['id']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['first_name']}}</td>
                            <td>{{$user['last_name']}}</td>
                            <td>{{$user['avatar']}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>

                <br/>

            </div>
        </div>
    </div>
@endsection
