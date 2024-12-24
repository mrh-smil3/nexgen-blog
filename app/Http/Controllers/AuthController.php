<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $roles = [
                'full_name' => 'required|max:255',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255',
            ];

            $validateData = $request->validate($roles);

            $validateData['password'] = Hash::make($request->password);

            User::create($validateData);

            return redirect('/auth/login')->with('success', 'Register Success');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
