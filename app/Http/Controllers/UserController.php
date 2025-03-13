<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', compact ('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'User created successful!');

    }

    public function edit(user $user)
    {
        return view('users.edit', compact ('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        return redirect()->route('users.index')->with('success', 'User updated successfully');
        }

    
    public function destroy(User $user)
{
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User updated successfully');
}
public function show(user $user)
    {
        return view('users.edit', compact ('user'));
    }

}