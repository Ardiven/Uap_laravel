<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class genre extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $genres = [
            'Action', 'Adventure', 'RPG', 'Simulation', 'Strategy', 'Sports',
            'Racing', 'Casual', 'Indie', 'Puzzle', 'Platformer', 'Shooter',
            'Multiplayer', 'Singleplayer', 'Co-op', 'Survival', 'Horror',
            'Open World', 'Sandbox', 'Fighting', 'Stealth', 'Rhythm', 'Turn-Based',
            'Visual Novel', 'Card Game', 'Board Game', 'Educational', 'Exploration',
            'Crafting', 'Building', 'Farming', 'Base Building', 'Souls-like', 'Roguelike',
            'Roguelite', 'Tower Defense', 'MOBA', 'Battle Royale', 'Point & Click',
            'Walking Simulator', 'Text-Based', 'Hack and Slash', 'Metroidvania',
            'Bullet Hell', 'City Builder', 'Management', 'Physics', 'Comedy',
            'Mystery', 'Sci-Fi', 'Fantasy', 'Post-apocalyptic', 'Cyberpunk',
            'Historical', 'Dystopian', 'Lovecraftian', 'Western', 'Detective',
            'Crime', 'Vampire', 'Zombies', 'Pirates', 'Noir', 'Time Travel',
            'Space', 'Naval', 'Mechs', 'Steampunk', 'Superhero', 'Cats', 'Dogs',
            'Fishing', 'Cooking', 'Typing', 'Trivia', 'Match 3', 'Solitaire',
            'Chess', 'Mahjong', 'Tabletop', 'Pinball', 'Retro', '8-bit', '16-bit',
            'Pixel Graphics', 'Cartoon', 'Anime', 'Cute', 'Dark Humor', 'Parody',
            'Satire', 'Psychological Horror', 'LGBTQ+', 'Family Friendly', 'Experimental'
        ];

        $data = array_map(function ($genre) {
            return ['name' => $genre];
        }, $genres);

        DB::table('genres')->insert($data);
    }
}
