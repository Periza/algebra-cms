@extends('layouts.app')

@section('title', 'All posts')

@section('content')
<table class="table">
    <thead class="bg-dark text-light">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>OWNER</th>
            <th>EMAIL</th>
            <th></th>
            <th></th>
            <th></th>
            @php($user = Auth::user())
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
                <div>{{$post->user->name}}</div>
            </td>
            <td>
                <div>{{$post->user->email}}</div>
            </td>
            <td>
                <a href="{{route('postDetails', $post->id)}}" class="btn btn-info">DETAILS</a>
            </td>
            <td>
                <a type="button" class="btn btn-primary" href="{{route('editPostView', $post)}}">EDIT</a>
            </td>
            <td>
                <a type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-post-form-{{$post->id}}').submit()">DELETE</a>
                <form id="delete-post-form-{{$post}}" action="{{ route('deletePost', $post->id)}}", method="POST", style="display:none">
                    {{csrf_field()}}
                    <input type="hidden", name="_method", value="DELETE">
                </form>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
