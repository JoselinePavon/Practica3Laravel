<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='Producto';
    public $timestamps=false;
    protected $fillable=[
        'nombre', 'descripcion','precio','id_marca',
    ];

    protected $primaryKey='id_producto';

}
