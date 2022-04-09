@extends('layouts.index')

@section('title', 'Listado de productos')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h1 class="text-center mt-5"style="color: white"> <i class="fas fa-glass-cheers" style="color: white"></i> PRODUCTOS  </h1>

                <!-- Boton de registro -->
                <a class="btn btn-outline-success mb-3" href="{{url('/Product/Create')}}"><i class="fas fa-plus-square"></i> Registrar Producto</a>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead STYLE="background-color: #CD5C5C">
                    <tr style="color: white">

                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Actualizar / Eliminar</th>
                    </tr>
                    </thead>

                    <tbody class="">
                    @foreach($productos as $producto)
                        <tr>

                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>Q {{$producto->precio}}</td>
                            <td>{{$producto->Marca}}</td>
                            <td>
                                <div class="btn-group">

                                        <a href="{{route('editarproducto', $producto->id_producto)}}">
                                            <i class="fas fa-pencil-alt btn btn-outline-primary mb-2 mr-2"> Actualizar</i>
                                        </a>

                                        <form id="formulario-eliminar" action="{{ route('eliminar', $producto->id_producto) }}" method="POST" class="formulario-eliminar">
                                            @csrf @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="deleteAlert(event)"  class= "btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash-alt"> Eliminar</i>
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                <div>{{$productos->links() }}</div>

            </div>
        </div>
    </div>
@endsection
<!-- Alert Eliminar Usuario SweetAlert2 -->
@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El producto se elimino con exito.',
                'success'
            )
        </script>
    @endif

    <script>
        function deleteAlert(e){
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "El producto se eliminara",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc298',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    /*Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )*/
                    $('#formulario-eliminar').submit();

                }
            })
        }

    </script>
@endsection
