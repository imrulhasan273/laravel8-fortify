@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Channels</h1>
<div style="padding-top: 5%;" class="container">
    <div class="row">
        <div>
        <div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($channels as $channel)
                  <tr>
                    <td>{{$channel->id}}</td>
                    <td>{{$channel->name}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        <br/>
        </div>
    </div>
</div>
@endsection



