@extends('app-guru')
@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/manajemen-ujian.css') }}">
@endpush
<div class="container-section">
    <div class="card-explanation">
        <h1>menu manajemen ujian / tugas</h1>
    </div>
</div>
<section class="sub-container-section">
    <div class="card-head-tabel">
        <h1>Detail Soal Ujian</h1>
        <div class="container-link">
            <a class="btn-link--sub-components-kembali" href="{{ route('lihat-soal') }}">
                <img class="img-icon-size-container-link-kembali" src="{{ asset('assets/img/minus.png') }}" alt="">
                kembali
            </a>
        </div>
    </div>
    <table class="table-daftarsoal-ujian">
        <thead class="thead-daftarsoal-ujian">
            <tr>
                <th class="th-color-one">Judul Tugas Ujian</th>
                <th class="th-color-two">Kelas yang di tugaskan</th>
                <th class="th-color-one">Mata Pelajaran</th>
                <th class="th-color-two">Jenis Soal</th>
                <th class="th-color-one">Waktu Pengerjaan</th>
            </tr>
            <tr class="tr-three">
                <td></td>
            </tr>
        </thead>
        <tbody class="tbody-daftarsoal-ujian">
            <tr>
                <td class="th-color-one"><span>:</span>Isi judul tugas ujian</td>
                <td class="th-color-two"><span>:</span>isi kelas yang ditugaskan</td>
                <td class="th-color-one"><span>:</span>mata pelajaran</td>
                <td class="th-color-two"><span>:</span>isi jenis soal</td>
                <td class="th-color-one"><span>:</span>90 menit</td>
            </tr>
        </tbody>
    </table>
    <div class="btn-soal-position">
        <a class="btn-essay" href="{{ route('soal-essay') }}">
            <img class="icon-essay" src="{{ asset('assets/img/essay.png') }}" alt="">
            Soal Essay
        </a>
        <a class="btn-pilgan" href="{{ route('soal-pilgan') }}">
            <img class="icon-pilgan" src="{{ asset('assets/img/abc.png') }}" alt="">
            Pilihan Ganda</a>
    </div>

</section>

</div>
@endsection