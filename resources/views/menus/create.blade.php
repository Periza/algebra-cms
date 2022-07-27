@extends('layouts.app')

@section('title', 'Create a new menu')

@section('content')
    <h1>Create a new menu</h1>
    <form action="{{route('newMenu')}}" method="POST">
        <div class="form-group"><label for="name">Name: </label>
            <input type="text" name="name">
        </div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">CREATE</button>
    </form>
@endsection