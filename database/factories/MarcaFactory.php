<?php

namespace Database\Factories;

use App\Models\Marca;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Marca::class;
    public function definition()
    {
        return [
            'marca' => $this->faker->name(),
        ];
    }
}
