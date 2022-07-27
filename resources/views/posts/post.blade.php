@extends('layouts.app')

@section('title', "{$post->name}")

@section('content')
    <div class="text-center">
        <h1>{{$post->name}}</h1>
        <img src="/uploads/{{$post->image}}"alt=""/>
        <p>{{$post->description}}</p>
        <div>
            <p style="float: left">created at: {{$post->created_at}}</p>
        </div>
    </div>
@endsection