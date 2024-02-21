@extends('app-admin')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/admin/master-data-pendidik.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>Menu Data Siswa</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Data Pendidik / Guru</h1>
        {{-- <div class="btn-ctn">
            <a class="btn-one" href="">
                <img class="icon-size" src="{{ asset('assets/img/excel.png') }}" alt="">
                Form Guru
            </a>
            <a class="btn-two" href="">
                <img class="icon-size" src="{{ asset('assets/img/upload.png') }}" alt="">
                Upload Data
            </a>
        </div> --}}
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">NIP</th>
                <th class="th-size-3">Nama Lengkap</th>
                <th class="th-size-4">Jabatan</th>
                <th class="th-size-5">Jenis Kelamin</th>
                <th class="th-size-6">nomor_hp</th>
                <th class="th-size-7">View</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id}}</td>
                <td>{{ $teacher->nomor_induk}}</td>
                <td>{{ $teacher->nama}}</td>
                <td>{{ $teacher->jabatan}}</td>
                <td>{{ $teacher->jenis_kelamin}}</td>
                <td>{{ $teacher->nomor_hp}}</td>
                <td>
                    <a class="icon-crud" href="{{ route('MasterPendidik.show', $teacher->id) }}">
                        <img class="icon-crud-size" src="{{ asset('assets/img/eye.png') }}" alt="">
                    </a>
                </td>
                @empty
                <td>
                    data guru kosong
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-materi')
        </div>
    </div>
</section>
@endsection