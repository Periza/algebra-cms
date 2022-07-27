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
                    <div>POSTS/</div>
                </td>
                <td>
                    <div>EDIT</div>
                </td>
                <td>
                    <div>DELETE</div>
                </td>
                <td>
                    <div>DELETE POST FROM MENU</div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection