<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>State Page</h1>
     <a href="{{route('login')}}">Login</a>

     <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>

        <tbody>
            @if(isset($state))
                @foreach ($state as $value)
                <tr>

                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                </tr>
                @endforeach
            @endif

        </tbody>
     </table>
</body>
</html>
