<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
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
    
    
}
