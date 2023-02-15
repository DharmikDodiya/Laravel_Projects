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
                  <span class="text-danger">
                    @if (Session::has('success'))
                        {{Session::get('sucess')}}
                    @endif
                  </span>
  
                <div class="form-group">  
                  <label for="exampleInputEmail1">Enter Email address </label>  
                  <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">  
                 
                </div>  
                <span class="text-danger">
                  @if (Session::has('error'))
                      {{Session::get('error')}}
                  @endif
                </span>


              
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-lg mr-lg-5" name="forgetPassword" value="send"> Send Mail </button>
            <a href="{{route('login')}}" class="btn btn-dark btn-lg btn-lg mr-lg-5" >Login</a>
              </form>  
            </div>  
          </div>  
        </div>  
      </div>  