@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/manajemen-ujian.css') }}">
@endpush
<section class="container-section">
    <div class="card-explanation">
        <h1>menu manajemen tugas / ujian</h1>
    </div>
</section>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Daftar Tugas dan Ujian</h1>
        <div class="container-link">
            <a class="btn-ctn" href="{{ route('tambah-topikujian') }}">
                <img class="icon-size" style="width:5%;" src="{{ asset('assets/img/add.png') }}" alt="">
                Topik Tugas/Ujian
            </a>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="th-size-1">No</th>
                <th class="th-size-2">Judul / Nama Ujian</th>
                <th class="th-size-">Ket</th>
                <th>Lihat Soal</th>
                <th>Telah Ujian</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ujian Merakit PC</td>
                <td>Baru</td>
                <td>
                    <a class="icon-crud-master lihat-soal" href="{{ route('lihat-soal') }}">
                        <img class="icon-crud-size" src="{{ asset('assets/img/search.png') }}" alt="">
                        lihat soal
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master file" href="">
                        <img class="icon-crud-size" src="{{ asset('assets/img/google-docs.png') }}" alt="">
                        file
                    </a>
                </td>
                </td>
                <td>
                    <a class="icon-crud-master" href="">
                        <img class="icon-crud-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">
                    </a>
                </td>
                <td>
                    <a class="icon-crud-master-delete" href="">
                        <img class="icon-crud-size icon-delete" src="{{ asset('assets/img/trash-can.png') }}" alt="">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="modal">
        <div>
            @yield('content-ujian')
        </div>
    </div>
</section>
@endsection