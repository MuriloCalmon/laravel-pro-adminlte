@extends('layouts.default')
@section('page-title', 'Editar Usuário')
@section('content')
    @include('users.parts.basic-details')
    @include('users.parts.profile')
    @include('users.parts.interest')
    @include('users.parts.roles')
@endsection