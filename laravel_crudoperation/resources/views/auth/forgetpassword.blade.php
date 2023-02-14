@extends('layout.app')
@section('content')
    <div class="container">  
        <div class="row">  
          <div class="col-md-4 offset-md-4">  
            <div class="login-form form-holder">  
              <h1 class="text-center">ForgetPassword Form</h1>
              <form action="{{route('forgetpassword')}}" method="POST" >
                  @csrf
                  @method('post')  
                <div class="form-group">  
                  <label for="exampleInputEmail1">Enter Email address </label>  
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">  
                 
                </div>  
                <span class="text-danger">
                  @error('email')
                      {{$message}}
                  @enderror 
              </span>
              
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-lg mr-lg-5" name="forgetPassword" value="send"> Send Mail </button>
              </form>  
            </div>  
          </div>  
        </div>  
      </div>  