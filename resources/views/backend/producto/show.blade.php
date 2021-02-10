@extends('backend.index')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')

<form id="formDelete" action="{{ url('backend/producto/' . $producto->id) }}" method="post">
    @method('delete')
    @csrf
</form>



<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                <a href="{{ url('backend/producto') }}" class="btn btn-primary">Productos</a>
                <a href="#" data-table="coment" data-id="{{ $producto->id }}"  class="btn btn-danger" id="enlaceBorrar">Delete Producto</a>
            </div>

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

    @csrf
   
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Field</th>
            <th scope="col">Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Id</td>
            <td>{{ $producto->id }}</td>
        </tr>
        <tr>
            <td>Usuario / ID</td>
            <td>{{ $producto->user->name }}  /  ID:  {{ $producto->user->id }} </td>
        </tr>
         <tr>
            <td>Categoria / ID</td>
            <td>{{ $producto->categoria->categoria }}  /  ID:  {{ $producto->categoria->id }}</td>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td>{{ $producto->descripcion }}</td>
        </tr>
        <tr>
            <td>Uso</td>
            <td>{{ $producto->uso }}</td>
        </tr>
        <tr>
            <td>Precio</td>
            <td>{{ $producto->precio }}</td>
        </tr> 
        <tr>
            <td>Fecha</td>
            <td>{{ $producto->fecha }}</td>
        </tr> 
        <tr>
            <td>Estado</td>
            <td>{{ $producto->estado }}</td>
        </tr> 
        <tr>
            <td>Foto</td>
            <td><img  alt="no image" src="data:image/png;base64,{{ $producto->foto }}" style="width:200px"></img></td>
        </tr> 
       
       
    </tbody>
</table>
@endsection