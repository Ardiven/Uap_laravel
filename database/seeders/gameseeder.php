<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class gameseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
            [
            'title' => 'Far Cry 2',
            'description' => 'Game Description',
            'image' => 'game_image/F2.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry 3',
            'description' => 'Game Description',
            'image' => 'game_image/F3.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry 4',
            'description' => 'Game Description',
            'image' => 'game_image/F4.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry 5',
            'description' => 'Game Description',
            'image' => 'game_image/F5.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry 6',
            'description' => 'Game Description',
            'image' => 'game_image/F6.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry Primal',
            'description' => 'Game Description',
            'image' => 'game_image/Fprimal.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ],
        [
            'title' => 'Far Cry New Dawn',
            'description' => 'Game Description',
            'image' => 'game_image/Fnd.jpg',
            'created_at' => '2022-01-01',
            'developer' => 1,
        ]
        ]);
        
    }
}
