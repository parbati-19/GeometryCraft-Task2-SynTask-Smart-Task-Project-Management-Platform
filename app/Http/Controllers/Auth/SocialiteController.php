<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider, Request $request)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();

            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'password' => bcrypt(Str::random(16)),
                    'email_verified_at' => now(),
                    'provider_name' => $provider, 
                    'provider_id' => $socialUser->getId(), 
                ]
            );

            Auth::login($user);
            dd(Auth::check());

            // session()->regenerate();

            // if (Auth::check()) {
            //     return redirect()->route('dashboard');
            // }

            // return redirect('/login')->with('error', 'User not authenticated after login.');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Failed to login using ' . $provider);
        }
    }
}
