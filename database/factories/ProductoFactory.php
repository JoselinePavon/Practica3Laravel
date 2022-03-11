<?php

namespace Database\Factories;

use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Productos::class;
    public function definition()
    {
        return [

            'nombre' => $this->faker->name(),
            'descripcion' =>Str::random(10),
            'precio' => $this->faker->randomFloat(0,0,1000),
            'id_marca' =>$this->faker->biasedNumberBetween(1,50),
        ];
    }
}
