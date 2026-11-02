<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $mystery = Genre::create(['name' => 'Mystery']);
        $drama = Genre::create(['name' => 'Drama']);
        $classic = Genre::create(['name' => 'Classic']);
        $historical = Genre::create(['name' => 'Historical']);
        $literary = Genre::create(['name' => 'Literary']);

        Book::create([
            'title' => 'Smaller and Smaller Circles',
            'author' => 'F.H. Batacan',
            'genre_id' => $mystery->id,
            'year' => 2002
        ]);

        Book::create([
            'title' => 'Dekada 70',
            'author' => 'Lualhati Bautista',
            'genre_id' => $drama->id,
            'year' => 1983
        ]);

        Book::create([
            'title' => 'Noli Me Tangere',
            'author' => 'Jose Rizal',
            'genre_id' => $classic->id,
            'year' => 1887
        ]);

        Book::create([
            'title' => 'Po-on',
            'author' => 'F. Sionil Jose',
            'genre_id' => $historical->id,
            'year' => 1984
        ]);

        Book::create([
            'title' => 'Ilustrado',
            'author' => 'Miguel Syjuco',
            'genre_id' => $literary->id,
            'year' => 2008
        ]);
    }
}
