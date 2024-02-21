@extends('content.guru.manajemen-bank-soal.manajemen-bank-soal-essay')
@section('content-bank-soal')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn">
    <h1 class="head-modal">Tambahkan ke Bank Soal Essay</h1>
    <form action="">
        <label>Mata Pelajaran</label>
        <input type="text" placeholder="isi mata pelajaran">
        <label>Upload File Excel</label>
        <input type="file">
    </form>
    <div class="btn-ctn-modal">
        <a href="{{ URL::previous() }}">Tutup</a>
        <button type="submit">Simpan</button>
    </div>
    <div class="information">
        <ul> Keterangan :
            <li>Harap Download File Template Soalnya</li>
            <li>Tulis Pertanyaan dan Jawabannya pada Template</li>
            <li>Upload Soal Excel Tidak Bisa memasukkan Soal Gambar dan Rumus</li>
        </ul>
    </div>
</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection