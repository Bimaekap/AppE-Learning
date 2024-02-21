@extends('app-siswa')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/halaman-siswa/menu-materi-siswa.css') }}">
@endpush
<section class="cpanel-materi-siswa">
    <div class="materi-siswa-ctn">
        <h1> menu materi </h1>
    </div>
    <section class="tabel-data-materi-siswa">
        <div class="header-tabel-data-materi-siswa">
            <h1>Pilih Materi Sesuai Mata Pelajaran</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="th-no">No</th>
                    {{-- nama mapel --}}
                    <th class="th-mapel">Mata Pelajaran</th>
                    {{-- nama guru --}}
                    <th class="th-guru">Guru Pengajar</th>
                    <th>Pesan Dari Guru</th>
                    <th class="th-lihat">Lihat Materi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataTableSubject as $materiPerKelas )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $materiPerKelas->nama_mapel_get }}</td>
                    <td>{{ $materiPerKelas->nama_guru }}</td>
                    <td>{{ $materiPerKelas->nama_materi }}</td>
                    <td><a href="{{ route('pilihan-materi', $materiPerKelas->id) }}">
                            <img class="lihat-materi-image" src="{{ asset('assets/img/search.png') }}" alt="">
                        </a></td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </section>
</section>
@endsection