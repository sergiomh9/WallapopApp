

@extends('backend.index') 

@section('content')


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/categoria') }}" class="btn btn-secondary">Coment</a>

        </div>

    </div>
</div>


@if(session()->has('error'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h2>Error ...</h2>
        </div>
    </div>
</div>
@endif


<br>

<div class="col-lg-12">
    <div class="card">

       <form role="form" action="{{ url('backend/categoria') }}" method="post" id="createcategoriaForm">
    @csrf
    <div class="card-body">
        
        
        <div class="form-group">
             <label for="categoria">Categoria</label>
             <input type="categoria" maxlength="1000" minlength="1" required class="form-control" id="categoria" placeholder="categoria" name="categoria" value="{{ old('categoria') }}">
        </div>
        
         <button type="submit" class="btn btn-info">Submit</button>
    </div>
    <!-- /.card-body -->
    <br>
       
        
   
</form>
    </div>
</div>



@endsection