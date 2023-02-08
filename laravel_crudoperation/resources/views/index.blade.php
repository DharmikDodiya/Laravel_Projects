<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container-fluid">
       
        <nav class="navbar navbar-dark bg-info">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="">AddStudents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn-dark" href="{{route('restore')}}">Restore All</a>
                  </li>
                 </ul>
              </div>
            </div>
          </nav>
      </div>
<h1 class="text text-center h1"> Student Register Page</h1>
<div class="container">
<button type="button" class="btn btn-dark text-lg-center btn-pading btn-lg" data-bs-toggle="modal" data-bs-target="#addstudent">
    Add Blog
  </button>
</div>

 
  <div class="modal fade" id="addstudent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Register Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('/')}}/store" method="POST" enctype="multipart/form-data">
                @csrf
               
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter FirstName" value="{{old('name')}}">
                <span class="text-danger">
                    @error('name')
                        {{$message}}
                    @enderror 
                </span>
                <br>

                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email')
                        {{$message}}
                    @enderror 
                </span>
                <br>

                <label for="exampleFormControlInput1" class="form-label">ContactNo</label>
                <input type="text" class="form-control" id="contactno" name="contactno" placeholder="Enter ContactNo" value="{{old('contactno')}}">
                <span class="text-danger">
                    @error('contactno')
                        {{$message}}
                    @enderror 
                </span>
                <br>

                <label for="exampleFormControlInput1" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter Date Of Birth" value="{{old('dob')}}">
                <span class="text-danger">
                    @error('dob')
                        {{$message}}
                    @enderror 
                </span>
                <br>

                <div> <label for="exampleFormControlInput1" class="form-label">Gender</label></div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{ old('gender') == 'male' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{ old('gender') == 'female' ? 'checked' : ''}}>
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio3" vvalue="other" {{ old('gender') == 'other' ? 'checked' : ''}} >
                    <label class="form-check-label" for="inlineRadio3">Other</label>
                  </div><br>
                  <span class="text-danger">
                    @error('gender')
                        {{$message}}
                    @enderror 
                </span>
                <br>


                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image" value="{{old('image')}}">
                <span class="text-danger">
                    @error('image')
                        {{$message}}
                    @enderror 
                </span>
                <br>


                <label for="exampleFormControlInput1" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                <span class="text-danger">
                    @error('password')
                        {{$message}}
                    @enderror 
                </span>
                <br>


                <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ReEnter Password">
                <span class="text-danger">
                    @error('confirm_password')
                        {{$message}}
                    @enderror 
                </span>
                <br>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </form>
        </div>
       
      </div>
    </div>
  </div>



<div>
    @include('display');
</div>

@if(count($errors) >0)
    <script>
      
        $(document).ready(function(){
            $('#addstudent').modal('show');
         });
    </script>

 
@endif





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>