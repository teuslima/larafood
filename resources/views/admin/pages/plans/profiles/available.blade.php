@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}">Perfís</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles.available', $plan->id) }}">Disponíveis</a></li>
    </ol>

    <h1>Planos disponíveis para o Plano {{ $plan->name }}</h1>
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
                    <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
                        @csrf

                        @foreach($profiles as $profile)
                            <tr>
                                <td><input type="checkbox" name="profiles[]" value="{{ $profile->id }}"></td>
                                <td>{{ $profile->name }}</td>
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
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop