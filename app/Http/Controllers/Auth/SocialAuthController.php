<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function twitterCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
        $user = User::whereProviderId($twitterUser->id)->first();
        if (!$user){
            $user = User::create([
                'name' => $twitterUser->name,
                'email' => $twitterUser->email,
                'avatar' => $twitterUser->avatar,
                'provider' => 'twitter',
                'provider_id' => $twitterUser->id,
            ]);
        }
        Auth::login($user);
        return redirect()->to('/');
    }

    public function twitterRedirect()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function facebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();
        dd($facebookUser);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
}
