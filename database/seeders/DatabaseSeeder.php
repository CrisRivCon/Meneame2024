<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comentario;
use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        Publicacion::factory()
                    ->count(5)
                    ->create();

        Comentario::factory()
                    ->count(5)
                    ->create();

        Comentario::factory()
        ->count(5)
        ->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
