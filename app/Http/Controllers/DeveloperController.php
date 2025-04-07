<?php

namespace App\Http\Controllers;

use App\Models\developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{
    public function showLogin(){
        $role = "developer";
        return view('auth.login', compact('role'));
    }
    public function showRegister(){
        $role = "developer";
        return view('auth.register', compact('role'));
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = developer::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('developer.dashboard');
        }


        return back()->with(['email' => 'Email atau password salah']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        developer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('developer.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    public function dashboard(){
        $developer = Auth::user();
        return view('developer.dashboard', compact('developer'));
    }
}
