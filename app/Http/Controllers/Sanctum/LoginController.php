<?php

namespace App\Http\Controllers\Sanctum;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;
use Illuminate\Validation\Rules\Exists;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('sanctum.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:1',
        ]);

        //Login user
        $user = User::where('email', $request->email)->first();
        // dd(password_verify($request->password, $user->password));
        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->withInput();
        }
        Auth::login($user, $request->boolean('remember'));
        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        //Invalidate all active sessions
        $request->session()->invalidate();
        //Regenerate CSRF token
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
