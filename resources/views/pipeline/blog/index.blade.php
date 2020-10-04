@php
    $key=0;
@endphp
@extends('layouts.front')
@section('content')
<h1 style="margin-left:35%; margin-top: 5px;">Pipeline</h1>
    <div style="padding-top: 5%;" class="container">
        <div class="row">
            <div >
                <p>http://127.0.0.1:8000/blogs?active=1&sort=desc&max_count=10</p>
                <div>

                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Is Active</th>
                            <th scope="col">Title</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{$blog->active}}</td>
                                <td>{{$blog->title}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{ $blogs->appends(request()->input())->links('pagination::bootstrap-4') }}
                <br/>
            </div>
        </div>
    </div>
@endsection
