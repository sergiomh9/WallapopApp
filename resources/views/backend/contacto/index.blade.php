@extends('backend.index') 


@section('postscript')
<script src="{{ url('assets/backend/js/script.js?r=' . uniqid()) }}"></script>
@endsection


@section('content') 


@if(session()->has('op'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success" role="alert">
            Operation: {{ session()->get('op') }}. Id: {{ session()->get('id') }}. Result: {{ session()->get('r') }}
        </div>
    </div>
</div>
@endif

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="box-title">Noticias </h4>
        </div>
        <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                             <th scope="col">idcontacto</th>
                            <th scope="col">idUser1</th>
                            <th scope="col">idUser2</th>
                            <th scope="col">idProducto</th>
                            <!--<th scope="col">Mensaje</th>-->
                           
                            
                          
                            <th scope="col">show</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactos as $contacto)
                        <tr>
                            <td scope="row">{{ $contacto->id }}</td>
                            <td>{{ $contacto->iduser1 }}</td>
                            <td>{{ $contacto->iduser2 }}</td>
                             <td>{{ $contacto->producto->nombre }}</td>
                                <!--<td>{{ $contacto->textocontacto }}</td>-->
                               

                                <td><a class="btn btn-info" href="{{ url('backend/contacto/' . $contacto->id) }}">show</a></td>
                                <td><a class="btn btn-warning" href="{{ url('backend/contacto/' . $contacto->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$contacto->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
            <!-- /.table-stats -->
        </div>
    </div>
    <!-- /.card -->
</div>
<form id="formDelete" action="{{ url('backend/contacto') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection