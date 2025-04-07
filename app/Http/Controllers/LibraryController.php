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
    public function download($game_id)
{
    $game = Games::findOrFail($game_id);

    // Update status downloaded ke true di tabel library untuk user saat ini
    $library = Library::where('game_id', $game_id)
                ->where('user_id', Auth::id())
                ->first();

    if ($library) {
        $library->downloaded = true;
        $library->save();
    }

    // Return file download
    response()->download(public_path('storage/' . $game->image));

    return back()->with('success', 'Game downloaded');
}
    public function uninstall($game_id){
        $library = Library::where('game_id', $game_id)
                ->where('user_id', Auth::id())
                ->first();

    if ($library) {
        $library->downloaded = false;
        $library->save();
    }

    return back()->with('success', 'Game uninstalled');
}
}
