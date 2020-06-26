@extends('adminlte::page')

@section('title', 'Cadastrar Produtos')

@section('content_header')
    <h1>Cadastrar Produtos <a href="{{ route('products.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="from" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection