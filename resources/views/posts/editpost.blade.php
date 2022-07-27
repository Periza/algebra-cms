@extends('layouts.app')

@section('title', 'Edit post')

@section('content')
    <h1>Edit post</h1>
    {!! Form::open(['route' => ["editPost", $post->id], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', "{$post->name}", ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', "{$post->description}", ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'Image')}}
            {{Form::file('image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Save changes', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection