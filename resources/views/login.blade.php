<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <title>Login Aplikasi</title>
</head>

<body>
    <section id="section-one">
        <div class="ctn-above">
            <img class="image" src="{{ asset('assets/img/image-login.jpg') }}" alt="icon">
            <h6 class="text-above">sistem pembelajaran daring smks pgri 17 lohsari</h6>
        </div>
    </section>
    <form id="login" action="/login.store" method="POST">
        @csrf
        <div class="content-login">
            <h3 class="text-login">login</h3>
            <div class="input">
                <label for="">username</label>
                <input type="text" name="nama">
                @if ($errors->has('name'))
                    <span class="text-error">{{ $errors->first('name') }}</span>
                @endif

                <label for="">password</label>
                <input type="text" name="password">
                @if ($errors->has('password'))
                    <p class="text-error">{{ $errors->first('password') }}</p>
                @endif
                @if (session('error'))
                    <p class="text-error">{{ session('error') }}</p>
                @endif
            </div>
            <button type="submit" class="btn-login">Masuk</button>
            <a class="btn-login" href="{{ route('register') }}">Register</a>
        </div>

    </form>

</body>

</html>
