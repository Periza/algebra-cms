@extends('layouts.app')

@section('title', 'Roles')

@foreach ($roles as $item)
    {{ $item }}
@endforeach