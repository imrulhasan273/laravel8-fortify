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
                            <th scope="col">User ID</th>
                            <th scope="col">Title</th>
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Due</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($tasks as $task)
                          <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{$task->id}}</td>
                            <td>{{$task->user_id}}</td>
                            <td>{{$task->title}}</td>
                            {{-- <td>{{$task->description}}</td> --}}
                            <td>{{$task->due}}</td>
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
