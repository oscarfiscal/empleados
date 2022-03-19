<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::create([
            'name' => 'Colombia',
            'code' => 'CO',
        ]);

        $country->city()->createMany([
            ['name' => 'Bogotá', 'code' => 'BOG'],
            ['name' => 'Medellín', 'code' => 'MED'],
            ['name' => 'Cali', 'code' => 'CAL'],
        ]);

        $country = Country::create([
            'name' => 'Argentina',
            'code' => 'AR',
        ]);

        $country->city()->createMany([
            ['name' => 'Buenos Aires', 'code' => 'BUE'],
            ['name' => 'Córdoba', 'code' => 'CORD'],
            ['name' => 'Rosario', 'code' => 'ROS'],
        ]);
    }
}
