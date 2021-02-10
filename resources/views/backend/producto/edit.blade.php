@extends('backend.index') 

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection 

@section('content')
<form id="formDelete" action="{{ url('backend/producto/' . $producto->id) }}" method="post">
    @method('delete')
    @csrf
</form>


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/producto') }}" class="btn btn-secondary">coment</a>
            <a href="#" data-id="{{ $producto->id }}" class="btn btn-danger" id="enlaceBorrar">Borrar coment</a>
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
        <form role="form" action="{{ url('backend/producto/' . $producto->id) }}" method="post" id="editproductoForm" enctype="multipart/form-data">
            @csrf @method('put')
            
            <div class="card-body">
                
                <div class="form-group">
                    <label for="iduser">User</label>
                    <select name="iduser" id="iduser" required class="form-control">
                        <option value="" disabled>Select enterprise</option>
                        @foreach($users as $user)
        
                        @if($user->id == old('iduser', $user->iduser))
        
                        <option selected value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
        
                        @endforeach
                    </select>
        
                </div>
                
                <div class="form-group">
                    <label for="idcategoria">Categoria</label>
                    <select name="idcategoria" id="idcategoria" required class="form-control">
                        <option value="" disabled>Select categoria</option>
                        @foreach($categorias as $categoria)
        
                        @if($categoria->id == old('idcategoria', $categoria->idcategoria))
        
                        <option selected value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @else
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endif
        
                        @endforeach
                    </select>
        
                </div>
                
                
        
        
        <div class="form-group">
             <label for="text">Nombre</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="nombre" placeholder="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        </div>
        <div class="form-group">
             <label for="text">Descripcion</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="descripcion" placeholder="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
        </div>
         <div class="form-group">
             <label for="text">Uso</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="uso" placeholder="uso" name="uso" value="{{ old('uso', $producto->uso) }}">
        </div>
         <div class="form-group">
             <label for="text">Precio</label>
             <input type="number" maxlength="1000" minlength="1" required class="form-control" id="precio" placeholder="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
        </div>
        <div class="form-group">
             <label for="date">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha', $producto->fecha) }}">
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
       <div class="form-group">
            <label for="estado">State</label>
            <select name="estado" id="estado" required class="form-control">
                <option value="" disabled>Select estado</option>

                @if($producto->estado == old('estado', $producto->estado))
        
                <option selected value="{{ $producto->estado }}">{{ $producto->estado }}</option>
                   
                    <option value="Enventa">En venta</option>
                    <option value="Vendido">Vendido</option>
                    <option value="Retirado">Retirado</option>
                    <option value="Censurado">Censurado</option>
                    <option value="Otros">Otros</option>
                @else
                    <option value="{{ $productO->estado }}">{{ $producto->estado }}</option>
                @endif

            </select>

        </div>
        <!--<div class="form-group">-->
        <!--            <label for="foto">Foto</label>-->
        <!--            <input type="file" class="form-control" id="foto" name="foto">-->
        <!--       </div>-->
                
                <br>
                <button type="submit" class="btn btn-info">Submit</button>
               
            </div>

          

        </form>

    </div>
</div>
@endsection