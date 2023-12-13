
@extends('template')



@section('title','Productos')

@push('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
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
                                            <th>Codigo</th>
                                            <th>Nombre</th>

                                            
                                             <th>Marca</th>
                                             <th>Presentacion</th>
                                             <th>Categorias</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $item)
                                        <tr>
                                            <td>
                                                {{$item->codigo}}
                                            </td>
                                            <td>
                                                {{$item->nombre}}
                                            </td>
                                          
                                            <td>
                                                {{$item->marca->caracteristica->nombre}}
                                            </td>

                                            <td>
                                                {{$item->presentacione->caracteristica->nombre}}
                                            </td>

                                            <td>
                                               
                                            
                                            
                        @foreach ($item->categorias as $category)
<div class="container">
    <div class="row">
        <span>{{$category->caracteristica->nombre}}</span>
    </div>
</div>

                        @endforeach 
                                            </td>

                                            <td>
@if($item->estado === 1)

<span>Activo</span>

 @else
 <span>NO Activo</span>
 @endif






                                            </td>




                                            <td>
                                                <form action="{{route('productos.edit',['producto'=>$item])}}">
                                            <button type="submit" class="btn btn-sucess">Actualizar</button>
                                            </form>

                                            <button type="submit" class="btn btn-sucess" data-bs-toggle="modal" data-bs-target="#verModal-{{$item->id}}">Ver</button>
                                            @if($item->estado == 1)
                                            <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}" >Borrar</button>

  @else
  <button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$item->id}}" >Restaurar</button>

  @endif



                                            </td>
                                        </tr>

                                        <div class="modal fade" id="verModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle del producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <div class="row">
                    <label for="">Descripcion:{{$item->descripcion}}</label>
                 </div>
                 <div class="row">
                    <label for="">Fecha de vencimiento:{{$item->fecha_vencimiento == '' ? 'No tiene fecha' : $item->fecha_vencimiento}}</label>
                 </div>

                 <div class="row">
                    <label for="">Stock:{{$item->stock === 0 ? 'NO tiene stock' : $item->stock}}</label>
                 </div>

                 <div class="row">
                    <label for="">Imagen:</label>
                    <div>
                 @if($item->img_path != null)
                <img class='img-fluid .img-thumbnail' src="{{Storage::url('public/productos/'.$item->img_path)}}" alt="">
                 @else

<span>no tiene foto</span>

                 @endif


                    </div>
                 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="confirmModal-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mensaje de confirmacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  {{ $item->estado == 1 ? '¿Seguro que quieres eliminar la marca' : '¿Seguro que quieres restaurar la marca?' }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{route('productos.destroy',['producto'=>$item->id])}}" method='post'>
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
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<script src="{asset('js/datatables-simple-demo.js')}}"></script> 
@endpush
