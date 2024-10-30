<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Драма', 'Комедия', 'Ужасы', 'Фантастика', 'Боевик', 'Романтика'];

        foreach ($genres as $genre) {
            Genre::create(['name' => $genre]);
        }
    }
}
