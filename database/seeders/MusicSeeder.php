<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Music;

class MusicSeeder extends Seeder
{
    public function run()
    {
        Music::create([
            'title' => 'Song Title 1',
            'artist' => 'Artist 1',
            'year' => 2022,
            'category_id' => 1 // Adjust based on your existing categories
        ]);

        Music::create([
            'title' => 'Song Title 2',
            'artist' => 'Artist 2',
            'year' => 2023,
            'category_id' => 2 // Adjust based on your existing categories
        ]);
    }
}
