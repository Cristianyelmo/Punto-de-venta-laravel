@extends('template')

@section('title','clientes')


@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endpush

@section('content')



@if(session('success'))
<script>
    let message  = "{{session('success')}}";
    console.log(message);
Swal.fire(`${message}`);

</script>
@endif








<div class="container-fluid px-4">



                        <h1 class="mt-4 text-center">clientes</h1>
                        <ol class="breadcrumb mb-4">
                       
                            <li class="breadcrumb-item active"><a href="{{route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">clientes</li>
                        </ol>

    <a href="{{route('clientes.create')}}"><button type='button'
     class='btn btn-primary'>Añadir nuevo registro</button></a>


     <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            Tablas clientes
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Direccion</th>

                                            <th>Tipo de documento</th>
                                             <th>Tipo de persona</th>
                                             <th>Estado</th>
                                             <th>Acciones</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                      @foreach($clientes as $clientes)
                                        <tr>
                                            <td>
                                                {{$clientes->persona->razon_social}}
                                            </td>
                                            
                                            <td>
                                            {{$clientes->persona->documento->tipo_documento}} :
                                            {{$clientes->persona->numero_documento}}
                                            </td>

                                            <td>
                                            {{$clientes->persona->tipo_persona}}

                                            </td>
                                            <td>
                                            @if($clientes->persona->estado == 1)
                                        <span>Activo</span>



                                            @else
                                            <span> no Activo</span>
                                            @endif

                                            </td>

                                           


<td>

<div class="btn-group" role="group" aria-label="Basic example">
                                                <form action="{{route('clientes.edit',['cliente'=>$clientes])}}">
                                                    @csrf
  <button type="submit" class="btn btn-sucess">Actualizar</button>
  </form>

  @if($clientes->persona->estado == 1)
  <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$clientes->id}}" >Borrar</button>

  @else
  <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$clientes->id}}" >Restaurar</button>

  @endif

</div>



</td>


<!-- Modal -->
<div class="modal fade" id="confirmModal-{{$clientes->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ $clientes->persona->estado == 1 ? '¿Seguro que quieres eliminar la presentacione' : '¿Seguro que quieres restaurar la presentacione?' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{route('clientes.destroy',['cliente'=>$clientes->persona->id])}}" method='post'>
                        @method('DELETE')
                        @csrf
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>














</div>
@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{asset('js/datatables-simple-demo.js')}}"></script> 
@endpush
