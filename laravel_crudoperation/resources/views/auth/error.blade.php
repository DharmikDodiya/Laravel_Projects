

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>error</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>
    <div class="modal" tabindex="-1" id="errorModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Error Message</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="crossbtn" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-danger text-bold">
                @if(Session::has('error'))
                    {{Session::get('error')}}
                @endif
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnclose">Close</button>
              <button type="button" class="btn btn-primary" id="btnnext">Login Page</button>
            </div>
          </div>
        </div>
      </div>
    
<script>
    $(document).ready(function () {
       $("#errorModal").modal('show');
       $(document).on("click","#btnclose",function(){
            var val = "{{route('register')}}";
            location.href = val;
       });
       $(document).on("click","#btnnext",function(){
            var url = "{{route('login')}}";
            location.href = url;
       });
       $(document).on("click","#crossbtn",function(){
            var url = "{{route('login')}}";
            location.href = url;
       });
    });
    
</script>
</body>
</html>





