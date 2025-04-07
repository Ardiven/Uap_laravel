<?php

namespace App\Http\Controllers;


use App\Models\Game;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LibraryController extends Controller
{
    public function showLibrary(){
        $sidebars = Library::where('user_id', Auth::user()->id)->get();
        return view('games.library', compact('sidebars'));
    }
    public function addToLibrary(Request $request, Game $game)
    {
        $user = Auth::user();
        
        Library::create([
            'user_id' => $user->id,
            'game_id' => $game->id,
        ]);

        return back()->with('success', 'Game added to library');
    }
    public function detailLibrary($game_id){
        $sidebars = Library::where('user_id', Auth::user()->id)->get();
        $details = Library::where('user_id', Auth::user()->id)->where('game_id', $game_id)->first();
        return view('games.library', compact('sidebars', 'details'));
    }
// Menandai sebagai downloaded & redirect
public function markAsDownloaded($id) {
    $library = Library::where('user_id', Auth::user())->where('game_id', $id)->first();

    if ($library) {
        $library->downloaded = true;
        $library->save();
    }

    return back()->with('download', true);
}

// Mengirim file download
public function download($id) {
    $game = Game::findOrFail($id);
    $filePath = public_path('storage/' . $game->image);

    if (!file_exists($filePath)) {
        abort(404, 'File tidak ditemukan');
    }

    return response()->download($filePath);
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
