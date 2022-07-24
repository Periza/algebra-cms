@extends('layouts.app')

@section('title', 'Create a new role')

@section('content')
    <h1>Create a role</h1>

    {!! Form::open(['route' => 'storeRole', 'method' => "POST"]) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        {{Form::submit('Add role', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection