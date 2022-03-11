<?php

namespace App\Models;

use Database\Factories\MarcaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table='marca';
    public $timestamps=false;
    protected $fillable=[
         'marca',
    ];

    protected $primaryKey='id';

    protected static function newFactory(): MarcaFactory
    {
        return MarcaFactory::new();
    }
}
