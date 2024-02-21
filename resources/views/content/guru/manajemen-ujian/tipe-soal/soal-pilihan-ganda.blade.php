@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/components/table/table-soal-essay-pilgan.css') }}">
@endpush
<div class="container-section">
    <div class="card-explanation">
        <h1>menu manajemen ujian / tugas</h1>
    </div>
</div>

<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>List Soal Pilihan Ganda</h1>
        <div class="container-link">
            <a href="{{ route('create.soal-pilgan') }}" class="btn-link--sub-components-pilgan">
                <img class="img-icon-size" src="{{ asset('assets/img/add.png') }}" alt="" class="icon-soal-essay">
                Pilihan Ganda
            </a>
            <a href="{{ route('upload-pilgan') }}" class="btn-link--sub-components-bank-soal">
                <img class="img-icon-size" src="{{ asset('assets/img/upload.png') }}" alt="">
                Bank Soal
            </a>
        </div>
    </div>
    {{-- Tabel 1 --}}
    <table class="tabel-one">
        <thead>
            <tr>
                <th class="th-color-one">Judul</th>
                <th class="th-color-two">Mata Pelajaran</th>
                <th class="th-color-one">Waktu</th>
            </tr>
            <tr class="tr-three">
                <td>1</td>
            </tr>
        </thead>
        <tbody class="tbody-one">
            <tr>
                <td class="th-color-one"><span>:</span>Isi judul tugas ujian</td>
                <td class="th-color-two"><span>:</span>isi mata pelajaran</td>
                <td class="th-color-one"><span>:</span>waktu</td>
            </tr>
        </tbody>
        </thead>
    </table>
    {{-- Tabel 2 --}}
    <table class="tabel-two">
        <thead class="thead-two">
            <tr>
                <th class="no-th">No</th>
                <th class="soal-th">Soal</th>
                <th>Pil A</th>
                <th>Pil B</th>
                <th>Pil C</th>
                <th>Pil D</th>
                <th>Pil E</th>
                <th>Kunci</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody class="tbody-two">
            <tr>
                <td>1</td>
                <td>Apa itu</td>
                <td>Jaringan Komputer</td>
                <td>A</td>
                <td>B</td>
                <td>C</td>
                <td>D</td>
                <td>E</td>
                <td>
                    <a href="">
                        <img class="icon-crud" src="{{ asset('assets/img/edit-pen.png') }}" alt="">

                    </a>
                </td>
                <td>
                    <a href="">
                        <img class="icon-crud" src="{{ asset('assets/img/trash-can.png') }}" alt="">
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>X TKJ</td>
                <td>Jaringan Komputer</td>
                <td>A</td>
                <td>B</td>
                <td>C</td>
                <td>D</td>
                <td>E</td>
                <td>
                    <a href="">
                        <img class="icon-crud" src="{{ asset('assets/img/edit-pen.png') }}" alt="">

                    </a>
                </td>
                <td>
                    <a href="">
                        <img class="icon-crud" src="{{ asset('assets/img/trash-can.png') }}" alt="">
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="btn-kembali-ctn">
        <a class="btn-link--sub-components-kembali" href="{{ route('lihat-soal') }}">
            <img class="icon-back" src="{{ asset('assets/img/minus.png') }}" alt="">
            kembali</a>
    </div>
</section>

</div>
@endsection