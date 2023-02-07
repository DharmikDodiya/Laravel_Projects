<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="3" align="center">
        <tr>
            <td>id</td>
            <td>blogname</td>
            <td>blog Description</td>
            <td>email</td>
            <td>categoryname</td>
        </tr>
        <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->blogname}}</td>
            <td>{{$blog->blog_description}}</td>
            <td>{{$blog->email}}</td>
            <td>{{$blog->category->category_name}}</td>
        </tr>

    </table>
</body>
</html>