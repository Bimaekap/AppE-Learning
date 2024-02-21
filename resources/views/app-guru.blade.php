<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/layouts.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/components/table/table.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/dashboard-guru.css') }}">

    @stack('styles')
    <title>Document</title>
</head>

<body>
    @include('sweetalert::alert')
    @auth
    @if (auth()->user()->role === 'guru')
    <div class="flex">
        <div id="sidebar">
            <h3 class="sidebar-text">E-Learning</h3>
            <section>
                <div class="user-link">
                    <img class="a-tag-image" src="{{ asset('assets/img/beranda.png') }}" alt="">
                    <a href="{{ route('dashboard.guru') }}">Beranda</a>
                </div>
                <h3 class="text-bagian-kelas">Kelas</h3>
                <div class="list-kelas-link">

                    {{-- ! Fitur Manajemen Bank Soal --}}
                    {{-- <div class="container">
                        <img class="a-tag-image" src="{{ asset('assets/img/box.png') }}" alt="">
                        <button class="btn-manajemen-bank-soal" id="btn">
                            Manajemen Bank Soal
                        </button>
                        <div class="dropdown" id="dropdown">
                            <div class="position-dropdown">
                                <a href="{{ route('bank-soal-essay') }}" class="link-dropdown">
                                    Soal Essay
                                </a>
                            </div>
                            <div class="position-dropdown">
                                <a href="{{ route('bank-soal-pilgan') }}" class="link-dropdown">
                                    Soal Pilgan
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="link-one">
                        <img class="a-tag-image" src="{{ asset('assets/img/mapel.png') }}" alt="">
                        <a href="{{ route('ManajemenUjian.index') }}">Manajemen Ujian</a>
                    </div>
                    --}}
                    <div class="link-two">
                        <img class="a-tag-image" src="{{ asset('assets/img/materi-siswa.png') }}" alt="">
                        <a href="{{ route('subjects.index') }}">Manajemen Materi</a>
                    </div>
                    <div class="link-two">
                        <img class="a-tag-image" src="{{ asset('assets/img/materi-siswa.png') }}" alt="">
                        <a href="{{ route('manajemen-tugas') }}">Manajemen Tugas</a>
                    </div>
                </div>
                <hr />

            </section>
        </div>
        @include('components.navbar')
        <div class="setting-ctn">
            <a href="{{ route('profile.guru',auth()->user()->id) }}" class="shadow-img">
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