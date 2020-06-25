@extends('adminlte::page')

@section('title', 'Detalhes do Usuário {$user->name}')

@section('content_header')
    <h1>Detalhes do Usuário <b>{{ $user->name }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Nome: {{ $user->name }}</li>
                <li>E-Mail:  {{ $user->email }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Usuário</button>
            </form>
        </div>
    </div>
@stop