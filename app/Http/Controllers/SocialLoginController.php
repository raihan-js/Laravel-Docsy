<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //send request to Facebook
    public function sendFacebookLoginRequest()
    {
        return Socialite::driver('facebook')->redirect();
    }

    //Facebook login info
    public function loginWithFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $login_user = Patient::where('facebook_id', $user->id)->first();

        if ($login_user) {
            Auth::guard('patient')->login($login_user);
            return redirect('/patient-dashboard');
        } else {
            $patient = Patient::create([
                'name'      => $user->name,
                'email'     => $user->email,
                'password'  => '',
                'phone'     => '',
                'status'    => true,
                'facebook_id'  => $user->id,
            ]);

            Auth::guard('patient')->login($patient);
            return redirect('/patient-dashboard');
        }
    }


    /**
     * send request to Google
     */

    public function sendGoogleLoginRequest()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google login info
    public function loginWithGoogle()
    {
        $user = Socialite::driver('google')->user();
        $login_user = Patient::where('google_id', $user->id)->first();

        if ($login_user) {
            Auth::guard('patient')->login($login_user);
            return redirect('/patient-dashboard');
        } else {
            $patient = Patient::create([
                'name'      => $user->name,
                'email'     => $user->email,
                'password'  => '',
                'phone'     => '',
                'status'    => true,
                'google_id'  => $user->id,
            ]);

            Auth::guard('patient')->login($patient);
            return redirect('/patient-dashboard');
        }
    }
}
