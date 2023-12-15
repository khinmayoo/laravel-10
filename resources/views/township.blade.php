<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Township Page</h1>
     <a href="{{route('login')}}">Login</a>

     <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>State ID</th>
        </tr>

        <tbody>
            @foreach ($township as $value)
            <tr>

                <td>{{$value->id}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->state->name}}</td>
            </tr>
            @endforeach

        </tbody>
     </table>
</body>
</html>
