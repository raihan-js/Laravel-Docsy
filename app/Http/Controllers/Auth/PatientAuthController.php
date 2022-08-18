<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Notifications\PatientAccountNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{

    /**
     * Patient Register method
     */
    public function register(Request $request)
    {
        //Form Data Validation
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required',
            'password'  => 'required|confirmed'
        ]);

        $token = md5(time() . rand());

        //Form Data Send to Database
        $patient = Patient::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => password_hash($request->password, PASSWORD_DEFAULT),
            'access_token'  => $token,
        ]);

        //Sent account activation Notification
        $patient->notify(new PatientAccountNotification($patient));

        // Redirect
        return redirect()->route('patient.register')->with('success', "Hi " . $patient->name  . ", your account created successfully");
    }

    /**
     * Patient Login method
     */
    public function login(Request $request)
    {
        //Form Data Validation
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //Auth Implementation
        if (Auth::guard('patient')->attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ]) || Auth::guard('patient')->attempt([
            'phone'     => $request->email,
            'password'  => $request->password,
        ])) {

            //activation check logic
            if (Auth::guard('patient')->user()->access_token == NULL && Auth::guard('patient')->user()->status == true) {
                return redirect()->route('patient.dashboard');
            } else {
                Auth::guard('patient')->logout();
                return redirect()->route('login.page')->with('warning', 'Please activate your account! Check your email inbox.');
            }
        } else {
            return redirect()->route('login.page')->with('danger', 'Email or password invalid');
        }
    }

    /**
     * Patient Logout method
     */
    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect()->route('login.page')->with('success', 'Logged out successfully');
    }


    /**
     * Patient account activation
     */
    public function patientAccountActivation($token)
    {
        if (!$token) {
            return redirect()->route('login.page')->with('danger', 'Your account is not activated!');
        }

        if ($token) {
            $patient_data = Patient::where('access_token', $token)->first();

            if ($patient_data) {


                $patient_data->update([
                    'access_token'  => NULL,
                    'status'        => true,
                ]);


                return redirect()->route('login.page')->with('success', 'Your account is verified! Now Log in!');
            } else {
                return redirect()->route('login.page')->with('warning', 'Not verified! Please try again later.');
            }
        }
    }
}
