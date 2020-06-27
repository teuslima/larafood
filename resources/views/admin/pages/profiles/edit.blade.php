@extends('adminlte::page')

@section('title', 'Editar Permissões')

@section('content_header')
    <h1>Editar Permissões</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="from" method="POST">
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection