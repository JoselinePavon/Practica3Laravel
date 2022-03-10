@extends('layouts.index')

@section('title', 'Listado de productos')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h2 class="text-center mt-5"> PRODUCTOS </h2>

                <!-- Boton de registro -->
                <a class="btn btn-outline-success mb-3" href="{{url('/Product/Create')}}"><i class="fas fa-plus-square"></i> Registrar Producto</a>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead STYLE="background-color: #CD5C5C">
                    <tr>

                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Acciones</th>
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

                                        <form action="{{ route('eliminar', $producto->id_producto) }}" method="POST" class="formulario-eliminar">
                                            @csrf @method('DELETE')
                                            <button type="submit" onclick=" return confirm('¿Seguro de eliminar el producto?')" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash-alt"> Eliminar</i>
                                            </button>
                                        </form>
                                    </div>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $productos->links() }}

            </div>
        </div>
    </div>
@endsection
