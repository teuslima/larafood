@extends('adminlte::page')

@section('name', 'Empresas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tenants.index') }}">Empresas</a></li>
    </ol>

    <h1>Empresas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="POST" class="form from-inline">
                @csrf
                <div class="form-group">
                    <input type="text" name="filter" placeholder="Pesquisar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark form-control mt-2">Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th width="300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                        <tr>
                            <td><img src="{{ url('storage/'.$tenant->image) }}" alt="{{ $tenant->name }}" style="max-width:100px;"></td>
                            <td>{{ $tenant->name }}</td>
                            <td width="250">
                                <!-- <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Edit</a> -->
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {!! $tenants->appends($filters)->links() !!}
            @else
                {!! $tenants->links() !!}
            @endif
        </div>
    </div>
@stop