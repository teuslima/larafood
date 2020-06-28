@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    </ol>

    <h1>Cargos disponíveis para o Usuário {{ $user->name }}</h1>
@stop

@section('content') 
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('users.roles.attach', $user->id) }}" method="POST">
                        @csrf

                        @foreach($roles as $role)
                            <tr>
                                <td><input type="checkbox" name="roles[]" value="{{ $role->id }}"></td>
                                <td>{{ $role->name }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            @include('admin.includes.alerts')
                            <td colspan="500"><button type="submit" class="btn btn-success">Vincular</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop