@extends('layouts.app')

@section('title', 'Menu post edit')

@section('content')
<form action="{{('savePost')}}" method="POST" class="container col-md-4 col-md-offset-4">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="croatian_title">NAME: </label>
        <input class="form-control" type="text" name="name" id="name" required>
    </div>
    
    <div class="form-group">
        <label for="croatian_title">ORDER: </label>
        <input class="form-control" type="text" name="order" id="order" required>
    </div>
    
    <div class="form-group">
        <label for="menu_id">MENUS: </label>
        <select class="form-control" name="menu_id" id="menu_id">
            <option disabled>Chose menu</option>
                              
           @foreach ($menus as $menu)
                <option value="{{$menu->id}}"> {{$menu->name}} </option>
           @endforeach                                
        </select>
    </div>
    
    <div class="form-group">
    <label for="post_id">POST: </label>
        <select class="form-control" name="post_id" id="post_id">
            <option disabled>Chose post</option>
                              
           @foreach ($posts as $post)
                <option value="{{$post->id}}"> {{$post->name}} </option>
           @endforeach                                
        </select>
    </div>
    <button type="submit" class="btn btn-primary">SUBMIT</button>
</form>
@endsection