<h2>

    Welcome To My View Page

    @include('inner');
    {{-- <h1>Hello{{$name}}</h1>  --}}
   
    <a View href="/about">About</a>
    {{-- <h1>hello = {{count($names)}}</h1>  --}}


    @if($names=='Dharmik')
        <h1>hello = {{$name}}</h1> 

    @endif


    @for($i=1;$i<=10;$i++)
    <h3>{{$i}}</h3>
    @endfor 

 
@csrf
    @foreach ($names as $nm)
        <h3>{{$nm}}</h3>
    @endforeach

    <script>
        var $data = @json($names);
        console.log(data)
    </script>
 

