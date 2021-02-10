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
                            <th scope="col">id</th>
                            <th scope="col">iduser</th>
                            <th scope="col">idcategoria</th>
                            <th scope="col">nombre</th>
                            <th scope="col">uso</th>
                            <th scope="col">precio</th>
                            <th scope="col">fecha</th>
                            <th scope="col">estado</th>
                            <th scope="col">Image</th>
                            
                          
                            <th scope="col">show</th>
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td scope="row">{{ $producto->id }}</td>
                            <td>{{ $producto->user->name }}</td>
                            <td>{{ $producto->categoria->categoria }}
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->uso }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>{{ date('d-m-Y', strtotime($producto->fecha)) }}</td>
                                 <td>{{ $producto->estado }}</td>
                                
                                  <!--<td><img  alt="no image" src="{{ url('foto/' . $producto->id . '.jpg' )}}"></img></td>-->
                              <td>  <img src="data:image/png;base64,{{ $producto->foto }}" style="width:100px;"></td>
                                  
                                <td><a class="btn btn-info" href="{{ url('backend/producto/' . $producto->id) }}">show</a></td>
                                <td><a class="btn btn-warning" href="{{ url('backend/producto/' . $producto->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$producto->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

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
<form id="formDelete" action="{{ url('backend/producto') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection