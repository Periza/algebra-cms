@extends('layouts.app')

@section('title', 'Administration')

@section('content')
<table class="table">
    <thead class="bg-dark text-light">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ROLE</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>
                    <div>{{$user->id}}</div>
                </td>
                <td>
                    <div>{{$user->name}}</div>
                </td>
                <td>
                    <div>{{$user->email}}</div>
                </td>
                <td>
                    <form id="update-role-form-{{$user->id}}" action="{{ route('editRole', $user->id)}}" method="POST">
                        {{csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <select name="role" id="role">
                                <option disabled @if($user->role == null) selected @endif>CHOOSE A ROLE</option>

                                @foreach($roles as $role)
                                <option @if($user->role->id == $role->id) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </td>
                <td>
                    <button type="button" class="btn btn-primary">SAVE</button>
                </td>
                <td>
                    <a type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{$user->id}}').submit()">DELETE</a>
                    <form id="delete-user-form-{{$user->id}}" action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        <input type="hidden" name="_method", value="DELETE">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection