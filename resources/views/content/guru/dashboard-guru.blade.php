@extends('app-guru')
@section('content')
@push('styles')

{{-- style beranda guru --}}
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/dashboard-guru.css') }}">
@endpush
<section class="cpanel">
    <div class="cpanel-ctn">

        <h1>beranda</h1>
    </div>
    <div id="ctn-card">
        <div class="card card-one">
            <h6>kelas yang di ampu</h6>

            <hr>
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/kelas.png') }}" alt="">
                <h1>{{ $jumlahKelas->count() }} KELAS</h1>
            </div>
        </div>
        <div class="card card-two">
            <h6>siswa binaan</h6>
            <hr>
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/siswa.png') }}" alt="">
                <h1></h1>
            </div>
        </div>
        <div class="card card-four">
            <h6>upload materi</h6>
            <hr>
            <div class="flex-img">
                <img class="cpanel-image" src="{{ asset('assets/img/materi.png') }}" alt="">
                <h1>{{ $jumlahMateri->count()}} Materi</h1>
            </div>
        </div>
    </div>
</section>
<section class="tabel-dashboard-guru">
    <div class="header-dashboard-guru">
        <h1>mata pelajaran yang di ampu t.a 2024/2025</h1>
        <p class="" style="margin: 1.5rem 0 0 19rem; font-style:italic; font-size:.9rem;">*menu dibawah merupakan data
            mengajar
            anda</p>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-nama">Nama Kelas</th>
                <th class="th-nama">Nama Mapel</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $kelas )
            <tr>
                <td>

                    <p class="bg-text"> {{ $kelas->nama_kelas }}
                    </p>
                </td>
                <td>
                    @foreach ($kelas->lessons as $lesson )
                    <p class="bg-text">{{ $lesson->nama_mapel }}</p>
                    @endforeach

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</section>
</div>

</html>
@endsection