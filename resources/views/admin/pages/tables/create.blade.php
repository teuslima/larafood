@extends('adminlte::page')

@section('title', 'Cadastrar Mesas')

@section('content_header')
    <h1>Cadastrar Mesas <a href="{{ route('tables.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.store') }}" class="from" method="POST">
                @csrf
                @include('admin.pages.tables._partials.form')
            </form>
        </div>
    </div>
@endsection