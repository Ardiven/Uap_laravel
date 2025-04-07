<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genre_details')->insert([
            // Game ID 1
            ['game_id' => 1, 'genre_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 1, 'genre_id' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 1, 'genre_id' => 22, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 1, 'genre_id' => 37, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 2
            ['game_id' => 2, 'genre_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 2, 'genre_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 2, 'genre_id' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 2, 'genre_id' => 29, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 3
            ['game_id' => 3, 'genre_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 3, 'genre_id' => 18, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 3, 'genre_id' => 26, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 3, 'genre_id' => 40, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 4
            ['game_id' => 4, 'genre_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 4, 'genre_id' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 4, 'genre_id' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 4, 'genre_id' => 33, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 5
            ['game_id' => 5, 'genre_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 5, 'genre_id' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 5, 'genre_id' => 28, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 5, 'genre_id' => 39, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 6
            ['game_id' => 6, 'genre_id' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 6, 'genre_id' => 17, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 6, 'genre_id' => 31, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 6, 'genre_id' => 44, 'created_at' => now(), 'updated_at' => now()],

            // Game ID 7
            ['game_id' => 7, 'genre_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 7, 'genre_id' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 7, 'genre_id' => 21, 'created_at' => now(), 'updated_at' => now()],
            ['game_id' => 7, 'genre_id' => 35, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
