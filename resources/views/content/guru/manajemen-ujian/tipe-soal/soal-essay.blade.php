@extends('content.guru.manajemen-ujian.daftarsoal-ujian')
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
        <h1>List Soal Essay</h1>
        <div class="container-link">
            <a href="{{ route('create.soal-essay') }}" class="btn-link--sub-components-essay">
                <img class="img-icon-size" src="{{ asset('assets/img/add.png') }}" alt="">
                Essay </a>
            <a href="{{ route('upload-essay') }}" class="btn-link--sub-components-bank-soal">
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
                <th class="soal-th">Pertanyaan</th>
                <th>Tgl.dibuat</th>
                <th class="option-th">Edit</th>
                <th class="option-th">Hapus</th>
            </tr>
        </thead>
        <tbody class="tbody-two">
            <tr>
                <td>1</td>
                <td>X TKJ</td>
                <td>Jaringan Komputer</td>
                <td>
                    <a href="">
                        <img class="img-icon-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">

                    </a>
                </td>
                <td>
                    <a href="">
                        <img class="img-icon-size" src="{{ asset('assets/img/trash-can.png') }}" alt="">
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>X TKJ</td>
                <td>Jaringan Komputer</td>
                <td>
                    <a href="">
                        <img class="img-icon-size" src="{{ asset('assets/img/edit-pen.png') }}" alt="">

                    </a>
                </td>
                <td>
                    <a href="">
                        <img class="img-icon-size" src="{{ asset('assets/img/trash-can.png') }}" alt="">
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