@extends('template')

@section('title','Crear clientes')


@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>

/* #descripcion{
    resize:none


} */
#box-razon-social{
        display:none;
    }


</style>


@endpush

@section('content')
<div class="container-fluid px-4">



                        <h1 class="mt-4 text-center">Crear clientes</h1>
                        <ol class="breadcrumb mb-4">
                       
                            <li class="breadcrumb-item active"><a href="{{route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item "><a href="{{route('clientes.index')}}">clientes</a></li>
                            <li class="breadcrumb-item active">Crear clientes</li>
                        </ol>
</div>


<div class='container w-100 border border-3
border-primary rounded p-4 mt-3'>
<form action="{{route('clientes.store') }}" method='post'>
    @csrf
<div class='row g-3'>
<div class='col-md-6'>
<label for="tipo_persona" class='form-label'>Nombre:</label>
<select name="tipo_persona" id="tipo_persona">
<option value="" selected disabled>Seleccione una opcion</option>
    <option value="natural" {{old('tipo_persona') == 'natural' ? 'selected' : ''}}  >Persona natural</option>
    <option value="juridica" {{old('tipo_persona') == 'juridica' ? 'selected' : ''}} >Persona juridica</option>
</select>
@error('nombre')







<small class='text-danger'>{{'*'.$message}}</small>

@enderror
</div>
<div>



<div class="col-md-12 mb-2" id="box-razon-social" >
    <label   id='label-natural'        for="" class='form-label'>Nombres y Apellidos</label>
    <label   id='label-juridica'   for="" class='form-label'>Nombres de la empresa</label>

    <input type="text" name='razon_social' id='razon_social'
    class='form-control' 
    value="{{old('razon_social')}}">

@error('razon_social')
<small class='text-danger'>{{'*' .$message}}</small>


@enderror


</div>


<div class="col-md-8 mb-2">
<label for="direccion" class='form-label'>Direccion:</label>
<input type="text" name='direccion' id='direccion' class='form-control'>

@error('direccion')
<small class='text-danger'>{{'*' .$message}}</small>
@enderror

</div>






<div class='col-md-6'>
<label for="documento_id" class='form-label'>Tipo de documento:</label>
<select name="documento_id" id="documento_id">
<option value="" selected disabled>Seleccione una opcion</option>
 @foreach ($documentos as $item)
<option value="{{$item->id}}" {{old('documento_id') == 'natural' ? 'selected' : ''}}>{{$item->tipo_documento}}</option>

 @endforeach
</select>
@error('nombre')







<small class='text-danger'>{{'*'.$message}}</small>

@enderror
</div>


<div class="col-md-8 mb-2">
<label for="numero_documento" class='form-label'>Numero de documento:</label>
<input type="text" name='numero_documento' id='numero_documento' value="{{old('numero_documento')}}" class='form-control'>

@error('direccion')
<small class='text-danger'>{{'*' .$message}}</small>
@enderror

</div>


<div class='col-12 text-center'>

<button type='submit' class='btn btn-primary '>Guardar</button>


</div>

</div>



</form>




</div>
@endsection

@push('js')

 <script>
    $(document).ready(function(){
        $('#tipo_persona').on('change',function(){
            let selectValue = $(this).val();

            if(selectValue == 'natural'){
              $('#label-juridica').hide();
              $('#label-natural').show();
            }else{
                $('#label-juridica').show();
                $('#label-natural').hide();
            }


          $('#box-razon-social').show()


        })
    })
</script>





@endpush