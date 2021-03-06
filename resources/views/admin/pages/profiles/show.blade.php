@extends('adminlte::page')

@section('title', 'Detalhes de Permissões')

@section('content_header')
    <h1>Detalhes de Permissões</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Nome: {{ $profile->name }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar perfil</button>
            </form>
        </div>
    </div>
@stop