
@extends('layouts.app')

<div id="role_table">
@section('title', 'Roles')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Uredi</th>
                <th>Obriši</th>
            </tr>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id}}</td>
                    <td>{{ $role->name}}</td>
                    <td><a type="button" class="btn btn-primary" href="/roles/{{$role->id}}/edit">EDIT</a></td>
                    <td>
                        {!!Form::open(['route' => ['roleDelete', $role->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('DELETE', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        </thead>
    </table>
</div>