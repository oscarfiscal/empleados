<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleados>
 */
class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->lastName,
            'cedula' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'ciudad_nacimiento' => $this->faker->city,
        
        ];
    }
}
