<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
    
    <title>Student Data</title>
</head>
<body>
    

    <div class="container">
     
        <table class="table table-responsive table-secondary table-dark table-hover ">
    
            <thead class="text-uppercase" >
                <tr>
                  <th scope="col">StudentName</th>
                  <th scope="col">Email</th>
                  <th scope="col">ContactNo</th>
                  <th scope="col">DateOfBirth</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Image</th>
                  <th scope="col" colspan="3" class="text text-center">Operation</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                    <td scope="col">{{$item['studentname']}}</td>
                    <td scope="col">{{$item['email']}}</td>
                    <td scope="col">{{$item['contactno']}}</td>
                    <td scope="col">{{$item['dateofbirth']}}</td>
                    <td scope="col">{{strtoupper($item['gender'])}}</td>
                    <td scope="col"><img src="{{ asset($item->image) }}" alt="" title="" style="width: 60px; height: 60px;">

                    </td>

                  
                    <td scope="col"><a href={{"delete/".$item['id']}}  class="btn btn-danger  text-dark " >Delete</a></td>
                  <td>  <a  href="{{route('edit',['id' =>$item->id])}}"  class="btn btn-warning  text-dark "  >Update</a></td>
                   {{-- <td> <a  href="{{route('forcedelete',['id' =>$item->id])}}"  class="btn btn-danger  text-dark "  >Force Delete</a> --}}
                 
                  @endforeach
                 
              </tbody>
    
    
        </table>
    </div>




    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>









