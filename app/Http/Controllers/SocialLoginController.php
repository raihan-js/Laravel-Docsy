<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //send request to FB
    public function sendFacebookLoginRequest()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook login info
    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $login_user = Patient::where('oauth_id', $user->id)->first();

        if ($login_user) {
            Auth::guard('patient')->login($login_user);
            return redirect('/patient-dashboard');
        } else {
            $patient = Patient::create([
                'name'      => $user->name,
                'email'     => $user->email, //email will not be fetched untill the permission turned on from FB
                'password'  => '',
                'status'    => true,
                'oauth_id'  => $user->id,
            ]);

            Auth::guard('patient')->login($patient);
            return redirect('/patient-dashboard');
        }
    }
}
