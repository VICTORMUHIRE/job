<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    const JOB_POSTER = 'employer';

    public function createSeeker()
    {
        return view('users.seeker-register');
    }

    public function createEmployer()
    {
        return view('users.employer-register');
    }
    public function storeSeeker(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);
        $user->sendEmailVerificationNotifiacation();
        return redirect()->route('login')->with('successMessage', 'your account was created') ;
    }
    public function storeEmployer(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_POSTER,
            'user_trial' => now()->addWeek()
        ]);
        $user->sendEmailVerificationNotifiacation();
        return redirect()->route('login')->with('successMessage', 'your account was created')  ;
    }


    public function login()
    {
        return view('users.login');
    }
    public function loginPost(Request $request)
    {
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials =$request ->only('email', 'password');

        if (Auth::attempt($credentials)) {
           return redirect()->intended('dashboad');
        }
        return 'Wrong email or password';
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login'); 
    }
}
