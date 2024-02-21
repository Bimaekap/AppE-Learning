@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/beranda.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/dashboard-guru.css') }}">

@endpush
<section class="cpanel">
    <div class="cpanel-ctn">
        <h1>DASHBOARD</h1>
    </div>
    <div id="ctn-card">
        <div class="card card-one">
            <h6 class="h6-admin">Siswa Laki-laki</h6>
            {{--
            <hr> --}}
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/kelas.png') }}" alt="">
                <h1>{{ count((array)$pria) }} Siswa</h1>
            </div>
        </div>
        <div class="card card-two">
            <h6>Siswa Perempuan</h6>
            {{--
            <hr> --}}
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/siswa.png') }}" alt="">

                <h1>{{ count((array)$perempuan) }} Siswa</h1>

            </div>
        </div>
        <div class="card card-three">
            <h6>Jumlah Guru</h6>
            {{--
            <hr> --}}
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/mapel.png') }}" alt="">
                <h1>{{ $teacher }} Guru</h1>
            </div>
        </div>
        {{-- <div class="card card-four">
            <h6>Materi Pelajaran</h6>
            <hr>
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/materi.png') }}" alt="">
                <h1>400 Soal</h1>
            </div>
        </div> --}}
    </div>
</section>
<section class="tabel-dashboard-guru">
    <div class="header-dashboard-guru">
        <h1>Pengguna Aktif T.A 2023/2024</h1>

    </div>
    <table>
        <thead>

            <tr>
                <th class="th-no">No</th>
                <th class="th-nama">Nama</th>
                <th class="th-nama">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</section>
@endsection