@extends('content.guru.manajemen-bank-soal.manajemen-bank-soal-pilgan')
@section('content-bank-soal')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/layouts/guru/modal-popup.css') }}">
@endpush

<div id="modal-ctn">
    <h1 class="head-modal">Tambahkan ke Bank Soal Pilihan Ganda</h1>
    <form action="{{ route('import-soal-pilgan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <label style="margin:.5rem 0rem">Pilih Kelas</label>
        <select name="choselesson_id">
            <option value="" selected></option>
        </select>
        <label>Upload File Excel</label>
        <input type="file" name="multiples" placeholder="isi judul materi">
        <div class="btn-ctn-modal">
            <a href="{{ route('bank-soal-pilgan') }}">Tutup</a>
            <button type="submit">Simpan</button>
        </div>
    </form>

    <div class="information">
        <ul> Keterangan :
            <li>Harap Download File Template Soalnya</li>
            <li>Tulis Pertanyaan dan Jawabannya pada template</li>
            <li>Untuk Kolom Kunci (Kunci A = 1, Kunci B = 2, Kunci C = 3, Kunci D = 4, Kunci E = 5)</li>
            <li>Upload Soal Excel Tidak Bisa memasukkan Soal Gambar dan Rumus</li>

        </ul>
    </div>
</div>

<script src="{{ asset('assets/js/popup-modal.js') }}"></script>
@endsection