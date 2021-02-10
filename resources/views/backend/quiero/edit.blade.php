@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/quiero/' . $quiero->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/quiero') }}" class="btn btn-secondary">coment</a>
            <a href="#" data-id="{{ $quiero->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar coment</a>
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
        <form role="form" action="{{ url('backend/quiero/' . $quiero->id) }}" method="post" id="editquieroForm" enctype="multipart/form-data">
            @csrf @method('put')
            
            <div class="card-body">
                
                <div class="form-group">
                    <label for="iduser">User</label>
                    <select name="iduser" id="iduser" required class="form-control">
                        <option value="" disabled>Select user</option>
                        @foreach($users as $user)
        
                        @if($user->id == old('iduser', $quiero->iduser))
        
                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
        
                        @endforeach
                    </select>
        
                </div>
                
                
                
                
                <div class="form-group">
                    <label for="idproducto">Producto</label>
                    <select name="idproducto" id="idproducto" required class="form-control">
                        <option value="" disabled>Select producto</option>
                        @foreach($productos as $producto)
        
                        @if($producto->id == old('idproducto',  $quiero->idproducto))
        
                        <option selected value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @else
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endif
        
                        @endforeach
                    </select>
        
                </div>
                
                
        
      
        <!-- <div class="form-group">-->
        <!--      <label for="idestado">Estado</label>-->
            
        <!--    <select name="estado" id="idestado" required class="form-control">-->
        <!--         <option value="" disabled selected>Select estado</option>-->
        <!--        <option value="Enventa">En venta</option>-->
        <!--        <option value="Vendido">Vendido</option>-->
        <!--        <option value="Retirado">Retirado</option>-->
        <!--        <option value="Censurado">Censurado</option>-->
        <!--        <option value="Otros">Otros</option>-->
              
        <!--    </select>-->
            
        <!--</div>-->
      
        
                
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
               
            </div>

           

        </form>

    </div>
</div>
@endsection