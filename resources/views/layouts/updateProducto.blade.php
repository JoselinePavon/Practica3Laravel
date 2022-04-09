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
                                <label for="" class="col-2"><i class="fas fa-glass-whiskey"style="font-size:50px;"></i></label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $producto->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-2"><i class="fas fa-file-alt" style=font-size:50px;"></i></label>
                                <input type="text" name="descripcion" class="form-control col-md-9" value="{{ $producto->descripcion }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2"><i class="far fa-money-bill-alt" style="font-size:50px;" ></i></label>
                                <input type="text" name="precio" class="form-control col-md-9" value="{{ $producto->precio }}">
                            </div>

                            <div class="row form-group">
                                <label for="" class="col-2"><i class="fas fa-glass-cheers"style="font-size:50px;"></i></label>
                                <select name="marca" class="form-control col-md-9" >
                                    <option value="" class="text-center"> Seleccione la marca </option>

                                    @foreach( $marcas as $marca)
                                        <option value="{{$marca->id}}" class="text-center"> {{$marca->Marca}}  </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row form-group">
                                <button id="modificar" type="submit" class="btn btn-outline-success col-md-4 offset-2 mr-3" onclick="modificarAlert(event)" > <i class="fas fa-marker"></i> Modificar</button>
                                <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/') }}"><i class="fas fa-ban"></i> Cancelar</a>
                            </div>

                        </div>

                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection
<!-- Alert Actualizar Producto SweetAlert2 -->
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function modificarAlert(e){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Producto Actualizado',
                showConfirmButton: false,
                timer: 100000,
            }).then((result) => {
                if (result.isConfirmed)
               {
                    $('#modificar').submit();
                }
            })
        }
    </script>

@endsection

