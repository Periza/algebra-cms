
@extends('layouts.app')

@section('title', 'Roles')



@section('content')
<div id="role_table">
    <table class="table">
        <thead class="bg-dark text-light">
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Uredi</th>
                <th>Obriši</th>
            </tr>
        </thead>
        @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id}}</td>
                    <td>{{ $role->name}}</td>
                    <td><a type="button" class="btn btn-primary" href="/roles/{{$role->id}}/edit">EDIT</a></td>
                    <td>
                        {!!Form::open(['route' => ['roleDelete', $role], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('DELETE', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
            @endforeach
        
    </table>
    <a type="button" class="btn btn-secondary" href="/roles/create">ADD ROLE</a>
</div>
@endsection