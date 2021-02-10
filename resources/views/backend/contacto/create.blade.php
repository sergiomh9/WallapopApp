
@extends('backend.index') 

@section('content')


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/contacto') }}" class="btn btn-secondary">Coment</a>

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

       <form role="form" action="{{ url('backend/contacto') }}" method="post" id="createproductoForm">
    @csrf
    <div class="card-body">
        
        
        <div class="form-group">
            <label for="iduser1">Usuario Emisor</label>
            
            @if(isset($users))
            <select name="iduser1" id="iduser1" required class="form-control">
                <option value="" disabled selected>Select usuario emisor</option>
                @foreach($users as $user)
                
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $user->name }}" readonly class="form-control">
                <input type="hidden" id="iduser1" name="iduser1" value="{{ $user->id }}">
            @endif
            
        </div>
        
        <div class="form-group">
            <label for="iduser2">Usuario Receptor</label>
            
            @if(isset($users))
            <select name="iduser2" id="iduser2" required class="form-control">
                <option value="" disabled selected>Select usuario receptor</option>
                @foreach($users as $user)
                
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $user->name }}" readonly class="form-control">
                <input type="hidden" id="iduser2" name="iduser2" value="{{ $user->id }}">
            @endif
            
        </div>
       
        
         <div class="form-group">
            <label for="idpost">Productos</label>
            
            @if(isset($productos))
            <select name="idproducto" id="idproducto" required class="form-control">
                <option value="" disabled selected>Select producto</option>
                @foreach($productos as $producto)
                
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                
                @endforeach
            </select>
            @else
                <input type="text" value="{{ $producto->producto }}" readonly class="form-control">
                <input type="hidden" id="idproducto" name="idproducto" value="{{ $producto->id }}">
            @endif
            
        </div>
        
        
        <div class="form-group">
             <label for="textocontacto">Mensaje</label>
             <input type="text" maxlength="2000" minlength="1" required class="form-control" id="textocontacto" placeholder="textocontacto" name="textocontacto" value="{{ old('textocontacto') }}">
        </div>
       
             <!--<label for="text">Estado</label>-->
             <!--<input type="text" maxlength="1000" minlength="1" required class="form-control" id="estado" placeholder="estado" name="estado" value="{{ old('estado') }}">-->
        </div>
       
         <button type="submit" class="btn btn-info">Submit</button>
    </div>
    <!-- /.card-body -->
    <br>
       
        
   
</form>
    </div>
</div>



@endsection