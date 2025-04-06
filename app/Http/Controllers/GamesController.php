<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;

class GamesController extends Controller
{
    public function index(){
        // Retrieve all games from the database
        $games = Games::all();
        return view('games.index', compact('games'));
    }
    public function show($id){
        $game = Games::find($id);
        return view('games.gameDetail', compact('game'));
    }
}
