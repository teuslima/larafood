@extends('adminlte::page')

@section('title', 'Editar Perfíl')

@section('content_header')
    <h1>Editar Perfíl</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="from" method="POST">
                @method('PUT')
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@endsection