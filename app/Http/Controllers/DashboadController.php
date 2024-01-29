<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboad');
    }
    public function verify()
    {
        return view('users.verify');
    }
    public function resend(Request $request){
        $user = Auth::user(); 
        if($user->hasVerifiedEmail()){
            return redirect()->route('dashboad')->with('success','your email was verified'); 
        }
        $user-> sendEmailVerificationNotification();
        return back()->with('success','verification link sent successfully'); 
    }   
}
