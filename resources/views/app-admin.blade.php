<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/dashboard-guru.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/layouts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @stack('styles')
    <title>Document</title>
</head>

<body>
    @include('sweetalert::alert')

    @auth

    @if (auth()->user()->role === 'admin')
    <div class="flex">
        <div id="sidebar">
            <h3 class="sidebar-text">E-Learning</h3>
            <section>
                <div class="user-link">
                    <img class="a-tag-image" src="{{ asset('assets/img/pengguna.png') }}" alt="">
                    <a href="{{ route('dashboard.admin') }}">Dashboard</a>
                </div>

                <h3 class="text-bagian-kelas">Master</h3>
                <div class="list-kelas-link">
                    <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/user.png') }}" alt="">
                        <a href="{{ route('MasterSiswa.index') }}">Data Siswa</a>
                    </div>
                    <div ciass="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/whiteboard.png') }}" alt="">
                        <a href="{{ route('MasterPendidik.index') }}">Data Pendidik</a>
                    </div>
                    <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/materi-siswa.png') }}" alt="">
                        <a href="{{ route('MasterMapel.index') }}">Master Mapel</a>
                    </div>
                    <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/kelas.png') }}" alt="">
                        <a href="{{ route('MasterKelas.index') }}">Master Kelas</a>
                    </div>
                    <hr />
                </div>
            </section>
        </div>
        @include('components.navbar')
        <div class="setting-ctn">
            <a href="{{ route('profile.admin',auth()->user()->id) }}" class="shadow-img">
            </a>
            <img class="img-sizing-icon-profile" src="{{ asset('assets/img/user-set.png') }}" alt="">
        </div>

        @yield('content')
    </div>
    @else
    <x-user-block-message>
    </x-user-block-message>
    @endif
    @endauth
    @stack('script')
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>

</body>

</html>