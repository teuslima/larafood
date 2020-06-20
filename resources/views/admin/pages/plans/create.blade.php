@extends('adminlte::page')

@section('title', 'Cadastrar Planos')

@section('content_header')
    <h1>Cadastrar Planos <a href="{{ route('plans.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="from" method="POST">
                @csrf
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection