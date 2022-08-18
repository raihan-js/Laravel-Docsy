<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientProfileController extends Controller
{
    public function showPatientSettings()
    {
        return view('frontend.patient.settings');
    }
    public function showPatientPassword()
    {
        return view('frontend.patient.password');
    }
    public function patientPasswordChange(Request $request)
    {
        //Old Password Check
        if (!password_verify($request->old_password, Auth::guard('patient')->user()->password)) {
            return back()->with('danger', 'Old password did not match!');
        }

        //password confirm match
        if ($request->password != $request->password_confirmation) {
            return back()->with('warning', 'Password did not match');
        }

        //database password update
        $patient_data = Patient::findOrFail(Auth::guard('patient')->user()->id);
        $patient_data->update([
            'password'      => Hash::make($request->password),
        ]);

        //logout and successful message
        Auth::guard('patient')->logout();
        return redirect()->route('login.page')->with('success', 'Password changed successfully!');
    }

    //Patient photo change
    public function patientProfileUpdate(Request $request)
    {
        $update_profile = Patient::findOrFail(Auth::guard('patient')->user()->id);


        if ($request->hasFile('photo')) {
            $uploaded_file = $request->file('photo');
            $photo_name = md5(time() . rand()) . '.' . $uploaded_file->clientExtension();
            $uploaded_file->move(storage_path('app/public/frontend/'), $photo_name);
        } else {
            $photo_name = 'avatar.png';
        }




        $update_profile->update([
            'blood_group'       => $request->blood_group,
            'date_of_birth'     => $request->date_of_birth,
            'age'               => $request->age,
            'address'           => $request->address,
            'city'              => $request->city,
            'country'           => $request->country,
            'photo'             => $photo_name,
        ]);
        return back()->with('success', 'Profile Saved Successfully');
    }
}
