<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        // dd($socialUser);

        $userRegistered = User::where('google_id', $socialUser->id)->first();

        if ($userRegistered) {
            FacadesAuth::login($userRegistered);
            return redirect('/dashboard');
        }
        $user = User::updateOrCreate([
            'google_id' => $socialUser->id,
        ], [
            'full_name' => $socialUser->name,
            'image' => $socialUser->avatar,
            'email' => $socialUser->email,
            'password' => null,
            'google_token' => $socialUser->token,
            'google_refresh_token' => $socialUser->refreshToken,
        ]);

        FacadesAuth::login($user);

        return redirect('/dashboard');
    }
}
