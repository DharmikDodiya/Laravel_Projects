<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 600px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .buttonmt{
            margin-top: 5%;
        }
    </style>
</head>
<body >
    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data"  class="table table-info">
          <h3 class="text-center mb-5">Upload File in Laravel</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="form-group">  
            <label for="exampleInputEmail1">Enter Name </label>  
            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Name">  
        </div>  
        <div class="custom-file">
            <label for="exampleFormControlInput1" class="form-label">select file</label>
            <input type="file" class="form-control -mb-2" id="choosefile" name="file" placeholder="">

        </div>
        <br>
            <button type="submit" name="submit" class="btn btn-dark btn-block buttonmt">
                Upload Files
            </button>
        </form>
    </div>

   
</body>
</html>