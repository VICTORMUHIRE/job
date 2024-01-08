@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">        
        <div class="col-md-8 ">
           @include('message')

           <div class="card shadow-lg">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form action="{{route('login.post')}}" method="post">
                    @csrf
                  
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control">
                        @if($errors -> has('email'))                         
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" name="password" class="form-control">
                        @if($errors -> has('password'))                         
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary text-center" type="submit">Login</button>
                    </div>
                </form>
            </div>
           </div>
        </div>
    </div>
</div>


@endsection