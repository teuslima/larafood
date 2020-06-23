@extends('adminlte::page')

@section('title', "Cadastrar Perfís")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfís</a></li>
    </ol>

    <h1>Cadastrar Perfís</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store')}}" method="post">
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop