<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
    
    <title class="text text-center">Deleted Data Table</title>
</head>
<body>
    <div class="container-fluid">
       
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="paghe" href="{{route('addstudent')}}">AddStudents</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">Restore All</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  
                </ul>
                
              </div>
            </div>
          </nav>



    </div>


    <h1 class="text text-center">Deleted Data Table</h1>



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
                  <th scope="col" colspan="2" class="text text-center">Operation</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                    <td scope="col">{{$item['studentname']}}</td>
                    <td scope="col">{{$item['email']}}</td>
                    <td scope="col">{{$item['contactno']}}</td>
                    <td scope="col">{{$item['dateofbirth']}}</td>
                    <td scope="col">{{$item['gender']}}</td>
                    <td scope="col"><img src="{{ asset($item->image) }}" alt="" title="" style="width: 60px; height: 60px;">

                    </td>

                  
                    <td scope="col"><a href={{"restoredata/".$item['id']}}  class="btn btn-danger  text-dark " >Restore Me</a></td>
                 
                   <td> <a  href="{{route('forcedelete',['id' =>$item->id])}}"  class="btn btn-danger  text-dark "  >Force Delete</a>
                 
                  @endforeach
                 
              </tbody>
    
    
        </table>
    </div>




    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>









