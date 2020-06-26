@extends('adminlte::page')

@section('title', "Detalhes do Produto {$product->name}")

@section('content_header')
    <h1>Detalhes do Produto <b>{{ $product->name }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <img src="{{ url('storage/'.$product->image) }}" alt="{{ $product->title }}" style="max-width:500px;">
            <ul>
                <li>Flag:  {{ $product->flag }}</li>
                <li>Título:  {{ $product->title }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Produto</button>
            </form>
        </div>
    </div>
@stop