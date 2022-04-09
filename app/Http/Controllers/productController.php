<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Productos;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    //Form Create products
    public function productForm(){


        $marcas = Marca::all();
        return view('layouts.product', compact('marcas'));
    }

    //update products
    public function save(Request $request)
    {
        $validation = $this->validate($request, [
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion'=>'required|string|max:200',
            'marca'=>'required',
        ]);

        //update table
        Productos::create([
            'nombre'=>$validation['nombre'],
            'precio'=>$validation['precio'],
            'descripcion'=> $validation['descripcion'],
            'id_marca'=>$validation['marca'],
        ]);

        return redirect('/')->with('Registrado', 'ok');
    }

    //read product
    public function read(){
        $productos = DB::table('Producto')
            // relacion de marca
            ->join('Marca', 'Producto.id_marca', '=', 'Marca.id')
            ->select('Marca.*', 'Producto.*')
            ->Paginate(5);

        return view('layouts.list', compact('productos'));

    }
    //Formulario para Update producto
    public function updateForm(Request $request,$id){


        $validation = $this->validate($request, [
            'nombre' => 'required|string|max:45',
            'precio' => 'required',
            'descripcion'=>'required|string|max:200',
            'marca'=>'required',
        ]);
        Productos::where('id_producto', $id)->first()->update( [
            'nombre'=>$validation['nombre'],
            'precio'=>$validation['precio'],
            'descripcion'=> $validation['descripcion'],
            'id_marca'=>$validation['marca'],
        ]
    );
        //update table

        return redirect('/')->with('Registrado', 'ok');


        return redirect('/')->with('editar', 'ok');
    }

    //Edicion del producto
    public function edit(Request $request, $id){


        $producto = Productos::findOrFail($id);
        $marcas= Marca::all();

        return view('layouts.updateProducto', compact('producto', 'marcas'));
    }

    public function delete($id){

        $productos = Productos::findOrFail($id)->delete();
        return back()->with('productoEliminado', 'Producto eliminado');
    }

    //excepciones
    public function store(Request $request){
        $data = request()->validate([
            'nombre' => 'required|max:45',
            'descripcion' => 'required|max:45',
            'precio' => 'required',
            'marca'=>'required'
        ], [
            'nombre.required' => 'El campo nombre no debe estar vacio.',
            'descripcion.required' => 'El campo descripcion no debe estar vacio.',
            'precio.required' => 'El campo precio no debe estar vacio.',

            'nombre.max' => 'El nombre no puede tener más 45 caracteres.',
            'descripcion.max' => 'La descripcion del producto  no puede tener más 45 caracteres.',
            'precio.max' => 'El precio del producto no puede tener más 10 digitos.',
        ]); // termina el bloque de validacion

        try {
            $producto = Productos::create([
                'nombre' => $data['nombre'],
                'descripcion' => $data['descripcion'],
                'precio' => $data['precio'],
                'marca' => $data['id_marca'],
            ]);
        } catch (\Exception $exception) {
            $message=$exception->getMessage();
            $tipoError=" Excepción General del Sistema ";
            return view('exceptions.exceptions', compact('message', 'tipoError'));
        }catch (QueryException $queryException){
            $message= $queryException->getMessage();
            $tipoError=" Excepción de Base de Datos ";
            return view('errors.404', compact('message', 'tipoError'));
        }catch (ModelNotFoundException $modelNotFoundException){
            $message=$modelNotFoundException->getMessage();
            $tipoError=" Excepción en el Servidor ";
            return view('errors.404', compact('message', 'tipoError'));
        }


        return redirect()->route('producto.product')->with('success', 'Registro realizado exitosamente');
    }

}
