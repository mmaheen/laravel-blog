<?php

namespace App\Http\Controllers\Sanctum;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('sanctum.register');
    }

    public function store(Request $request)
    {
        // Validate and create the user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:1|confirmed',
        ]);

        // Create the user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // dd($request->all());
        return redirect()->route('sanctum.login')->with('success', 'Registration successful. Please log in.');
    }
}
