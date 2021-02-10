@extends('backend.index') 



@section('content')



<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/categoria') }}" class="btn btn-secondary">Post</a>
           
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



<div class="col-lg-12">
    <div class="card">
        <form role="form" action="{{ url('backend/categoria/' . $categoria->id) }}" method="post" id="editPostForm" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="categoria" maxlength="1000" minlength="2" required class="form-control" id="categoria" placeholder="categoria del Post" name="categoria" value="{{ old('categoria', $categoria->categoria) }}">
                </div>
               
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
              
            </div>

            <!-- /.card-body -->

        </form>

    </div>
</div>
@endsection