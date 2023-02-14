@extends('layout.app')
@section('content')
    <div class="container">  
        <div class="row">  
          <div class="col-md-4 offset-md-4">  
            <div class="login-form form-holder">  
                
              <h1 class="text-center">ResetPassword Form</h1>
              <form action="{{route('resetPassword')}}" method="POST" >
                  @csrf
                  @method('post') 
                  <input type="hidden" name="email" value="{{$user->email}}">
                <div class="form-group">  
                  <label for="exampleInputEmail1">Enter New Password </label>  
                  <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Enter New Password">  
                 
                </div>  
                <span class="text-danger">
                  @error('password')
                      {{$message}}
                  @enderror 
              </span>

              <div class="form-group">  
                <label for="exampleInputEmail1">Enter Confirm Password </label>  
                <input type="password" class="form-control" id="password" name="password_confirmation" aria-describedby="emailHelp" placeholder="Enter Confirm Password">  
               
              </div>  
              <span class="text-danger">
                @error('password_confirmation')
                    {{$message}}
                @enderror 
            </span>
              
            <br>
            <input type="submit" class="btn btn-primary btn-lg btn-lg mr-lg-5" name="resetpassword" value="Reset Password">  
              </form>  
            </div>  
          </div>  
        </div>  
      </div>  
@endsection