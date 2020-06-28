@include('admin.includes.alerts')

<div class="form-group">
    <label for="">* CNPJ: </label>
    <input type="text" name="cnpj" class="form-control" placeholder="Título" value="{{ $tenant->cnpj ?? old('cnpj') }}">
</div>

<div class="form-group">
    <label for="">* Nome: </label>
    <input type="text" name="name" class="form-control" placeholder="Título" value="{{ $tenant->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">* E-Mail: </label>
    <input type="text" name="email" class="form-control" placeholder="Título" value="{{ $tenant->email ?? old('email') }}">
</div>

<div class="form-group">
    <label for="">* Imagem: </label>
    <input type="file" name="logo" class="form-control">
</div>

<div class="form-group" >
    <label>* Ativo? </label>
    <select name="active" class="form-control">
        <option value="Y" @if(isset($tenant) && $tenant->active == 'Y') selected @endif>SIM</option>
        <option value="N" @if(isset($tenant) && $tenant->active == 'N') selected @endif>NÃO</option>
    </select>
</div>

<hr>
<h4>Assinatura</h4>

<div class="form-group">
    <label for="">* Data Assinatura (início): </label>
    <input
      type="date"
      name="subscription"
      class="form-control"
      placeholder="Data início da assinatura"
      value="{{ $tenant->subscription ?? old('subscription') }}">
</div>

<div class="form-group">
    <label for="">* Expira em (fim): </label>
    <input
      type="date"
      name="expires_at"
      class="form-control"
      placeholder="Data início da assinatura"
      value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>

<div class="form-group">
    <label for="">* Identificador: </label>
    <input
      type="text"
      name="subscription_id"
      class="form-control"
      placeholder="Identificador"
      value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
</div>

<div class="form-group" >
    <label>* Assinatura Ativa? </label>
    <select name="active" class="form-control">
        <option value="1" @if(isset($tenant) && $tenant->active == 'Y') selected @endif>SIM</option>
        <option value="0" @if(isset($tenant) && $tenant->active == 'N') selected @endif>NÃO</option>
    </select>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>