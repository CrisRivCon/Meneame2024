<?php

namespace Database\Factories;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicacion>
 */
class PublicacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Publicacion::class;

    public function definition(): array
    {
        return [
            'titulo' => fake()->catchPhrase(),
            'url' => 'https://laravel.com/docs/10.x/seeding#running-seeders',
            'descripcion' => fake()->realText(),
            'usuario_id' => fake()->randomElement([1,2,3,4]),
            'imagen' => fake()->word(),
        ];
    }
}
