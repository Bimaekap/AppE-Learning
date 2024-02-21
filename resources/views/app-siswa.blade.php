<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/layouts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/table/table-soal-essay-pilgan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/table/table-daftarsoal-ujian.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components/table/table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/beranda.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/halaman-siswa/menu-materi-siswa.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/halaman-siswa/menu-pilihan-ujian-siswa.css') }}">
    @stack('styles')

    <title>Document</title>

</head>

<body>
    @include('sweetalert::alert')

    @auth

    @if (auth()->user()->role === 'siswa')
    <div class="flex">
        <div id="sidebar">
            <h3 class="sidebar-text">E-Learning</h3>
            <section>
                <div class="user-link">
                    <img class="a-tag-image" src="{{ asset('assets/img/pengguna.png') }}" alt="">
                    <a href="{{ route('dashboard.siswa') }}">Dashboard</a>
                </div>
                <h3 class="text-bagian-kelas">Menu Utama</h3>
                <div class="list-kelas-link">

                    {{-- <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/beranda.png') }}" alt="">
                        <a href="">Ujian</a>
                    </div> --}}
                    <div class="link-one a-tag-materi-siswa">
                        <img class="a-tag-image" src="{{ asset('assets/img/beranda.png') }}" alt="">
                        <a class="a-tag-materi-siswa" href="{{ route('MateriSiswa.index') }}">Materi</a>
                    </div>
                    {{-- <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/beranda.png') }}" alt="">
                        <a href="#">Video</a>
                    </div>
                </div> --}}
            </section>

        </div>
        {{-- <div id="show">
            <section class="cpanel-guru">
                <div class="beranda-ctn">
                    <h1>beranda</h1>
                </div>
                <div id="ctn-card">

                    <div class="card card-one">
                        <h6>Siswa Laki-laki</h6>
                        <hr>
                        <div class="flex-img">
                            <img class="cpanel-image" src="{{ asset('assets/img/kelas.png') }}" alt="">
                            <h1>1 kelas</h1>
                        </div>

                    </div>
                    <div class="card card-two">
                        <h6>Siswa Perempuan</h6>
                        <hr>
                        <div class="flex-img">
                            <h1>1 siswa</h1>
                            <img class="cpanel-image" src="{{ asset('assets/img/siswa.png') }}" alt="">
                        </div>
                    </div>
                    <div class="card card-three">
                        <h6>Jumlah Ujian</h6>
                        <hr>
                        <div class="flex-img">
                            <img class="cpanel-image" src="{{ asset('assets/img/mapel.png') }}" alt="">
                            <h1>1 mapel</h1>
                        </div>
                    </div>
                    <div class="card card-four">
                        <h6>Soal Tersedia</h6>
                        <hr>
                        <div class="flex-img">
                            <img class="cpanel-image" src="{{ asset('assets/img/materi.png') }}" alt="">
                            <h1>400 Soal</h1>
                        </div>
                    </div>
                </div>
            </section>
        </div> --}}
        @include('components.navbar')
        <div class="setting-ctn">
            <a href="" class="shadow-img">
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