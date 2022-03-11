<?php

namespace Database\Seeders;

use App\Models\Marca;
use App\Models\Productos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Marca::factory()->count(50)->create();
        Productos::factory()->count(50)->create();
    }
}
