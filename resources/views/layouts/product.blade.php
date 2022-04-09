@extends('layouts.index')

@section('title', 'Create')

@section('content')
    <div class="container ml-5">
    <div class=" row justify-content-center" >
        <div class="col-md-7 mt-5 ml-5">
            <br><br>
            <div class="card">
                <form action="{{ route('save') }}" method="POST" >
                    @csrf

                    <div class=" card-header text-center"  style="color: #CD5C5C">
                        <h3><i class="fas fa-cocktail"></i> Registrar Bebidas </h3>
                    </div>

                    <div class="card-body">

                        <div class="row form-group">
                            <label for="" class="col-2"><i class="fas fa-glass-whiskey"style="font-size:50px;"></i></label>
                            <input type="text" class="form-control col-md-9" value="{{old('nombre')}}" name="nombre"  placeholder="Nombre del producto">
                            {{--{{$errors->first('name')}}--}}
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2"><i class="fas fa-file-alt" style=font-size:50px;"></i></label>
                            <input type="text" name="descripcion" class="form-control col-md-9"  value="{{old('descripcion')}}" placeholder="Descripcion del  producto">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2"><i class="far fa-money-bill-alt" style="font-size:50px;" ></i></label>
                            <input type="text" name="precio" class="form-control col-md-9" value="{{old('precio')}}"  placeholder="Precio">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2"><i class="fas fa-glass-cheers"style="font-size:50px;"></i></label>
                            <select name="marca" class="form-control col-md-9"  value="{{old('id_marca')}}" placeholder="marca del producto">
                                <option value="" class="text-center"> Marca del producto </option>

                                @foreach( $marcas as $marca)
                                    <option value="{{$marca->id}}" class="text-center"> {{$marca->Marca}}  </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row form-group">
                            <button id="guardado" type="submit"  class="btn btn-outline-success col-md-4 offset-2 mr-3"  onclick="guardadoAlert(event)"><i class="fas fa-save"></i> Guardar Producto</button>
                            <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/') }}"><i class="fas fa-ban"></i> Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection
@section('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function guardadoAlert(e){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Producto Guardado',
                showConfirmButton: false,
                timer: 100000,
            }).then((result) => {
                if (result.isConfirmed)
                {
                    $('#guardado').submit();
                }
            })
        }
    </script>

@endsection
