<?php

namespace Database\Seeders;

use App\Models\Empleados;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados= Empleados::factory()->times(10)->create();
    }
}
