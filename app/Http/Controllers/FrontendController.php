<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function showHomePage()
    {
        return view('frontend.home');
    }

    public function showLoginPage()
    {
        return view('frontend.login');
    }

    //Patient pages functions
    public function showPatientRegister()
    {
        return view('frontend.patient.register');
    }
    public function showPatientDashboard()
    {
        return view('frontend.patient.dashboard');
    }


    //Doctor Pages functions
    public function showDoctorRegister()
    {
        return view('frontend.doctor.register');
    }
    public function showDoctorDashboard()
    {
        return view('frontend.doctor.dashboard');
    }
}
