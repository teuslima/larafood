@extends('adminlte::page')

@section('title', 'Cadastrar Categorias')

@section('content_header')
    <h1>Cadastrar Categorias <a href="{{ route('categories.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="from" method="POST">
                @csrf
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@endsection