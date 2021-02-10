@extends('backend.index')

@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection

@section('content')

<form id="formDelete" action="{{ url('backend/contacto/' . $contacto->id) }}" method="post">
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
                <a href="{{ url('backend/contacto') }}" class="btn btn-primary">Coments</a>
                <a href="#" data-table="coment" data-id="{{ $contacto->id }}"  class="btn btn-danger" id="enlaceBorrar">Delete Coment</a>
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
            <td>{{ $contacto->id }}</td>
        </tr>
        <tr>
            <td>Usuario / ID</td>
            <td>{{ $contacto->iduser1 }}   </td>
        </tr>
         <tr>
            <td>Categoria / ID</td>
            <td>{{ $contacto->iduser2 }} </td>
        </tr>
        <tr>
            <td>Descripcion</td>
            <td>{{ $contacto->textocontacto }}</td>
        </tr>
       
       
    </tbody>
</table>
@endsection