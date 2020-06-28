@extends('adminlte::page')

@section('title', "Cadastrar Cargos")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Cargos</a></li>
    </ol>

    <h1>Cadastrar Cargos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store')}}" method="post">
                @include('admin.pages.roles._partials.form')
            </form>
        </div>
    </div>
@stop