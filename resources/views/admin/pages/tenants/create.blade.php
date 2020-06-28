@extends('adminlte::page')

@section('title', 'Cadastrar Tenant')

@section('content_header')
    <h1>Cadastrar Tenant <a href="{{ route('tenants.index') }}" class="btn btn-dark"><<</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" class="from" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.tenants._partials.form')
            </form>
        </div>
    </div>
@endsection