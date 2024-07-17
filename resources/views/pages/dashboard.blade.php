<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Dashboard</h1>
    <h1>welcome {{ Auth::User()->name }}</h1>
    <a href="{{ route('logoute') }}" class="btn btn-primary">logout</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Profile</th>
        </tr>

        @foreach ($userdata as $item_data)
            <tr>
                <td>{{$item_data->name}}</td>
                <td>{{$item_data->phone_number}}</td>
                <td>{{$item_data->email}}</td>
                <td><img src="{{asset('/storage/',$item_data->images)}}" alt=""></td>
            </tr>
        @endforeach
    </table>

</body>

</html>
