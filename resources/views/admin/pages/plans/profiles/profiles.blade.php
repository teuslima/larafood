@extends('adminlte::page')

@section('title', 'Perfís')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles', $plan->id) }}">Perfís</a></li>
    </ol>

    <h1>Perfís do Plano {{$plan->name}} <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark">ADD NOVO PERFIL</a></h1>
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
                    @foreach($plan->profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>
                            <td width="250">
                                <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop