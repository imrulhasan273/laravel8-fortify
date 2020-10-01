@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Create Post</h1>
<div style="padding-top: 5%;" class="container">
    <div class="row">
        <div>
        <div>
            <form action="">
                <select name="channel_id" id="channel_id">
                    @foreach ($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                </select>
            </form>
        <br/>
        </div>
    </div>
</div>
@endsection



