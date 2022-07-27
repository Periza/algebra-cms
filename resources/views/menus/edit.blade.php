@extends('layouts.app')

@section('title', "Edit {$menu->name} menu")

@section('content')
    <h1>Create a new menu</h1>
    <form action="{{route('editMenu', $menu)}}" method="POST">
        <div class="form-group"><label for="name">Name: </label>
            <input type="text" name="name" value="{{$menu->name}}">
        </div>
        {{ csrf_field() }}
        <input type="hidden" name="_method", value="PUT">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </form>
@endsection



