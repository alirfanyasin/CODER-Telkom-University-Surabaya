<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $findUser = User::where('google_id', $googleUser->id)->first();

        if ($findUser) {
            Auth::login($findUser);
            return redirect()->intended('/app');
        } else {
            $user = User::updateOrCreate(
                ['google_id' => $googleUser->id],
                [
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make('password'),
                    'avatar' => $googleUser->avatar,
                    'label' => Label::LABEL_NAME['guest'],
                ]
            );
            $user->assignRole('guest');
            Auth::login($user);
            return redirect()->intended('/app');
        }
    }
}
