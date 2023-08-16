<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nombre' => 'Drama'
        ]);

        Categoria::create([
            'nombre' => 'Thriller'
        ]);
        Categoria::create([
            'nombre' => 'Suspenso'
        ]);

        Categoria::create([
            'nombre' => 'Romance'
        ]);
        Categoria::create([
            'nombre' => 'Ficción'
        ]);

        Categoria::create([
            'nombre' => 'Terror'
        ]);
    }
}
