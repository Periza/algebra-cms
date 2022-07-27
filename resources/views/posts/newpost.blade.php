@extends('layouts.app')

@section('title', 'Create a new post')

@section('content')
    <h1>Create a new post</h1>
    {!! Form::open(['route' => ['newPost', 'method' => 'POST'], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('image', 'Image')}}
            {{Form::file('image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Create post', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection