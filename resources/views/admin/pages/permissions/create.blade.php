@extends('adminlte::page')

@section('title', "Cadastrar Permissões")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
    </ol>

    <h1>Cadastrar Permissões</h1>
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