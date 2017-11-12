<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();

        $findUser = User::where('email', $user->getEmail())->first();
        if ($findUser) {
            if (Auth::attempt(['email' => $findUser->email, 'password' => '123456'])) {
                return redirect('/');
            }
        } else {
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->fb_image = $user->getAvatar();
            $newUser->fb_link = $user->profileUrl;
            $newUser->password = bcrypt('123456');
            $newUser->save();
            if (Auth::attempt(['email' => $newUser->email, 'password' => '123456'])) {
                return redirect('/');
            }
        }
    }
}
