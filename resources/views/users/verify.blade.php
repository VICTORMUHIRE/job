@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
       <div class="card">
        <div class="card-header">Verify Acount</div>
        <div class="card-body">
            <p>your account is not verified. 
            Please verify it first. yoou may resend the verification email
            <a href="{{route('resend.email')}}">Resend email verification</a>
            </p>
        </div>
       </div> 
    </div>
</div>

@endsection