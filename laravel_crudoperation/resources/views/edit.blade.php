<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
</head>
<body>
<div class="modal fade" id="editform" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Update Student</h5>
              <button type="button" class="btn-close" id="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/')}}/update/{{$data->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$data['id']}}">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$data['studentname']}}" placeholder="Enter Name">
                    <span class="text-danger">
                      @error('name')
                          {{$message}}
                      @enderror 
                  </span><br>
    
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$data['email']}}" placeholder="Enter Email">
                    <span class="text-danger">
                      @error('email')
                          {{$message}}
                      @enderror 
                  </span><br>
    
                    <label for="exampleFormControlInput1" class="form-label">ContactNo</label>
                    <input type="text" class="form-control" id="contactno" name="contactno"  value="{{$data['contactno']}}" placeholder="Enter ContactNo">
                    <span class="text-danger">
                      @error('contactno')
                          {{$message}}
                      @enderror 
                  </span><br>
    
                    <label for="exampleFormControlInput1" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob"  value="{{date('Y-m-d',strtotime($data->dateofbirth))}}">
                    
                    <span class="text-danger">
                      @error('dob')
                          {{$message}}
                      @enderror 
                  </span><br>
    
                    <div> <label for="exampleFormControlInput1" class="form-label">Gender</label></div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{$data->gender == 'male' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"  value="female" {{ $data->gender == 'female' ? 'checked' : ''}}>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"  value="other" {{ $data->gender == 'other' ? 'checked' : ''}} >
                        <label class="form-check-label" for="inlineRadio3">Other</label>
                      </div><br>
                      <span class="text-danger">
                        @error('gender')
                            {{$message}}
                        @enderror 
                    </span><br>
    
                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image"  value="{{$data['image']}}" placeholder="Enter Image">
                    <span class="text-danger">
                      @error('image')
                          {{$message}}
                      @enderror 
                  </span><br>
    
                   
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close " data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success  " data-bs-dismiss="modal">update</button>
                      </div>
                </form>
            </div>
           
          </div>
        </div>
      </div>




      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('#editform').modal('show');
    });
    $('#close').on('click',function(){
        window.history.back();
    });
    $('.close').on('click',function(){
        window.history.back();
    });


</script>


</body>
</html>