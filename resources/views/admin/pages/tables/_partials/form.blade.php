@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Identificador da Mesa: </label>
    <input type="text" name="identify" class="form-control" placeholder="Identificador da Mesa" value="{{ $table->identify ?? old('identify') }}">
</div>

<div class="form-group">
    <label for="">Descrição: </label>
    <textarea name="description" id="description" cols="30" class="form-control" rows="10">
        {{ $table->description ?? old('description') }}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>