<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Libro::create([
            'categoria_id' => 1,
            'autor' => 'Autor 1',
            'nombre' => 'Libro 1',
            'precio' => 20,
            'fecha_lanzamiento' => '2023-08-16',
            'rentado' => false
        ]);

        Libro::create([
            'categoria_id' => 2,
            'autor' => 'Autor 2',
            'nombre' => 'Libro 2',
            'precio' => 25,
            'fecha_lanzamiento' => '2023-08-17',
            'rentado' => false
        ]);
        Libro::create([
            'categoria_id' => 3,
            'autor' => 'Autor 3',
            'nombre' => 'Libro 3',
            'precio' => 20,
            'fecha_lanzamiento' => '2023-08-16',
            'rentado' => false
        ]);

        Libro::create([
            'categoria_id' => 4,
            'autor' => 'Autor 4',
            'nombre' => 'Libro 4',
            'precio' => 25,
            'fecha_lanzamiento' => '2023-08-17',
            'rentado' => false
        ]);
        Libro::create([
            'categoria_id' => 5,
            'autor' => 'Autor 5',
            'nombre' => 'Libro 5',
            'precio' => 20,
            'fecha_lanzamiento' => '2023-08-16',
            'rentado' => false
        ]);

        Libro::create([
            'categoria_id' => 6,
            'autor' => 'Autor 6',
            'nombre' => 'Libro 6',
            'precio' => 25,
            'fecha_lanzamiento' => '2023-08-17',
            'rentado' => false
        ]);
    }
}
