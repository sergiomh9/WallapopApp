
@extends('backend.index') 

@section('content')


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/producto') }}" class="btn btn-secondary">Coment</a>

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

       <form role="form" action="{{ url('backend/producto') }}" method="post" id="createproductoForm" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        
        
        <div class="form-group">
            <label for="idpost">Usuario</label>
            
            @if(isset($users))
            <select name="iduser" id="iduser" required class="form-control">
                <option value="" disabled selected>Select usuario</option>
                @foreach($users as $user)
                
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $user->name }}" readonly class="form-control">
                <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
            @endif
            
        </div>
        
        
         <div class="form-group">
            <label for="idpost">Categoria</label>
            
            @if(isset($categorias))
            <select name="idcategoria" id="idcategoria" required class="form-control">
                <option value="" disabled selected>Select categoria</option>
                @foreach($categorias as $categoria)
                
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $categoria->categoria }}" readonly class="form-control">
                <input type="hidden" id="idcategoria" name="idcategoria" value="{{ $categoria->id }}">
            @endif
            
        </div>
        
        
        <div class="form-group">
             <label for="text">Nombre</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="nombre" placeholder="nombre" name="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
             <label for="text">Descripcion</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="descripcion" placeholder="descripcion" name="descripcion" value="{{ old('descripcion') }}">
        </div>
         <div class="form-group">
             <label for="text">Uso</label>
             <input type="text" maxlength="1000" minlength="1" required class="form-control" id="uso" placeholder="uso" name="uso" value="{{ old('uso') }}">
        </div>
         <div class="form-group">
             <label for="text">Precio</label>
             <input type="number" maxlength="1000" minlength="1" required class="form-control" id="precio" placeholder="precio" name="precio" value="{{ old('precio') }}">
        </div>
        <div class="form-group">
             <label for="date">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}">
        </div>
         <div class="form-group">
              <label for="idestado">Estado</label>
            
            <select name="estado" id="idestado" required class="form-control">
                 <option value="" disabled selected>Select estado</option>
                <option value="Enventa">En venta</option>
                <option value="Vendido">Vendido</option>
                <option value="Retirado">Retirado</option>
                <option value="Censurado">Censurado</option>
                <option value="Otros">Otros</option>
              
            </select>
             <!--<label for="text">Estado</label>-->
             <!--<input type="text" maxlength="1000" minlength="1" required class="form-control" id="estado" placeholder="estado" name="estado" value="{{ old('estado') }}">-->
        </div>
        
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
       </div>
       
         <button type="submit" class="btn btn-info">Submit</button>
    </div>
    <!-- /.card-body -->
    <br>
       
        
   
</form>
    </div>
</div>



@endsection