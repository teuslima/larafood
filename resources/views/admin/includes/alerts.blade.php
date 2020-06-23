@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p> {{ $error }}</p>
        @endforeach
    </div>
@endif

@if(isset($error))
    <div class="alert alert-danger">
        <p> {{ $error }}</p>
    </div>
@endif