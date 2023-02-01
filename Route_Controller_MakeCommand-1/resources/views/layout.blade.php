<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Name - @yield('title')</title>
</head>
<body>
    {{-- @section('header')
    <div class="header">
        <h1>Header Part</h1>
    </div>
    @show

    <div class="content">
        @yield('content')
    </div>

    @section('footer')
    <div class="footer">
        <h1>Footer Part</h1>
    </div>
    @show --}}

    @include('header')
    
    @show

    <div class="content">
        @yield('content')
    </div>

    @include('footer')
    
    @show
        
    
    
</body>
</html>
