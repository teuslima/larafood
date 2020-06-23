@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.permissions', $profile->id) }}">Permissões</a></li>
    </ol>

    <h1>Permissões disponíveis para o perfil {{ $profile->name }}</h1>
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
                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                        @csrf

                        @foreach($permissions as $permission)
                            <tr>
                                <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                                <td>{{ $permission->name }}</td>
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
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop