@extends('adminlte::page')

@section('title', "Detalhes da Mesa {$table->identify}")

@section('content_header')
    <h1>Detalhes da Mesa <b>{{ $table->identify }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <ul>
                <li>Identificador da Mesa: {{ $table->identify }}</li>
                <li>Descrição:  {{ $table->description }}</li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Mesa</button>
            </form>
        </div>
    </div>
@stop