<?php

namespace App\Http\Controllers;


use App\Models\games;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LibraryController extends Controller
{
    public function showLibrary(){
        $sidebars = Library::where('user_id', auth()->user()->id)->get();
        return view('games.library', compact('sidebars'));
    }
    public function addToLibrary(Request $request, games $game)
    {
        $user = auth()->user();
        
        Library::create([
            'user_id' => $user->id,
            'game_id' => $game->id,
        ]);

        return back()->with('success', 'Game added to library');
    }
    public function detailLibrary($game_id){
        $sidebars = Library::where('user_id', auth()->user()->id)->get();
        $details = Library::where('user_id', auth()->user()->id)->where('game_id', $game_id)->first();
        return view('games.library', compact('sidebars', 'details'));
    }
}
