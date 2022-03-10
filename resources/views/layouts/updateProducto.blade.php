@extends('layouts.index')

@section('title', 'Producto Update')

@section('content')
    <div class="container ml-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5 ml-5">
                <br><br>
                <div class="card">
                    <form action="{{ route('actualizar', $producto->id_producto)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center " style="color: #CD5C5C">
                            <h4>Modificar Producto</h4>
                        </div>

                        <div class="card-body">


                            <div class="row form-group">
                                <label for="" class="col-3">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-8" value="{{ $producto->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-3">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control col-md-8" value="{{ $producto->descripcion }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Preico</label>
                                <input type="text" name="precio" class="form-control col-md-8" value="{{ $producto->precio }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-3">Marca</label>
                                <select name="marca" class="form-control col-md-8" >
                                    <option value="" class="text-center"> Seleccione la marca </option>

                                    @foreach( $marcas as $marca)
                                        <option value="{{$marca->id}}" class="text-center"> {{$marca->Marca}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button type="submit" class="btn btn-outline-success col-md-4 offset-2 mr-3">Modificar</button>
                                <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/') }}">Cancelar</a>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
