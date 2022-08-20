<?php

use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PatientProfileController;
use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;



//Home and Login routes
Route::get('/', [FrontendController::class, 'showHomePage'])->name('home.page');
Route::get('login', [FrontendController::class, 'showLoginPage'])->name('login.page')->middleware('patient.login.redirect');

//Forgot password route
Route::get('forgot-password', [FrontendController::class, 'forgotPasswordShow'])->name('forgot.password')->middleware('patient.login.redirect');

//Patient account activation
Route::get('patient_account_activation/{token?}', [PatientAuthController::class, 'patientAccountActivation'])->name('patient.account.activation');

//Patient Pages routes
Route::get('patient-register', [FrontendController::class, 'showPatientRegister'])->name('patient.register')->middleware('patient.login.redirect');
Route::get('patient-dashboard', [FrontendController::class, 'showPatientDashboard'])->name('patient.dashboard')->middleware('patient');
Route::get('patient-settings', [PatientProfileController::class, 'showPatientSettings'])->name('patient.settings')->middleware('patient');
Route::get('patient-password', [PatientProfileController::class, 'showPatientPassword'])->name('patient.password')->middleware('patient');
//Patient Profile POST Routes
Route::post('patient-password', [PatientProfileController::class, 'patientPasswordChange'])->name('patient.password.change')->middleware('patient');
Route::post('patient-settings', [PatientProfileController::class, 'patientProfileUpdate'])->name('patient.profile.update')->middleware('patient');



//Auth Routes (Patient) (POST)
Route::post('patient-register', [PatientAuthController::class, 'register'])->name('patient.register.auth');
Route::post('patient-login', [PatientAuthController::class, 'login'])->name('patient.login');
Route::get('patient-logout', [PatientAuthController::class, 'logout'])->name('patient.logout');





//Doctor Pages routes
Route::get('doctor-register', [FrontendController::class, 'showDoctorRegister'])->name('doctor.register');
Route::get('doctor-dashboard', [FrontendController::class, 'showDoctorDashboard'])->name('doctor.dashboard');

/*--------------------------------------------------------------------- */


/**Social Login Routes (Facebook) */
Route::get('facebook-login-request', [SocialLoginController::class, 'sendFacebookLoginRequest'])->name('facebook.login.request');
Route::get('facebook-login-system', [SocialLoginController::class, 'loginWithFacebook'])->name('facebook.login');



/**Social Login Routes (Google) */
Route::get('google-login-request', [SocialLoginController::class, 'sendGoogleLoginRequest'])->name('google.login.request');
Route::get('google-login-system', [SocialLoginController::class, 'loginWithGoogle'])->name('google.login');
