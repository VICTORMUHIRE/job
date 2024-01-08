<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeekerRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const JOB_SEEKER = 'seeker';
    public function createSeeker()
    {
        return view('users.seeker-register');
    }
    public function storeSeeker(SeekerRegistrationRequest $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'user_type' => self::JOB_SEEKER
        ]);

        return back();
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
    }
}
