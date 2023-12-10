@extends('template')

@section('title','Crear categorias')


@push('css')

<style>

#descripcion{
    resize:none
}


</style>


@endpush

@section('content')
<div class="container-fluid px-4">



                        <h1 class="mt-4 text-center">Crear Productos</h1>
                        <ol class="breadcrumb mb-4">
                       
                            <li class="breadcrumb-item active"><a href="{{route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item "><a href="{{route('productos.index')}}">Categorias</a></li>
                            <li class="breadcrumb-item active">Crear Productos</li>
                        </ol>
</div>


<div class='container w-100 border border-3
border-primary rounded p-4 mt-3'>
<form action="{{route('productos.store') }}" method='post'>


</form>




</div>
@endsection

@push('js')


@endpush