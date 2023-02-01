<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @extends('layout')
</head>
<body style="text-align: center">
    @section('content')
    <form action="users" method="POST" style="border-block: 2px">
        @csrf
        <label>UserName</label>
        <input type="text" name="username" placeholder="Enter UserName"><br><br>
        <label>PassWord</label>
        <input type="password" name="password" placeholder="Enter password"><br><br>

        <button type="submit">Login</button>
    </form>
    @endsection
</body>
</html>