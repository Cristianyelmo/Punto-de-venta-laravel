@extends('template')

@section('title','presentaciones')


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



                        <h1 class="mt-4 text-center">presentaciones</h1>
                        <ol class="breadcrumb mb-4">
                       
                            <li class="breadcrumb-item active"><a href="{{route('panel')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">presentaciones</li>
                        </ol>

    <a href="{{route('presentaciones.create')}}"><button type='button'
     class='btn btn-primary'>Añadir nuevo registro</button></a>


     <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                            Tablas presentaciones
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Descripcion</th>

                                            <th>Office</th>
                                             <th>Estado</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                      @foreach($presentaciones as $presentacione)
                                        <tr>
                                            <td>
                                                {{$presentacione->caracteristica->nombre}}
                                            </td>
                                            <td>
                                                {{$presentacione->caracteristica->descripcion}}
                                            </td>
                                            <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <form action="{{route('presentaciones.edit',['presentacione'=>$presentacione])}}">
                                                    @csrf
  <button type="submit" class="btn btn-sucess">Actualizar</button>
  </form>

  @if($presentacione->caracteristica->estado == 1)
  <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$presentacione->id}}" >Borrar</button>

  @else
  <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$presentacione->id}}" >Restaurar</button>

  @endif

</div>




                                            </td>

                                            <td>
                                                @if($presentacione->caracteristica->estado == 1)
                                            <span class=''>Activo</span>

                                                @else

                                                <span class=''>No Activo</span>


                                                @endif
                                            </td>
                                        </tr>
        


                                        <!-- Button trigger modal -->

  




    <!-- Modal -->
    <div class="modal fade" id="confirmModal-{{$presentacione->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ $presentacione->caracteristica->estado == 1 ? '¿Seguro que quieres eliminar la presentacione' : '¿Seguro que quieres restaurar la presentacione?' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{route('presentaciones.destroy',['presentacione'=>$presentacione->id])}}" method='post'>
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