<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Productos;
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
            ->paginate(5);


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
}
