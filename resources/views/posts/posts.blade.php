@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<table class="table">
    <thead class="bg-dark text-light">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>EMAIL</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>
                <div>{{$post->id}}</div>
            </td>
            <td>
                <div>{{$post->name}}</div>
            </td>
            <td>
                <div>{{$post->description}}</div>
            </td>
            <td>
                <div>{{$post->user->email}}</div>
            </td>
            <td>
                <a class="btn btn-info">DETAILS</a>
            </td>
            <td>
                <a class="btn btn-primary">EDIT</a>
            </td>
            <td>
                <a class="btn btn-danger">DELETE</a>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
