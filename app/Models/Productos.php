<?php

namespace App\Models;

use Database\Factories\ProductoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory; // el modelo sepa que debe de usar las factorias
    protected $table='Producto';
    public $timestamps=false;
    protected $fillable=[
        'nombre', 'descripcion','precio','id_marca',
    ];

    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    protected $primaryKey='id_producto';

    protected static function newFactory(): ProductoFactory
    {
        return ProductoFactory::new();
    }

}
