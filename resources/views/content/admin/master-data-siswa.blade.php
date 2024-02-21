@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-data-siswa.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>Menu Data Siswa</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Data Siswa</h1>
        {{-- <div class="btn-ctn">
            <a class="btn-one" href="">
                <img class="icon-size" src="{{ asset('assets/img/upload.png') }}" alt="">
                Download Data
            </a>
        </div> --}}
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">NISN</th>
                <th class="th-size-3">Nama Siswa</th>
                <th class="th-size-4">Alamat</th>
                <th class="th-size-5">Jenis Kelamin</th>
                <th class="th-size-6">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->nomor_induk }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->jenis_kelamin }}</td>
                <td>
                    <a class="icon-crud" href="{{ route('MasterSiswa.show', $student->id) }}">
                        <img class="icon-crud-size" src="{{ asset('assets/img/eye.png') }}" alt="">
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
    </div>
</section>
@endsection