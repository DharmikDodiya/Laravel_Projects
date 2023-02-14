

    @extends('layout.app')
    @section('content')
        

     
    <div class="container">  
      <div class="row">  
        <div class="col-md-4 offset-md-4">  
          <div class="login-form form-holder">  
            <h1 class="text-center">Login Form</h1>
            <form action="{{route('login')}}" method="POST" >
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
              <div class="form-group">  
                <label for="exampleInputPassword1"> Enter Password </label>  
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">  
              </div>  
              <span class="text-danger">
                @error('password')
                    {{$message}}
                @enderror 
            </span>
            
            <a href="{{route('forgetpassword')}}" class="">Forget Password</a>
               <br><br>
              <button type="submit" class="btn btn-primary btn-lg btn-lg mr-lg-5" name="login" value="Login"> Login </button>  

              <a href="{{route('register')}}" class="btn btn-dark btn-lg btn-lg mr-lg-5" >Register</a>
            </form>  
          </div>  
        </div>  
      </div>  
    </div>  

    @endsection