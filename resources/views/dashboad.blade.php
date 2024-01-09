@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center"> 

        Hello, {{auth()->user()->name}}
        <p>Your trial expire on {{auth()->useer()->user_trial }}</p>


        
    </div>
</div>
@endsection