@extends('adminlte::page')

@section('title', 'Cadastrar Usuários')

@section('content_header')
    <h1>Cadastrar Usuários <a href="{{ route('users.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="from" method="POST">
                @csrf
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection