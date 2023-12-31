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
<form action="{{route('productos.store') }}" method='post' enctype='multipart/form-data'>
@csrf

<div class='row g-3'>
<div class="col-md-6">
    <label for="codigo" class='form-label'>Codigo:</label>
    <input type="text" name='codigo' id='codigo'
    class='form-control'
    values="{{old('codigo')}}">
@error('codigo')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>


<div class="col-md-6">
    <label for="nombre" class='form-label'>Nombre:</label>
    <input type="text" name='nombre' id='nombre'
    class='form-control'
    values="{{old('nombre')}}">
@error('nombre')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>



<div class="col-md-6">
    <label for="stock" class='form-label'>Stock:</label>
    <input type="number" name='stock' id='stock'
    class='form-control'
    values="{{old('stock')}}">
@error('stock')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>


<div class="col-md-6">
    <label for="descripcion" class='form-label'>Descripcion:</label>
   <textarea name="descripcion" id="descripcion"  rows="3"
   class='form-control'>
    
   </textarea>
@error('descripcion')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>




<div class="col-md-6">
    <label for="fecha_vencimiento" class='form-label'>Fecha de vencimiento:</label>
    <input type="date" name='fecha_vencimiento' id='fecha_vencimiento'
    class='form-control'
    values="{{old('fecha_vencimiento')}}">
@error('fecha_vencimiento')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>


<div class="col-md-6">
    <label for="img_path" class='form-label'>Imagen:</label>
    <input type="file" name='img_path' id='img_path'
    class='form-control'
    values="{{old('fecha_vencimiento')}}" accept='Image/*'>
@error('img_path')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>






<div class="col-md-6">
    <label for="marca_id" class='form-label'>Marcas:</label>
   <select name="marca_id" id="marca_id" class='form-control'>

@foreach ($marcas as $item)

<option value="{{$item->id}}" {{old('marca_id')== $item->id ? 'selected': '' }}>{{$item->nombre}}</option>

@endforeach

   </select>
@error('marca_id')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>



<div class="col-md-6">
    <label for="presentacione_id" class='form-label'>Presentaciones:</label>
   <select name="presentacione_id" id="presentacione_id" class='form-control'>

@foreach ($presentaciones as $item)

<option value="{{$item->id}}"  {{old('presentacione_id')== $item->id ? 'selected': '' }}>{{$item->nombre}}</option>

@endforeach

   </select>
@error('presentacione_id')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>

<div class="col-md-6">
    <label for="categorias" class='form-label'>Categorias:</label>
   <select name="categorias[]" id="categorias" class='form-control' multiple>

@foreach ($categorias as $item)

<option value="{{$item->id}}" </option>

@endforeach

   </select>
@error('categorias_id')
<small class='text-danger'>{{'*'.$message}}</small>

@enderror

</div>
<button type='submit'>Guardar</button>
</div>


</form>




</div>
@endsection

@push('js')


@endpush