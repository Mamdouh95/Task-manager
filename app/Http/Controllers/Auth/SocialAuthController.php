<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $user = User::whereProviderId($socialUser->id)->first();
        if (!$user){
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'avatar' => $socialUser->avatar,
                'provider' => $provider,
                'provider_id' => $socialUser->id,
            ]);
        }
        Auth::login($user);
        Session::flash('success', 'Login success');
        return redirect()->to('/home');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
