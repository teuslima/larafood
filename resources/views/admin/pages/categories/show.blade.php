@extends('adminlte::page')

@section('title', "Detalhes do Categoria {$category->name}")

@section('content_header')
    <h1>Detalhes do Categoria <b>{{ $category->name }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Nome: {{ $category->name }}</li>
                <li>URL:  {{ $category->url }}</li>
                <li>Descrição:  {{ $category->description }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Categoria</button>
            </form>
        </div>
    </div>
@stop