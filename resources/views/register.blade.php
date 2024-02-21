<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="flex">

        <form action="{{ route('register.create') }}" method="POST">
            @csrf
            <label for="">name</label>
            <input type="text" name="nama">
            @if ($errors->has('nama'))
            <p class="errors-style">
                {{ $errors->first('nama') }}
            </p>
            @endif
            <label for="">password</label>
            <input type="text" name="password">
            <label for="">role</label>
            <input type="text" name="role">
            <button type="submit">Register</button>
            <a style="color:white;" href="{{ URL('/') }}">login disini</a>
        </form>
    </div>

</body>

</html>