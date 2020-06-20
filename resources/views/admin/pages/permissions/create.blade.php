@extends('adminlte::page')

@section('title', "Cadastrar Perfil")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfís</a></li>
    </ol>

    <h1>Cadastrar Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store')}}" method="post">
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop