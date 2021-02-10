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
            <h4 class="box-title">Quieros </h4>
        </div>
        <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                             <th scope="col">Id quiero</th>
                            <th scope="col">Id User</th>
                            <th scope="col">Id Producto</th>
                           
                            <!--<th scope="col">Mensaje</th>-->
                           
                            
                          
                           
                            <th scope="col">edit</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quieros as $quiero)
                        <tr>
                            <td scope="row">{{ $quiero->id }}</td>
                            <td>{{ $quiero->user->name }}</td>
                            <td>{{ $quiero->productos->nombre }}</td>
                            
                             
                               

                               
                                <td><a class="btn btn-warning" href="{{ url('backend/quiero/' . $quiero->id . '/edit') }}">edit</a></td>
                                <td><a href="#" data-id="{{$quiero->id}}" class="enlaceBorrar btn btn-danger">delete</a></td>

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
<form id="formDelete" action="{{ url('backend/quiero') }}" method="post">
    @method('delete') 
    @csrf
</form>
@endsection