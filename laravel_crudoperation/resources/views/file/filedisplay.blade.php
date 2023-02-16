<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
    
    <title>File Dispaly</title>

    <style>
      .hidden {
          display:none;
      }
      </style>
</head>
<body>
    <div>
    @include('file.fileupload')
    </div>

    <br>
    <br>

    <div class="container-md">
     
        <table class="table table-striped">
    
            <thead class="text-uppercase" >
                <tr>
                  <th scope="col" class="text-center">FileHolder Name</th>
                  <th scope="col" class="text-center">FileName</th>
                  
                  <th scope="col"  class="text text-center" >Download</th>
                  <th scope="col"  class="text text-center"> Delete</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                    <td scope="col" class="text-center">{{$item['fileholdername']}}</td>
                   
                    <td scope="col" class="text-center">
                      {{-- <a href="{{asset($item['file_path'])}}" target="__blank"></a> --}}
                      <img src="{{asset($item['file_path'])}}" height="60px" width="60px" >
                    </td>
                 
                    <td class="text-center"><a href="{{url('downloadfile',['name'=>$item->name])}}"  class="btn btn-info text-dark btn-md" >Download</a></td>
                    <td class="text-center"> <a  href="{{url('delete',['id' =>$item->id])}}"  class="btn btn-danger btn-md"  >Delete</a></td>
                @endforeach
                 
              </tbody>
          </table>
    </div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>









