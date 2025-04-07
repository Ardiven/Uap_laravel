<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Library;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function index(){
        // Retrieve all games from the database
        $games = Game::all();
        return view('games.index', compact('games'));
    }
    public function show($id){
        $game = Game::find($id);
        $library = Library::where('user_id', auth()->user()->id)->where('game_id', $game->id)->first();
        return view('games.gameDetail', compact('game', 'library'));
    }
}
