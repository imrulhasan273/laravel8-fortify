@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:45%; margin-top: 5px;">Service Provider</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <div>
                <form  method="post" action="{{route('pay.order')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select name="payment" class="form-control" id="exampleFormControlSelect1">
                          <option value="bank">Bank Payment</option>
                          <option value="credit">Credit Payament</option>
                        </select>
                      </div>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </form>
                <br/>

            </div>
        </div>
    </div>
@endsection



