

    @extends('layout.app')
    @section('content')
        

     
    <div class="container">  
      <div class="row">  
        <div class="col-md-4 offset-md-4">  
          <div class="login-form form-holder table table-bordered ">  
            <h1 class="text-center">Login Form</h1>
            <form action="{{route('login')}}" method="POST" >
                @csrf
                @method('post')  
                <span class="text-success">
                  @if(Session::has('success'))
                  {{Session::get('success')}}
                  @endif
                </span>
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
            
            <a href="{{route('forgetpassword')}}" class="btn btn-link">Forget Password</a>
               <br><br>
               <span class="text-danger">
                {{-- @if(count($errors) > 0)
                    @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                    @endforeach
                @endif --}}

                @if(Session::has('error'))
                {{Session::get('error')}}
                @endif
              </span>
              <button type="submit" class="btn btn-success btn-lg btn-lg mr-lg-5" name="login" value="Login"> Login </button>  

              <a href="{{route('register')}}" class="btn btn-primary btn-lg btn-lg mr-lg-5" >Register</a>
            </form>  
          </div>  
        </div>  
      </div>  
    </div>  

    @endsection