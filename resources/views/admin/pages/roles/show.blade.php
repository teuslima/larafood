@extends('adminlte::page')

@section('title', 'Detalhes do Cargo')

@section('content_header')
    <h1>Detalhes do Cargo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Nome: {{ $role->name }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Cargo</button>
            </form>
        </div>
    </div>
@stop