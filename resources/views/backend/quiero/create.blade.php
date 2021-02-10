
@extends('backend.index') 

@section('content')


<div class="col-lg-4">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
            <a href="{{ url('backend/quiero') }}" class="btn btn-secondary">Coment</a>

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

       <form role="form" action="{{ url('backend/quiero') }}" method="post" id="createproductoForm">
    @csrf
    <div class="card-body">
        
        
       
        
         <label for="iduser">User</label>

        @if(isset($users))
        <select name="iduser" id="iduser" required class="form-control">
            <option value="" disabled selected>Select user</option>
            @foreach($users as $user)

            <option value="{{ $user->id }}">{{ $user->name }}</option>

            @endforeach
        </select>
        @else
            <input type="text" value="{{ $user->name }}" readonly class="form-control">
            <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
        @endif
        
        
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
        

           
        </div>
       
         <button type="submit" class="btn btn-info">Submit</button>
    </div>
    <!-- /.card-body -->
    <br>
       
        
   
</form>
    </div>
</div>



@endsection