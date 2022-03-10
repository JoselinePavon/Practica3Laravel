@extends('layouts.index')

@section('title', 'Create')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <!-- Mensaje Flash -->
            @if(session('productSave'))
                <div class="alert alert-success">
                    {{ session('productSave') }}
                </div>
            @endif
        <!-- Validacion de Errores -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <form action="{{ route('save') }}" method="POST">
                    @csrf
                    <div class="card-header text-center"  style="color: #CD5C5C">
                        <h3>Registrar Bebidas </h3>
                    </div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-3">Nombre:</label>
                            <input type="text" name="nombre" class="form-control col-md-8">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Descripcion:</label>
                            <input type="text" name="descripcion" class="form-control col-md-8">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-3">Precio:</label>
                            <input type="text" name="precio" class="form-control col-md-8">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-3">Marca: </label>
                            <select name="marca" class="form-control col-md-8" >
                                <option value="" class="text-center"> Marca del producto </option>

                                @foreach( $marcas as $marca)
                                    <option value="{{$marca->id}}" class="text-center"> {{$marca->Marca}}  </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-outline-success col-md-4 offset-2 mr-3"><i class="fas fa-save"></i> Guardar Producto</button>
                            <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/') }}"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
