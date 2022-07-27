@extends('layouts.app')

@section('title', 'Menus')

@section('content')
<table class="table">
    <thead class="bg-dark text-light">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>POSTS</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>
                    <div>{{$menu->id}}</div>
                </td>
                <td>
                    <div>{{$menu->name}}</div>
                </td>
                <td>
                    <div>
                        @foreach ($menu->posts as $post)
                            <a class="btn btn-info" href="{{route('postDetails', $post)}}">{{$post->name}}</a>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div>
                        <a class="btn btn-primary" href="{{route('menuEdit', $menu)}}">EDIT</a>
                    </div>
                </td>
                <td>
                    <div>
                        <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('menu-delete-form-{{$menu->id}}').submit()">DELETE</a>
                        <form id="menu-delete-form-{{$menu->id}}" action="{{route('deleteMenu', $menu)}}" method="POST" style="display: non">
                            <input type="hidden" name="_method", value="DELETE">
                            {{csrf_field()}}
                        </form>
                    </div>
                </td>
                <td>
                    <div>DELETE POST FROM MENU</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection