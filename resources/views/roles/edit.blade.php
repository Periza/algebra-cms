@extends('layouts.app')

@section('title', 'Edit a role')

@section('content')
    <h1>Edit role</h1>

    {!! Form::open(['route' => ['editRole', $role->id], 'method' => "POST"]) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Edit role', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection