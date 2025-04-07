<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function showLogin()
    {
        $role = "user";
        return view('auth.login', compact('role'));
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('games.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    public function showRegister()
    {
        $role = "user";
        return view('auth.register', compact('role'));
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index');
    }
    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.index');
    }
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
    public function search(Request $request){
        $search = $request->search;
        $users = User::where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->paginate(5);
                return view('users.index', compact('users'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('games.index');
    }
    public function dashboard(){
        $review = Review::where('user_id', Auth::user()->id)->get();
        $games = Library::where('user_id', Auth::user()->id)->get();
        $playtime = 0;
        foreach ($games as $game) {
            if($game->downloaded){
            $startTime = $game->pivot->created_at ?? $game->created_at;
            $now = Carbon::now();
    
            // Hitung durasi dalam jam
            $hoursPlayed = $startTime ? $startTime->diffInHours($now) : 0;
    
            $playtime += $hoursPlayed;
            }
            
        }
        return view('user.dashboard', compact('review', 'games', 'playtime'));
    }

}
