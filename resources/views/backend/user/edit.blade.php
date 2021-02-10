@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/user/' . $user->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/user') }}" class="btn btn-secondary">coment</a>
            <a href="#" data-id="{{ $user->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar coment</a>
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
        <form role="form" action="{{ url('backend/user/' . $user->id) }}" method="post" id="edituserForm" enctype="multipart/form-data">
            @csrf @method('put')
            
            <div class="card-body">
                
              
                
                 <div class="form-group">
                     <label for="text">Nombre</label>
                     <input type="text" maxlength="100" minlength="1" required class="form-control" id="name" placeholder="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                     <label for="text">Email</label>
                     <input type="email" maxlength="1000" minlength="1" required class="form-control" id="email" placeholder="email" name="email" value="{{ old('email', $user->email) }}">
                </div>
                
            
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
               
            </div>

            

        </form>

    </div>
</div>
@endsection