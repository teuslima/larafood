@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Cargos</a></li>
    </ol>

    <h1>Permissões do cargo {{$role->name}} <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($role->permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td width="250">
                                <a href="{{ route('roles.permissions.detach', [$role->id, $permission->id]) }}" class="btn btn-danger">remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop