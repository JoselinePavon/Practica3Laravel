<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
//ruta raiz
Route::get('/', [productController::class, 'read']);
//registrar producto
Route::get('/Product/Create', [productController::class, 'productform']);
Route::post('/Product/Save', [productController::class, 'save'])->name('save');
//ruta editar
Route::get('/Product/edit/{id}', [productController::class, 'edit'])->name('editarproducto');
//ruta eliminar
Route::delete('/Product/delete/{id}', [productController::class, 'delete'])->name('eliminar');
//ruta modificar
Route::patch('/actualizar/{id}',[productController::class, 'updateForm'])->name('actualizar');
