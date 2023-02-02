<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./assets/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table table-responsive table-secondary table-dark table-hover tablemargin mt-5">
    
            <thead class="text-uppercase  ">
                <tr>
                  <th scope="col">StudentName</th>
                  <th scope="col">Email</th>
                  <th scope="col">ContactNo</th>
                  <th scope="col">DateOfBirth</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Operation</th>
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
                    <td scope="col"><a href={{"delete/".$item['id']}}  class="btn btn-danger btn-sm text-dark" >Delete</a> 
                    <a  href={{"edit/".$item['id']}} data-bs-toggle="modal" data-bs-target="#editmodel" class="btn btn-warning btn-sm text-dark" >Update</a></td>
                  </tr>
                  @endforeach
                
              </tbody>
    
    
        </table>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>









