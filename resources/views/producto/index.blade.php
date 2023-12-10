@extends('template')


@section('title','Productos')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
@endpush

@section('content')

<div class="container-fluid px-4">



                        <h1 class="mt-4 text-center">Presentaciones</h1>
                        <ol class="breadcrumb mb-4">
                       
                            <li class="breadcrumb-item active"><a href="{{route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Presentaciones</li>
                        </ol>

    <a href="{{route('productos.create')}}"><button type='button'
     class='btn btn-primary'>Añadir nuevo registro</button></a>
</div>

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            Tablas Productos
                            </div>

                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Descripcion</th>

                                            <th>Office</th>
                                             <th>Estado</th>
                                        </tr>
                                    </thead>

</table>


</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{asset('js/datatables-simple-demo.js')}}"></script> 
@endpush
