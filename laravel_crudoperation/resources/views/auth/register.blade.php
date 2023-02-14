@extends('layout.app')
@section('content')
    


<div class="container">  
  <div class="row">  
    <div class="col-md-4 offset-md-4">  
      <div class="login-form form-holder" >  
        <h1 class="text-center">Register Form</h1>
        <form action="{{route('register')}}" method="POST" >
            @csrf
            @method('post')  
          <div class="form-group">  
            <label for="exampleInputEmail1">Enter Name </label>  
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">  
        </div>  
        <span class="text-danger">
            @error('name')
                {{$message}}
            @enderror 
        </span>
        <br>
          <div class="form-group">  
            <label for="exampleInputPassword1"> Enter Email </label>  
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">  
          </div> 
          <span class="text-danger">
            @error('email')
                {{$message}}
            @enderror 
        </span>
        <br>
          <div class="form-group">  
            <label for="exampleInputPassword1"> Enter Password </label>  
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">  
          </div> 
          <span class="text-danger">
            @error('password')
                {{$message}}
            @enderror 
        </span>
        <br>
          <div class="form-group">  
            <label for="exampleInputPassword1"> Enter Confirm Password </label>  
            <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Enter Confirm Pasword">  
          </div>  
          <span class="text-danger">
            @error('password_confirmation')
                {{$message}}
            @enderror 
        </span>
        <br>
          <button type="submit" class="btn btn-primary btn-lg mr-lg-5" value="Register" name="register"> Register </button>  
          <a href="{{route('login')}}" class="btn btn-dark btn-lg mr-5" >Login</a>
        </form>  
      </div>  
    </div>  
  </div>  
</div>  

@endsection