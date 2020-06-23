@extends('adminlte::page')

@section('title', 'Planos do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfís</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.plans', $profile->id) }}">Planos</a></li>
    </ol>

    <h1>Planos do Perfil</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                        </tr>
                        <td width="250">
                            <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">remover</a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if(isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop