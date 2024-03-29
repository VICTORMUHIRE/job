@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for a Employee?</h1>
            <h3>Please create an account</h3>
            <img src="{{asset('image/register.jpg')}}" alt="">
        </div>
        <div class="col-md-6 ">
           <div class="card" id="card">
            <div class="card-header"> Employer Registration</div>
            <div class="card-body " >   
                <form action="#" method="post" id="registrationForm">
                  
                    <div class="form-group">
                        <label for="">Company name</label>
                        <input type="text" name="name" class="form-control" required>

                        @if($errors -> has('name'))                         
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" required>
                        @if($errors -> has('email'))                         
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" name="password" class="form-control" required>
                        @if($errors -> has('password'))                         
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" id="btnRegister">Register</button>
                    </div>
                </form>
            </div>
           </div>
           <div id="message"></div>
        </div>
    </div>
   
</div>

<script>
    var url = "{{route('store.employer')}}";
    document.getElementById('btnRegister').addEventLister('click', function(event) {
        var form = document.getElementById('registrationForm')
        var messageDiv = document.getElementById(message)
        var card = document.getElementById('card')
        messageDiv.innerHTML = ''
        var formData = new FormData(form)

        var button = event.target
        button.disabled = true
        button.innerHTML = 'sending email ...'

        fetch(url,{
            method:"POST",
            headers:{
                'X-CSRF-TOKEN':{{csrf_token}}
            },
            body:formData
        }).then(response => {
            if(response.ok){
                return response.json();
            }else{
                throw new Error('Error')
            }
        }).then(data=>{
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = ' <div class="alert alert-success"> REgistration was successful. please check your email to verifie it</div>'
            card.style.display = 'none'
        }).catch(error =>{
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = ' <div class="alert alert-danger"> Something went wrong. Llease try again</div>'
            
        })
    })
</script>
@endsection