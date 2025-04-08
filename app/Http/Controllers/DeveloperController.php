<?php

namespace App\Http\Controllers;

use App\Models\developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
    
        if (Auth::guard('developer')->attempt($credentials)) {
            return redirect()->route('developer.dashboard');
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
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
        $developer = Auth::guard('developer');
        return view('developer.dashboard', compact('developer'));
    }
    public function logout(){
        Auth::guard('developer')->logout();
        return redirect()->route('developer.login');
    }
    public function update(Request $request)
    {
        $user = Auth::guard('developer');
        try{
        // Validasi input
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique('developers')->ignore($user->id())],
            'password' => ['nullable', 'string', 'min:8'],
            'image' => ['nullable', 'image', 'max:2048'], // Maks 2MB
        ]);

        // Update name jika diisi
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        // Update email jika diisi
        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Update image jika ada
        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($user->image && Storage::exists('public/' . $user->image)) {
                Storage::delete('public/' . $user->image);
            }

            // Simpan file baru
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
