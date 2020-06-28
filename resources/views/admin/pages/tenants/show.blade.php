@extends('adminlte::page')

@section('name', "Detalhes da Empresa {$tenant->name}")

@section('content_header')
    <h1>Detalhes da Empresa <b>{{ $tenant->name }} </b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Filters</div>
        <div class="card-body">
            <img src="{{ url('storage/'.$tenant->logo) }}" alt="{{ $tenant->name }}" style="max-width:500px;">
            <ul>
                <li>Plano:  {{ $tenant->plan->name }}</li>
                <li>Nome:  {{ $tenant->name }}</li>
                <li>URL:  {{ $tenant->url }}</li>
                <li>E-Mail:  {{ $tenant->email }}</li>
                <li>CNPJ:  {{ $tenant->cnpj }}</li>
                <li>Ativo:  {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}</li>
            </ul>

            <hr>
            <h4>Assinatura</h4>
            <ul>
                <li>Assinatura em:  {{ $tenant->subscription }}</li>
                <li>Expira em:  {{ $tenant->expires_at }}</li>
                <li>Identificador:  {{ $tenant->subscription_id }}</li>
                <li>Ativo?  {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}</li>
                <li>Cancelou?  {{ $tenant->subscription_suspended ? 'SIM' : 'NÃO' }}</li>
            </ul>

            <!-- @include('admin.includes.alerts')

            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Tenant</button>
            </form> -->
        </div>
    </div>
@stop