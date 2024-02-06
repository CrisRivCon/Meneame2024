<?php

namespace Database\Factories;

use App\Models\Comentario;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comentario>
 */
class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => fake()->realText(),
            'usuario_id' => 1,
            'comentable_id' => fake()->randomElement([1,2,3,4]),
            'comentable_type' => fake()->randomElement([Publicacion::class, Comentario::class]),
        ];
    }
}
